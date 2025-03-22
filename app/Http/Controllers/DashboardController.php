<?php

namespace App\Http\Controllers;

use App\Models\InvoiceProduct;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\category;
use App\Models\Invoice;

class DashboardController extends Controller
{
    public function DashboardPage(Request $request):View{
        $user_id = $request->header('id');
        $customer = Customer::where('user_id', $user_id)->count();
        $category = category::where('user_id', $user_id)->count();
        $product = Product::where('user_id', $user_id)->count();
        $invoice = Invoice::where('user_id', $user_id)->count();
        $invoice_item = InvoiceProduct::where('user_id', $user_id)->count();
        $total = Invoice::where('user_id', $user_id)->sum('total');
        $vat = Invoice::where('user_id', $user_id)->sum('vat');
        $payable = Invoice::where('user_id', $user_id)->sum('payable');
        return view('pages.dashboard.dashboard-page', compact('customer','category','product','invoice','total','vat','invoice_item'));
    }
}
