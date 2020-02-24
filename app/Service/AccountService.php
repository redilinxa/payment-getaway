<?php
/**
 * Created by Redi Linxa
 * Date: 14/12/2019
 * Time: 00:52
 */

namespace App\Service;
use App\Account;
use App\Customer;
use App\Transaction;

class AccountService
{
    /**
     * @param Customer $customer
     * @return mixed
     */
    public function getCustomerBalance(Customer $customer){
        return Account::findOrFail(['customer_id' => $customer->id]);
    }

    /**
     * @param Customer $customer
     * @param Transaction $transaction
     * @return Account $acount
     */
    public function increaseBalance(Customer $customer, Transaction $transaction){
        $account = Account::firstOrNew(['customer_id' => $customer->id]);
        $account->realBalance += $transaction->amount;
        $account->bonusBalance += $transaction->bonus;
        $account->save();
        return $account;
    }

    /**
     * @param Customer $customer
     * @param Transaction $transaction
     * @return mixed
     * @throws \Exception
     */
    public function decreaseBalance(Customer $customer, Transaction $transaction){
        $account = Account::where(['customer_id' => $customer->id])->first();
        if (!$account){
            throw new \Exception("Account not found for customer {$customer->firstName} {$customer->lastName}!");
        }
        $account->realBalance -= $transaction->amount;
        if ($account->realBalance<0){
            throw new \Exception("Withdrawal of value {$transaction->amount} not allowed! The costumer's {$customer->firstName} {$customer->lastName} balance would go below 0!");
        }
        $account->save();
        return $account;
    }
}
