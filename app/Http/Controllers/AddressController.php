<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;
use function PHPUnit\Framework\isNull;
class AddressController extends Controller
{
    protected $primaryKey = 'address_id';
    
    public function getAddress(){
        return response()->json(Address::all(),200);
        //return 'This is a test route.';
     }
     public function getAddressById($id){
        $address = Address::where('address_id', $id)->first();
        if(is_null($address)){
            return response()->json(['message'=> 'Address not found'],400);
        }
        return response()->json($address,200);
     }
     public function addAddress(Request $request){

      $addressId = 'addr-' . Str::uuid();
      $address = Address::create($request->except(["address_2"])+['address_id' => $addressId] );
       // $address = Address::create($request->except(["password"]));
        return response($address,201);
     }
     //update address
     public function updateAddress(Request $request,$id)
     {
      $address = Address::find($id);
      if(is_null($address)){
         return response()->json(['message'=> 'address not found'],404);
      }
      $address->update($request->all());
      return response($address,200);
     }
     //Delete Address
     public function deleteAddress(Request $request,$id)
     {
      $address = Address::find($id);
      if(is_null($address)){
         return response()->json(['message'=> 'address not found'],404);
      }
      $address->delete();
      return response(null,204);
     }
}
