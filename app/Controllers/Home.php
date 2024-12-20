<?php

namespace App\Controllers;

use App\Libraries\Recaptha;
use App\Models\ClientsModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Files\Exceptions\FileNotFoundException;

class Home extends BaseController
{
	// public function index()
	// {
	// 	return view('home/index', [
	// 		'news' => find_with_filter((new ArticleModel())->withCategory('news'), 2),
	// 		'info' => find_with_filter((new ArticleModel())->withCategory('info'), 2),
	// 		'page' => 'home',
	// 	]);
	// }

	public function index()
	{
		if ($this->session->has('login')) {
			return $this->response->redirect('/user/');
		}
		if ($r = $this->request->getGet('r')) {
			return $this->response->setCookie('r', $r, 0)->redirect('/login/');
		}
		
		if ($this->request->getMethod() === 'POST') {
			$post = $this->request->getPost();
			if (isset($post['email'], $post['password'])) {
				$login = (new UserModel())->atEmail($post['email']);
				if ($login && password_verify(
					$post['password'],
					$login->password
				)) {
					(new UserModel())->login($login);
					if ($r = $this->request->getCookie('r')) {
						$this->response->deleteCookie('r');
					}
					return $this->response->redirect(base_url($r ?: 'user'));
				}
			}
			$m = lang('Interface.wrongLogin');
		}
		return view('home/login', [
			'message' => $m ?? (($_GET['msg'] ?? '') === 'emailsent' ? lang('Interface.emailSent') : null)
		]);

		
	}

	public function register()
	{
		$recaptha = new Recaptha();
		if ($this->request->getMethod() === 'GET') {
			return view('home/register', [
				'errors' => $this->session->errors,
				'recapthaSite' => $recaptha->recapthaSite,
			]);
		} else {
			if ($this->validate([
				'name' => 'required|min_length[3]|max_length[255]',
				'email' => 'required|valid_email|is_unique[user.email]',
				'password' => 'required|min_length[8]',
				'g-recaptcha-response' => ENVIRONMENT === 'production' && $recaptha->recapthaSecret ? 'required' : 'permit_empty',
			])) {
				if (ENVIRONMENT !== 'production' || !$recaptha->recapthaSecret || (new Recaptha())->verify($_POST['g-recaptcha-response'])) {
					$id = (new UserModel())->register($this->request->getPost());
					(new UserModel())->find($id)->sendVerifyEmail();
					if ($r = $this->request->getCookie('r')) {
						$this->response->deleteCookie('r');
					}
					return $this->response->redirect(base_url($r ?: 'user'));
				}
			}
			return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
		}
	}

	public function clients($id = null)
	{
		if ($id === 'about') $id = 1;
		else if ($id === 'faq') $id = 2;
		else if ($id === 'contact') $id = 3;

		$model = new ClientsModel();
		if ($id === null) {
			return view('home/clients/list', [
				'data' => $model->findAll(),
			]);
		} else if ($item = $model->find($id)) {
			return view('home/clients/view', [
				'item' => $item,
				'page' => $item->category,
			]);
		} else {
			throw new PageNotFoundException();
		}
	}
	public function delete($id)
{
    $model = new ClientsModel();
    try {
        if ($model->delete($id)) {
            return redirect()->to('/user/clients')->with('success', 'Client deleted successfully.');
        } else {
            return redirect()->to('/user/clients')->with('error', 'Client could not be deleted.');
        }
    } catch (\Exception $e) {
        return redirect()->to('/user/clients')->with('error', 'An error occurred: ' . $e->getMessage());
    }
}

	
	public function category($name = null)
	{
		$model = new ClientsModel();
		return view('home/clients/list', [
			'data' => $model->withCategory($name)->findAll(),
			'page' => $name,
		]);
	}

	public function search()
{
    $model = new ClientsModel();
    
    // Get the search query
    $q = $this->request->getGet('q');
    
    if ($q) {
        $model->like('name', $q)
              ->orLike('email', $q)
              ->orLike('mobile_no', $q);
    }
    
    // Pagination setup
    $perPage = 10; // Items per page
    $currentPage = $this->request->getGet('page') ?? 1;

    // Fetch paginated data
	$data = $model->paginate(10, 'clients');
	$pager = $model->pager; 

    return view('home/clients/list', [
        'data' => $data,
        'pager' =>  $pager,
        'page' => '',
        'search' => $q,
    ]);
}


	public function uploads($directory, $file)
	{
		$path = WRITEPATH . implode(DIRECTORY_SEPARATOR, ['uploads', $directory, $file]);
		if ($file && is_file($path)) {
			check_etag($path);
			header('Content-Type: ' . mime_content_type($path));
			header('Content-Length: ' . filesize($path));
			readfile($path);
			exit;
		}
		throw new FileNotFoundException();
	}
}
