<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Communes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\CSRF;

class CustomerController extends Controller
{
    
    /**
     * It registers a user.
     *
     */
    public function registry(Request $request){
        $id_com = $request->id_com;
        $id_reg = $request->id_reg;
        
        $communeExists = Communes::where('id_reg', $id_reg)
        ->where('id_com', $id_com)
        ->exists();
        
        
        $customerData = [
            'dni' => $request->dni,
            'id_reg' => $request->id_reg,
            'id_com' => $request->id_com,
            'email' => $request->email,
            'name' => $request->name,
            'lastname' => $request->last_name,
            'address' => $request->address,
            'date_reg' => $request->date_reg,
            'status' => $request->status
        ];
        
        $validator = Validator::make($customerData, [
            'dni' => 'required|unique:customers,dni|string|max:45',
            'id_reg' => 'required|numeric',
            'id_com' => 'required|numeric',
            'email' => 'required|unique:customers,email|email|max:120',
            'name' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'date_reg' => 'required|date',
            'status' => 'required|in:A,I,TRASH'
        ]);
        
        //dd("llega?");
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            

            return response()->json(
                $errors
              , 422);
        } else {
            if ($communeExists) {

                Customers::create($customerData);
                return response()->json(
                    ['message'=>'The user has been created succesfully',
                    ]
                  , 200);
            } else {
                return response()->json(
                    ['message'=>'You cannot register the user because there is no commune associated with the indicated region',
                    ]
                  , 422);
            }
        }
    }

    /**
     * Shows the customer list.
     *
     */
    public function customer_list(){
        
       $customers= Customers::where('status','A')->get();
        return response()->json(
            $customers
          , 200);
    }


    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Request  $request
     */
    public function customer_detail(Request $request){
        $dni = $request->input('dni');
        $email = $request->input('email');

        $customer= Customers::where('dni',$dni)
        ->Orwhere('email',$email)->first();
        
        return response()->json(
            $customer
          , 200);
    }

    /**
     * Soft delete the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */

    public function delete_customer(Request $request){
        $dni = $request->input('dni');

        if(Customers::where('dni',$dni)->exists()){
            Customers::where('dni',$dni)->delete();
            return response()->json(
                ['message'=>'Customer was deleted succesfully',
                    ]
              , 200);
        }

    }
}
