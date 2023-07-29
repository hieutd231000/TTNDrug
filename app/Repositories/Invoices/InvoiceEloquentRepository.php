<?php

namespace App\Repositories\Invoices;

use App\Models\Invoices;
use App\Repositories\Eloquent\EloquentRepository;

class InvoiceEloquentRepository extends EloquentRepository implements  InvoiceRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Invoices::class;
    }
}
