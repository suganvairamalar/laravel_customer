<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator,Redirect,Response;

use App\Customer;

class CustomerController extends Controller
{
    public function index(Request $request){        
        /*if($request->search==""){           
           $customers = Customer::orderBy('id','desc');
           //->paginate(5);           
           return view('customers.customer_index',compact('customers'));
        }
        else{
           $customers = Customer::where('customer_name','LIKE','%'.$request->search.'%')                      
                ->orderBy('id','asc');
                //->paginate(5);
                $customers->appends($request->only('search'));
            return view('customers.customer_index',compact('customers'));
        }*/
        $customers = Customer::all();
        return view('customers.customer_index',compact('customers'));
    }

   

    public function insert(Request $request){
       $rules = array('customer_name'=> 'required',
        'mobile'=> 'required',
        'email'=> 'required',
                          );
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        $form_data = array(
            'customer_name'=> $request->customer_name,
            'mobile'=> $request->mobile,
            'email'=> $request->email,
            'address1'=> $request->address1,
            'address2'=> $request->address2,
            'city'=> $request->city,
            'pincode'=> $request->pincode,
            'state'=> $request->state,
            'country'=> $request->country
             );
        //dd($form_data);
        Customer::create($form_data);
        return response()->json(['success' => 'Data Inserted Successfully.']);
    }


    public function edit($id){
        if(request()->ajax()){
            $data = Customer::findOrFail($id);
            return response()->json(['data'=> $data]);
        }

    }

    public function update(Request $request){
        $rules = array('customer_name'=> 'required',
        'mobile'=> 'required',
        'email'=> 'required',);
        
        $error = Validator::make($request->all(),$rules);
        if($error->fails()){
            return response()->json(['errors'=>$error->errors()->all()]);
        }
        $form_data = array( 
            'customer_name'=> $request->customer_name,
            'mobile'=> $request->mobile,
            'email'=> $request->email,
            'address1'=> $request->address1,
            'address2'=> $request->address2,
            'city'=> $request->city,
            'pincode'=> $request->pincode,
            'state'=> $request->state,
            'country'=> $request->country);
        //dd($form_data);
        Customer::whereId($request->hidden_id)->update($form_data);
        return response()->json(['success' => 'Data Updated Successfully.']);

    }

    public function delete($id){
        $data = Customer::findOrFail($id);
        $data->delete();
    }
}
