<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function CustomerList()
    {
        $customers = Customer::all();
        return $customers; 
    }

    public function CustomerPage()
    {
        $customers = Customer::with('user')->get();
        return view('pages.dashboard.customer-page',compact('customers'));
    }
    
    public function CreateCustomer(Request $request)
    {
        $user_id = $request->header('id');
        if($user_id)
        {
            return Customer::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'address' => $request->input('address'),
                'user_id'=> $user_id
            ]);
        }
        else{
            return response()->json([
                'error' => 'User ID is required'], 
                400);
        }
        
    }

    public function UpdateCustomer(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $address = $request->input('address');

        return Customer::where('id',$id)->update([
            'name'=> $name,
            'email'=> $email,
            'mobile'=> $mobile,
            'address'=> $address
        ]);
        
        
    }
    public function DeleteCustomer( $id )
    {
        $customer = Customer::find($id);
        try{
            if($customer){
                $customer->delete();
                return response()->json([
                    'message'=> 'Customer delete successfully'
                ]);
            }
        }
        catch(Exception $e){
            return response()->json([
                'error'=> $e->getMessage()
                ],400);
            }     
    }
}
