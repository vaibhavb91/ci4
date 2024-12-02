<?php

namespace App\Models;

use App\Entities\Clients;
use CodeIgniter\Model;
use Config\Services;

class ClientsModel extends Model
{
   
    protected $table         = 'v_clients';
    protected $allowedFields = [
        'title', 'content', 'category', 'user_id'
    ];
    protected $primaryKey = 'id';
    protected $returnType = 'App\Entities\Clients';
    protected $useTimestamps = true;

    public function withCategory($cat)
    {
        $this->builder()->where('category', $cat);
        return $this;
    }

    public function withSearch($q)
    {
        $this->builder()->like('content', $q);
        $this->builder()->orLike('title', $q);
        return $this;
    }

    public function withUser($id)
    {
        $this->builder()->where('user_id', $id);
        return $this;
    }

    public function processWeb($id)
    {
        if ($id === null) {
            $item = (new Clients($_POST));
            $item->user_id = Services::login()->id;
            return $this->insert($item);
        } else if ($item = $this->find($id)) {
            /** @var Clients $item */
            $item->fill($_POST);
            if ($item->hasChanged()) {
                $this->save($item);
            }
            return $id;
        }
        return false;
    }
}
