<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;
use User;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
 
     //  code for searching in table
        $search = $request->search;
        $AllCustomers=Customer::when($search, function ($q)use ($search) {
            $q->where('customer_fname', 'like', "%{$search}%")
            ->orwhere('customer_lname', 'like', "%{$search}%")
            ->orwhere('address', 'like', "%{$search}%")
            ->orwhere('contact_no', 'like', "%{$search}%")
            ->orwhere('email_add', 'like', "%{$search}%");
             })->orderBy('customer_fname','asc')->paginate(10);;
                // arrange data alphabetically
      
        return view('customers.index',[
            'customers'=>$AllCustomers

      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //return view('customers.addCustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            //validation for input customer
            $this->validate($request,[
                "customer_fname"=>"required|string|regex:/^[a-zA-Z\s]+$/",
                "customer_lname"=>"required|string|regex:/^[a-zA-Z\s]+$/",
                "address"=>"required|string",
                "birthdate"=>"required|date|before:-1 year",
                "contact_no"=>"required|numeric|digits:11",
                "email_add"=>"email|nullable"
             
            ]);

        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->route('customers.index')
                ->with('open-create-modal', true)
                ->withInput($request->all())
                ->withErrors($e->validator);
        }
        
        
        //code for storing data to the table(database)
        $newCustomer = new Customer;
        $newCustomer->customer_fname=$request->customer_fname;
        $newCustomer->customer_lname=$request->customer_lname;
        $newCustomer->address=$request->address;
        $newCustomer->birthdate=$request->birthdate;
        $newCustomer->contact_no=$request->contact_no;
        $newCustomer->email_add=$request->email_add;

        $newCustomer->save(); //saves all the data(s) besing filled from form
        session()->flash('notif',$newCustomer->customer_fname.' '. $newCustomer->customer_lname.' has been added successfully.'); //displaying notification for success storing into the database
        return redirect()->route('customers.index'); //after storing to the databse  ,will be redirected to the customer list
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
       return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            //validation for input customer
            $this->validate($request,[
                "customer_fname"=>"required|string|regex:/^[a-zA-Z\s]+$/",
                "customer_lname"=>"required|string|regex:/^[a-zA-Z\s]+$/",
                "address"=>"required|string",
                "birthdate"=>"required|date|before:-1 year",
                "contact_no"=>"required|numeric|digits:11",
                "email_add"=>"email|nullable"
             
            ]);

        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->route('customers.index')
                ->with('open-update-modal', $id)
                ->withInput($request->all())
                ->withErrors($e->validator);
        }

        $newCustomer = Customer::find($id);
        $newCustomer->customer_fname=$request->customer_fname;
        $newCustomer->customer_lname=$request->customer_lname;
        $newCustomer->address=$request->address;
        $newCustomer->birthdate=$request->birthdate;
        $newCustomer->contact_no=$request->contact_no;
        $newCustomer->email_add=$request->email_add;

        $newCustomer->save();//saves all the data(s) besing filled from form UPDATE
        session()->flash('update',$newCustomer->customer_fname.' '. $newCustomer->customer_lname.' has been updated successfully.');//displaying notification for success update into the database
        return redirect()->route('customers.index'); //after updating to the databse  ,will be redirected to the customer list   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete(); //deletion of the selected id
        session()->flash('delete',$customer->customer_fname.' '. $customer->customer_lname.' has been deleted successfully.');//displaying notification for success deletion into the database
        return redirect()->route('customers.index');
       
    }
}
