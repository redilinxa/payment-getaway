<?php
/**
 * Created by Redi Linxa
 * Date: 11/12/2019
 * Time: 01:25
 */

namespace App\Service;


use App\Customer;

class CustomerService
{
    public function create(array $data){
        $customer = new Customer();
        $customer = $this->generateBonus($customer);
        return $this->updateCustomerObject($customer, $data);
    }

    public function update(Customer $customer, $data){
        return $this->updateCustomerObject($customer, $data);
    }

    private function updateCustomerObject(Customer $customer, $data){
        $customer->email = $data['email'];
        $customer->firstName = $data['firstName'];
        $customer->lastName = $data['lastName'];
        $customer->gender = $data['gender'];
        $customer->country = $data['country'];
        $customer->save();
        return $customer;
    }
}
