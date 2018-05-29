<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersonnelType;

class PersonnelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AllPersonnelTypes=PersonnelType::all();
        $AllPersonnelTypes=PersonnelType::orderBy('personneltype','asc')->get();
        return view('personneltypes.index',[
                   'personneltypes'=>$AllPersonnelTypes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personneltypes.addPersonnelType');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPersonneltype = new PersonnelType;
        $newPersonneltype->personneltype=$request->personneltype;
        $newPersonneltype->save();

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
        $personneltype = PersonnelType::find($id);
        return view('personneltypes.edit',compact('personneltype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personneltype = PersonnelType::find($id);
        return view('personneltypes.edit',compact('personneltype'));
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
        $newPersonneltype =  PersonnelType::find($id);
        $newPersonneltype->personneltype=$request->personneltype;
        $newPersonneltype->save();
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
        $personneltype=PersonnelType::find($id);
        $personneltype->delete();
        return redirect('personnels.index');

    }
}
