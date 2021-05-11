<?php

namespace App\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Repository\AccountsRepository;
use App\Models\Account;

class AccountsService {

    /**
     * @var AccountsRepository
     */
    protected AccountsRepository $accountRepository;

    public function __construct(
        AccountsRepository $accountRepository,
    ){
        $this->accountRepository = $accountRepository;
    }
    
    /**
    * 
    * @return LengthAwarePaginator
    */
    public function findAll() :LengthAwarePaginator
    {
        return $this->accountRepository->findAll();
    }

    /**
    * Preenche a entidade através de um array
    * @param Array $data
    * 
    * @return Account
    */
    public function fillEntity(Array $data) :Account
    {
        return new Account($data);
    }

    /**
    * Registra a conta na tabela account
    * @param Account $entity
    * 
    * @return array
    */
    public function create(Account $entity)
    {
        return $this->accountRepository->create($entity);
    }

    /**
    * Busca a account através do ID
    * @param int $id
    * 
    * @return Account
    */
    public function find(Int $id) :Account
    {
        return $this->accountRepository->find($id);
    }
}
