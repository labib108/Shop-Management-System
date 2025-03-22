<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Http\Controllers\Controller;
use App\Models\InvoiceProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use Symfony\Component\Console\Input\Input;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
     public function CreateSales(Request $request)
     {

         return view('pages.dashboard.sale-page');
     }
    public function GenerateInvoice($invoice_id,$customer_id,Request $request)
    {
        $user_id = $request->header('id');
        $invoices = Invoice::where('id',$invoice_id)->where('customer_id',$customer_id)->first();
        $invoiceProducts = InvoiceProduct::where('invoice_id',$invoice_id)->where('user_id',$user_id)->with('product')->get();
        return view('pages.dashboard.invoice.invoice-generate',compact('invoices','invoiceProducts'));
    }
    public function InvoiceGeneration(Request $request)
    {
        $invoice_id = $request->input('invoice_id');
        $customer_id = $request->input('customer_id');
        return response()->json([
            'invoice_id' => $invoice_id,
            'customer_id' => $customer_id,
        ]);
    }
    public function ShowInvoice(Request $request)
    {
        $user_id = $request->header('id');
        $invoices = Invoice::where('user_id',$user_id)->with('customer')->get();
        return view('pages.dashboard.invoice.invoice-page',compact('invoices'));
    }

    public function SelectInvoice(Request $request)
    {
        $user_id = $request->header('id');
        $invoice = Invoice::where('user_id',$user_id)->with('customer')->get();
        return $invoice;
    }

    public function CreateInvoice(Request $request)
    {
        Db::beginTransaction();
        try{
            $user_id = $request->header('id');
            $customer_id = $request->input('customer_id');
            $total = $request->input('total');
            $discount = $request->input('discount');
            $vat = $request->input('vat');
            $payable = $request->input('payable');

            $invoice = Invoice::create([
                'total'=> $total,
                'discount'=> $discount,
                'vat'=> $vat,
                'payable'=> $payable,
                'user_id'=> $user_id,
                'customer_id'=> $customer_id,
            ]);

            $invoice_id = $invoice->id;
            $products = $request->input('products');

            foreach ($products as $product){
                InvoiceProduct::create([
                    'invoice_id' => $invoice_id,
                    'product_id' => $product['product_id'],
                    'user_id' => $user_id,
                    'quantity' => $product['quantity'],
                    'sale_price' => $product['sale_price']
                ]);
            }
            DB::commit();
            return 1;

        }catch (Exception $e)
        {
            Db::rollBack();
            return 0;
        }
    }

    public function DetailsInvoice(Request $request)
    {
        $user_id = $request->header('id');
        $customer_id = $request->input('customer_id');
        $invoice_id = $request->input('invoice_id');
        $customerDetails = Customer::where('user_id',$user_id)->where('id',$customer_id)->first();
        $invoiceTotal = Invoice::where('user_id',$user_id)->where('id',$invoice_id)->first();
        $invoiceProduct = InvoiceProduct::where('invoice_id',$invoice_id)->where('user_id',$user_id)->with('product')->get();

        return array(
            'customer' => $customerDetails,
            'invoice' => $invoiceTotal,
            'product' => $invoiceProduct,
        );
    }


    public function DeleteInvoice(Request $request)
    {
        DB::beginTransaction();
        try{
            $user_id = $request->header('id');
            $invoice_id = $request->input('invoice_id');
            InvoiceProduct::where('invoice_id',$invoice_id)->where('user_id',$user_id)->delete();
            Invoice::where('id',$invoice_id)->delete();
            DB::commit();
            return 1;
        }catch (\Exception $e)
        {
            DB::rollBack();
            return 0;
        }
    }

}
