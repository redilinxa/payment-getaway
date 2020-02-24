<?php
/**
 * Created by Redi Linxa
 * Date: 24/02/2020
 * Time: 01:25
 */

namespace App\Service;


use App\Customer;

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

    public function create(array $data){
        $customer = new Customer();
        return $this->updateCustomerObject($customer, $data);
    }

    public function update(Customer $customer, $data){
        return $this->updateCustomerObject($customer, $data);
    }

    private function updateCustomerObject(Customer $customer, $data){
        $customer->firstName = $data['firstName'];
        $customer->lastName = $data['lastName'];
        $customer->telephone = $data['telephone'];
        $customer->save();
        return $this->accountService->addAccount($customer, $data);
    }
}
