<?php

namespace App\Controllers;

use App\Entities\Clients;
use App\Entities\User as EntitiesUser;
use App\Models\ClientsModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class User extends BaseController
{

	/** @var EntitiesUser  */
	public $login;

	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		parent::initController($request, $response, $logger);

		if (!($this->login = Services::login())) {
			$this->logout();
			$this->response->redirect('/login/')->send();
			exit;
		}
	}

	public function index()
	{
		return view('user/dashboard', [
			'page' => 'dashboard'
		]);
	}

	public function logout()
	{
		$this->session->destroy();
		return $this->response->redirect('/');
	}


	public function clients($page = 'list', $id = null)
	{
		$model = new ClientsModel();
		if ($this->login->role !== 'admin') {
			$model->withUser($this->login->id);
		}
		if ($this->request->getMethod() === 'POST') {
			if ($page === 'delete' && $model->delete($id)) {
				return $this->response->redirect('/user/clients/');
			} else if ($id = $model->processWeb($id)) {
				return $this->response->redirect('/user/clients/');
			}
		}
		switch ($page) {
			case 'list':
				return view('user/clients/list', [
					'data' => find_with_filter(empty($_GET['category']) ? $model : $model->withCategory($_GET['category'])),
					'page' => 'clients',
				]);
			case 'add':
				return view('user/clients/edit', [
					'item' => new Clients()
				]);
			case 'edit':
				if (!($item = $model->find($id))) {
					throw new PageNotFoundException();
				}
				return view('user/clients/edit', [
					'item' => $item
				]);
		}
		throw new PageNotFoundException();
	}

	public function manage($page = 'list', $id = null)
	{
		if ($this->login->role !== 'admin') {
			throw new PageNotFoundException();
		}
		$model = new UserModel();
		if ($this->request->getMethod() === 'POST') {
			if ($page === 'delete' && $model->delete($id)) {
				return $this->response->redirect('/user/manage/');
			} else if ($id = $model->processWeb($id)) {
				return $this->response->redirect('/user/manage/');
			}
		}
		switch ($page) {
			case 'list':
				return view('user/users/list', [
					'data' => find_with_filter($model),
					'page' => 'users',
				]);
			case 'add':
				return view('user/users/edit', [
					'item' => new EntitiesUser()
				]);
			case 'edit':
				if (!($item = $model->find($id))) {
					throw new PageNotFoundException();
				}
				return view('user/users/edit', [
					'item' => $item
				]);
		}
		throw new PageNotFoundException();
	}

	public function uploads($directory)
	{
		// to upload general files (summernote)
		$path = WRITEPATH . implode(DIRECTORY_SEPARATOR, ['uploads', $directory, '']);
		$r = $this->request;
		if (!is_dir($path))
			mkdir($path, 0775, true);
		if ($r->getMethod() === 'POST') {
			if (($f = $r->getFile('file')) && $f->isValid()) {
				if ($f->move($path)) {
					return $f->getName();
				}
			}
		}
		return null;
	}

	public function profile()
	{
		if ($this->request->getMethod() === 'POST') {
			if ((new UserModel())->processWeb($this->login->id)) {
				return $this->response->redirect('/user/profile/');
			}
		}
		return view('user/profile', [
			'item' => $this->login,
			'page' => 'profile',
		]);
	}
}
