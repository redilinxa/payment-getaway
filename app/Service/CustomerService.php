<?php
/**
 * Created by Redi Linxa
 * Date: 24/02/2020
 * Time: 01:25
 */

namespace App\Service;


use App\Customer;

/**
 * Service for every interaction with the Customer entity.
 * This is to decouple the application architecture and code readability.
 * Class CustomerService
 * @package App\Service
 */
class CustomerService
{
    /**
     * @var AccountService
     */
    private $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    /**
     * @param array $data
     * @return \App\Account
     */
    public function create(array $data){
        $customer = Customer::firstOrNew([
            'firstName' => $data['firstName'],
            'lastName'=> $data['lastName']
        ]);
        return $this->updateCustomerObject($customer, $data);
    }

    /**
     * @param Customer $customer
     * @param $data
     * @return \App\Account
     */
    public function update(Customer $customer, $data){
        return $this->updateCustomerObject($customer, $data);
    }

    /**
     * @param Customer $customer
     * @param $data
     * @return \App\Account
     */
    private function updateCustomerObject(Customer $customer, $data){
        $customer->firstName = $data['firstName'];
        $customer->lastName = $data['lastName'];
        $customer->telephone = $data['telephone'];
        $customer->save();
        return $this->accountService->addAccount($customer, $data);
    }
}
