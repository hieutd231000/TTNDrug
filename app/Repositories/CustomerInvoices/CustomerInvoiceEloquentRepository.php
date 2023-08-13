<?php

namespace App\Repositories\CustomerInvoices;

use App\Models\CustomerInvoices;
use App\Repositories\Eloquent\EloquentRepository;

class CustomerInvoiceEloquentRepository extends EloquentRepository implements  CustomerInvoiceRepositoryInterface
{
    public function getModel()
    {
        return CustomerInvoices::class;
    }
}
