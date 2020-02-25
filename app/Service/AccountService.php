<?php
/**
 * Created by Redi Linxa
 * Date: 24/02/2020
 * Time: 00:52
 */

namespace App\Service;
use App\Account;
use App\Customer;

/**
 * Service for every interaction with the Account entity.
 * This is to decouple the application architecture and code readability.
 * Class AccountService
 * @package App\Service
 */
class AccountService
{
    /**
     * @param Customer $customer
     * @return Account $acount
     */
    public function addAccount(Customer $customer, $data){
        $account = Account::firstOrNew(['customer_id' => $customer->id]);
        $this->updateAccountObject($account, $data);
        $account->save();
        return $account;
    }

    private function updateAccountObject(Account $account, $data){
        $account->street = $data['street'];
        $account->house_no = $data['house_no'];
        $account->zip_code = $data['zip_code'];
        $account->city = $data['city'];
        $account->owner = $data['owner'];
        $account->iban = $data['iban'];
        return $account;
    }

    public function updatePayment(array $data, $accountId){
        try{
            $account = Account::findOrFail($accountId);
            $account->paymentId = $data['paymentId'];
            $account->save();
            return $account;
        }catch(\Exception $ex){
            return ['error'=>$ex->getMessage()];
        }
    }
}
