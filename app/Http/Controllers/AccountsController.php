<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Services\AccountsService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\AccountsRequest;
use Symfony\Component\HttpFoundation\Response;

class AccountsController extends Controller
{

    /**
     * @var AccountsService
     */
    protected AccountsService $accountService;

    public function __construct(
        AccountsService $accountService
    ){
        $this->accountService = $accountService;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
    */
    public function index() :LengthAwarePaginator
    {
        return $this->accountService->findAll();
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\AccountsRequest $request
    * @return \Illuminate\Http\Response
    */
    public function store(AccountsRequest $request) :JsonResponse
    {
        try {
            $account = $this->accountService->fillEntity($request->all());

            $return = $this->accountService->create($account);

            return new JsonResponse($return, Response::HTTP_CREATED);
        } catch (Exception $e) {
            return new JsonResponse($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Account
     */
    public function show($id) :Account
    {
        return $this->accountService->find($id);
    }

    /**
     * Atualiza a conta na tabela accounts
     * @param Account $data
     * @param Int $id
     * @return Account
     */
    public function update(Account $data, Int $id) :Account
    {
        $account = Account::find($id)->fill($data->getAttributes());
        $account->save();

        return $account; 
    }

    /**
     * Deleta a conta através do ID
     * @param  int  $id
     * 
     */
    public function delete($id) :void
    {
        Account::destroy($id);
    }
}
