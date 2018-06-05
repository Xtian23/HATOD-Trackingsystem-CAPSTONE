<?php

namespace App\Http\Controllers;

use App\Personnel;
use App\PersonnelType;
use App\User;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $AllPersonnelTypes = PersonnelType::orderBy('personneltype', 'asc');
        $search = $request->search;
        $AllPersonnels = Personnel::when($search, function ($q) use ($search) {
            $q->where('personnel_fname', 'like', "%{$search}%")
                ->orwhere('personnel_lname', 'like', "%{$search}%")
                ->orwhere('address', 'like', "%{$search}%")
                ->orwhere('contact_no', 'like', "%{$search}%")
                ->orwhere('personneltype', 'like', "%{$search}%");
        })->orderBy('personnel_fname')->paginate(10);

        return view('personnels.index', ['personnels' => $AllPersonnels,
            'AllPersonnelTypes' => $AllPersonnelTypes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('personnels.addPersonnel');
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
            //validation for input Customer
            $this->validate($request, [
                "usertype" => "required",
                "username" => "required",
                "password" => "required",
                "personnel_fname" => "required|regex:/^[a-zA-Z0-9\s]+$/",
                "personnel_lname" => "required|regex:/^[a-zA-Z0-9\s]+$/",
                "address" => "required|string",
                "birthdate" => "required|before:-1 year",
                "contact_no" => "required|numeric|digits:11",
                "personneltype" => "required",
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('personnels.index')
                ->with('open-create-modal', true)
                ->withInput($request->all())
                ->withErrors($e->validator);
        }

        $newUser = new User;
        $newUser->usertype = $request->usertype;
        $newUser->username = $request->username;
        $newUser->fname = $request->personnel_fname;
        $newUser->lname = $request->personnel_lname;
        $newUser->address = $request->address;
        $newUser->birthdate = $request->birthdate;
        $newUser->contact_no = $request->contact_no;
        $newUser->password = bcrypt($request->password);
        $newUser->save();
        $newPersonnel = new Personnel;
        $newPersonnel->personnel_fname = $request->personnel_fname;
        $newPersonnel->personnel_lname = $request->personnel_lname;
        $newPersonnel->address = $request->address;
        $newPersonnel->birthdate = $request->birthdate;
        $newPersonnel->contact_no = $request->contact_no;
        $newPersonnel->personneltype = $request->personneltype;
        $newPersonnel->color = $request->color;
        $newPersonnel->user_id = $newUser->id;
        $newPersonnel->save(); //saving all the data filled from input form into the databases

        session()->flash('notif', $newPersonnel->personnel_fname . ' ' . $newPersonnel->personnel_lname . ' has been added successfully.'); //displaying notification for storing successfully
        return redirect()->route('personnels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personnel = Personnel::find($id);
        return view('personnels.show', compact('personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personnel = Personnel::find($id);
        return view('personnels.edit', compact('personnel'));
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
            //validation for input Customer
            $this->validate($request, [
                "usertype" => "required",
                "username" => "nullable",
                "password" => "nullable",
                "personnel_fname" => "required|regex:/^[a-zA-Z0-9\s]+$/",
                "personnel_lname" => "required|regex:/^[a-zA-Z0-9\s]+$/",
                "address" => "required|string",
                "birthdate" => "required|before:-18 year",
                "contact_no" => "required|numeric|digits:11",
                "personneltype" => "required",
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('personnels.index')
                ->with('open-update-modal', $id)
                ->withInput($request->all())
                ->withErrors($e->validator);
        }

        // $newUser = User::find($id);
        // $newUser->usertype=$request->usertype;
        // $newUser->username=$request->username;
        // $newUser->fname=$request->personnel_fname;
        // $newUser->lname=$request->personnel_lname;
        // $newUser->address=$request->address;
        // $newUser->birthdate=$request->birthdate;
        // $newUser->contact_no=$request->contact_no;
        // $newUser->password=bcrypt($request->password);
        $newPersonnel = Personnel::find($id);
        $newPersonnel->personnel_fname = $request->personnel_fname;
        $newPersonnel->personnel_lname = $request->personnel_lname;
        $newPersonnel->address = $request->address;
        $newPersonnel->birthdate = $request->birthdate;
        $newPersonnel->contact_no = $request->contact_no;
        $newPersonnel->personneltype = $request->personneltype;
        $newPersonnel->color = $request->color;

        // $newUser->save();
        $newPersonnel->save();
        session()->flash('update', $newPersonnel->personnel_fname . ' ' . $newPersonnel->personnel_lname . ' has been updated successfully.'); //displaying notification for updating successfully
        return redirect()->route('personnels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personnel = Personnel::find($id);
        $personnel->delete();
        session()->flash('delete', $personnel->personnel_fname . ' ' . $personnel->personnel_lname . ' has been deleted successfully.'); //displaying notification for deleting successfully
        return redirect()->route('personnels.index');
    }
}
