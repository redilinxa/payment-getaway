<?php
/**
 * Created by Redi Linxa
 * Date: 24/02/2020
 * Time: 22:30
 */

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\AccountRequest;
use App\Service\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * @var AccountController|AccountService
     */
    private $accountService;

    /**
     * CustomerController constructor.
     * @param AccountService $accountService
     */
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    /**
     * The route responsible for updating the customer
     * @param Request $request . Handles all customer validations
     * @param $accountId
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePayment(Request $request, $accountId){
        $result  = $this->accountService->updatePayment($request->all(), $accountId);
        if (!$result){
            return response()->json($result['error'], 500);
        }
        return response()->json($result);
    }
}
