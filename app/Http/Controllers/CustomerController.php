<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


use function Laravel\Prompts\password;
use function PHPUnit\Framework\isNull;

class CustomerController extends Controller
{
    protected $primaryKey = 'customer_id';
    
    public function getCustomers(){
        return response()->json(Customers::all(),200);
        //return 'This is a test route.';
     }
     public function getCustomerById($id){
        $customer = Customers::where('customer_id', $id)->first();
        if(is_null($customer)){
            return response()->json(['message'=> 'Customer not found'],400);
        }
        return response()->json($customer,200);
     }
     public function addCustomer(Request $request){

      $customerId = Str::uuid();
      $customer = Customers::create($request->except('password','customer_email') + ['password' => Hash::make($request->input('password'))] + ['customer_id' => $customerId] + ['customer_email' => strtolower($request->input('customer_email'))]);
       // $customer = Customers::create($request->except(["password"]));
        return response($customer,201);
     }
     //update Customer
     public function updateCustomer(Request $request,$id)
     {
      $customer = Customers::find($id);
      if(is_null($customer)){
         return response()->json(['message'=> 'Customer not found'],404);
      }
      $customer->update($request->all());
      return response($customer,200);
     }
     //Delete Customers
     public function deleteCustomers(Request $request,$id)
     {
      $customer = Customers::find($id);
      if(is_null($customer)){
         return response()->json(['message'=> 'Customer not found'],404);
      }
      $customer->delete();
      return response(null,204);
     }
}
 