<?php

namespace App\Models;

use App\Entities\Sales;
use CodeIgniter\Model;
use Config\Services;

class SalesModel extends Model
{
    protected $table         = 'v_sales';
    protected $allowedFields = [
        'date', 'client_id', 'service_details', 'cash_type', 
        'amount', 'gst_amount', 'total', 'address', 'mobile_no'
    ];
    protected $primaryKey    = 'id';
    protected $returnType    = 'App\Entities\Sales';
    protected $useTimestamps = false; // No created_at or updated_at columns by default

    /**
     * Filter sales by a specific client ID.
     *
     * @param int $clientId
     * @return $this
     */
    public function withClient($clientId)
    {
        $this->builder()->where('client_id', $clientId);
        return $this;
    }

    /**
     * Perform a search on service details.
     *
     * @param string $query
     * @return $this
     */
    public function withSearch($query)
    {
        $this->builder()->like('service_details', $query);
        return $this;
    }

    /**
     * Filter sales by date range.
     *
     * @param string $startDate
     * @param string $endDate
     * @return $this
     */
    public function withDateRange($startDate, $endDate)
    {
        $this->builder()->where('date >=', $startDate)
                        ->where('date <=', $endDate);
        return $this;
    }

    /**
     * Process form data for adding or updating sales entries.
     *
     * @param int|null $id
     * @return int|false
     */
    public function processWeb($id)
    {
        if ($id === null) {
            $sale = new Sales($_POST);
            return $this->insert($sale);
        } else if ($sale = $this->find($id)) {
            /** @var Sales $sale */
            $sale->fill($_POST);
            if ($sale->hasChanged()) {
                $this->save($sale);
            }
            return $id;
        }
        return false;
    }
}
