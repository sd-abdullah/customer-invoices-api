<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class InvoicesFilter extends ApiFilter{


    protected $safeParms = [
        'customer_id' => ['eq'],
        'amount' => ['eq','gt','lt','gte','lte'],
        'status' => ['eq','neq'],
        'billed_at' => ['eq','gt','lt','gte','lte'],
        'paid_at' => ['eq','gt','lt','gte','lte']
    ];

    protected $columnMap = [
        'customerId' => 'customer_id',
        'billedAt' => 'billed_at',
        'paidAt' => 'paid_at'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'neq' => '!=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<='
    ];

}