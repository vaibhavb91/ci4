<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Models\ClientsModel;
use CodeIgniter\I18n\Time;

/**
 * @property int $id
 * @property Time $date
 * @property int $client_id
 * @property string $service_details
 * @property string $cash_type
 * @property float $amount
 * @property float $gst_amount
 * @property float $total
 * @property string $address
 * @property string $mobile_no
 */
class Sales extends Entity
{
    protected $casts = [
        'id' => 'int',
        'date' => 'datetime',
        'client_id' => 'int',
        'service_details' => 'string',
        'cash_type' => 'string',
        'amount' => 'float',
        'gst_amount' => 'float',
        'total' => 'float',
        'address' => 'string',
        'mobile_no' => 'string',
    ];

    /**
     * Get the associated client entity.
     *
     * @return Clients|null
     */
    public function getClient()
    {
        return $this->client_id ? (new ClientsModel())->find($this->client_id) : null;
    }

    /**
     * Set the client ID using a client entity.
     *
     * @param Clients $client
     */
    public function setClient(Clients $client)
    {
        $this->client_id = $client->id;
    }
}
