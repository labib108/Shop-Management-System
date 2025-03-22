<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function ReportPage(){
        return view('pages.report.report-page');
    }

    public function SalesReport(Request $request){
        $user_id = $request->header('id');
        $fromDate = date('Y-m-d', strtotime($request->fromDate));
        $toDate = date('Y-m-d', strtotime($request->toDate));

        $total=Invoice::where('user_id',$user_id)
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->sum('total');
        $vat=Invoice::where('user_id',$user_id)
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->sum('vat');
        $payable=Invoice::where('user_id',$user_id)
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->sum('payable');
        $discount=Invoice::where('user_id',$user_id)
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->sum('discount');
        $list=Invoice::where('user_id',$user_id)
            ->whereDate('created_at', '>=', $fromDate)
            ->whereDate('created_at', '<=', $toDate)
            ->with('customer')->get();

        $data=['payable'=> $payable,'discount'=>$discount, 'total'=> $total, 'vat'=> $vat, 'list'=>$list,'FormDate'=>$request->FormDate,'ToDate'=>$request->FormDate];

        $pdf = Pdf::loadView('pages.report.SalesReport',$data);
        return $pdf->download('invoice.pdf');

    }
}
