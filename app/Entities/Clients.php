<?php

namespace App\Entities;

use App\Models\UserModel;
use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $category
 * @property User $user
 * @property int $user_id
 * @property Time $created_at
 * @property Time $updated_at
 */
class Clients extends Entity
{
    protected $casts = [
        'id' => null,
        'name' => null,
        'birth_date' => null,
        'age' => null,
        'gender' => null,
        'mobile_no' => null,
        'alternative_no' => null,
        'address' => null,
        'state' => null,
        'pincode' => null,
        'email' => null,
        'referred_by' => null,
        'user_id' => null
    ];

    public function getUser()
    {
        return $this->user_id ? (new UserModel())->find($this->user_id) : null;
    }

    public function setUser(User $x)
    {
        $this->user_id = $x->id;
    }

    public function getExcerpt($length = 60)
    {
        return get_excerpt($this->content, $length);
    }
}
