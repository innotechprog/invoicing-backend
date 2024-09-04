<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


use function Laravel\Prompts\password;
use function PHPUnit\Framework\isNull;

class CompanyController extends Controller
{
    protected $primaryKey = 'company_id';
    
    public function getCompanies(){
        return response()->json(Companies::all(),200);
        //return 'This is a test route.';
     }
     public function getCompanyById($id){
        $company = Companies::where('company_id', $id)->first();
        if(is_null($company)){
            return response()->json(['message'=> 'company not found'],400);
        }
        return response()->json($company,200);
     }
     public function addCompany(Request $request){

      $companyId = 'comp-' . Str::uuid();
      $company = Companies::create($request->except('password','company_email') + ['company_id' => $companyId] + ['company_email' => strtolower($request->input('company_email'))]);
       // $company = Companies::create($request->except(["password"]));
        return response($company,201);
     }
     //update company
     public function updateCompany(Request $request,$id)
     {
      $company = Companies::find($id);
      if(is_null($company)){
         return response()->json(['message'=> 'company not found'],404);
      }
      $company->update($request->all());
      return response($company,200);
     }
     //Delete Companies
     public function deleteCompanies(Request $request,$id)
     {
      $company = Companies::find($id);
      if(is_null($company)){
         return response()->json(['message'=> 'company not found'],404);
      }
      $company->delete();
      return response(null,204);
     }
}
