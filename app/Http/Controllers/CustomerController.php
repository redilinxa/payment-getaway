<?php
/**
 * Created by Redi Linxa
 * Date: 24/02/2020
 * Time: 02:22
 */

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use App\Service\CustomerService;

class CustomerController extends Controller
{
    protected $customerService;

    /**
     * The service will handle the customer administration logic.
     * CustomerController constructor.
     * @param CustomerService $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * Simple route to display all customers
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $customers = Customer::all();
        return response()->json($customers);
    }

    /**
     * The route responsible for creating the customer
     * @param CustomerRequest $request. Handles all customer validations
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CustomerRequest $request){
        $customer = $this->customerService->create($request->all());
        return response()->json($customer);
    }

    /**
     * The route responsible for updating the customer
     * @param CustomerRequest $request. Handles all customer validations
     * @param $id Customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CustomerRequest $request, $id){
        $customer = Customer::findOrFail($id);
        $this->customerService->update($customer, $request->all());
        return response()->json($customer);
    }

    /**
     * Simple route to
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(){
        return view('register');
    }
}
