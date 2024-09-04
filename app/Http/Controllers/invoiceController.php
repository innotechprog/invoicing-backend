<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoices;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


use function Laravel\Prompts\password;
use function PHPUnit\Framework\isNull;

class invoiceController extends Controller
{
    protected $primaryKey = 'invoice_id';
    
    public function getInvoices(){
        return response()->json(Invoices::all(),200);
        //return 'This is a test route.';
     }
     public function getInvoiceById($id){
        $invoice = Invoices::where('invoice_id', $id)->first();
        if(is_null($invoice)){
            return response()->json(['message'=> 'Invoice not found'],400);
        }
        return response()->json($invoice,200);
     }
     public function addInvoice(Request $request){

      $invoiceId = Str::uuid();
      $invoice = Invoices::create($request->except('password','invoice_email') + ['password' => Hash::make($request->input('password'))] + ['invoice_id' => $invoiceId] + ['invoice_email' => strtolower($request->input('invoice_email'))]);
       // $invoice = Invoices::create($request->except(["password"]));
        return response($invoice,201);
     }
     //update Invoice
     public function updateInvoice(Request $request,$id)
     {
      $invoice = Invoices::find($id);
      if(is_null($invoice)){
         return response()->json(['message'=> 'Invoice not found'],404);
      }
      $invoice->update($request->all());
      return response($invoice,200);
     }
     //Delete Invoices
     public function deleteInvoices(Request $request,$id)
     {
      $invoice = Invoices::find($id);
      if(is_null($invoice)){
         return response()->json(['message'=> 'Invoice not found'],404);
      }
      $invoice->delete();
      return response(null,204);
     }
}
 