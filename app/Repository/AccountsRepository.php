<?php

namespace App\Repository;

use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AccountsRepository {

    /**
    * Retorna todos as entidades da tabela accounts
    * 
    * @return LengthAwarePaginator
    */
    public function findAll() :LengthAwarePaginator
    {
        $model = new Account();
        return DB::table($model->getTable())->paginate(20);
    }
}