<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Personnel;
use Auth;
use App\VehicleType;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $AllPersonnels = Personnel::all();
         $AllPersonnels = Personnel::where('personneltype', '=', "Delivery")->get();
         $AllVehicleTypes = VehicleType::orderBy('vehicletype','asc')->get();
         $search = $request->search;
         $AllVehicles=Vehicle::when($search, function ($q)use ($search) {
                    $q->where('license_plate', 'like', "%{$search}%")
                    ->orwhere('vehicletype', 'like', "%{$search}%")
                    ->orwhere('made', 'like', "%{$search}%")
                    ->orwhere('delivery_personnel', 'like', "%{$search}%");
             
                    })->orderBy('license_plate')->paginate(10);
       
        return view('vehicles.index',[
        'vehicles'=>$AllVehicles,
        'AllVehicleTypes'=>$AllVehicleTypes,
        'AllPersonnels'=>$AllPersonnels
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $AllPersonnels = Personnel::all();
         return view('vehicles.addVehicle',[
            'AllPersonnels'=>$AllPersonnels
        ]);
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
            $this->validate($request,[
                "license_plate"=>"required|string|unique:vehicles",
                "vehicletype"=>"required",
                "made"=>"required|string|max:20",
                "delivery_personnel"=>"required|unique:vehicles,delivery_personnel"
            ]);
            
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->route('vehicles.index')
                ->with('open-create-modal', true)
                ->withInput($request->all())
                ->withErrors($e->validator);
        }
        $newVehicle = new Vehicle;
        $newVehicle->license_plate = $request->license_plate;
        $newVehicle->vehicletype = $request->vehicletype;
        $newVehicle->made = $request->made;
        $newVehicle->delivery_personnel=$request->delivery_personnel;
       
        $newVehicle->save();
        session()->flash('notif','('.$newVehicle->license_plate.') '.$newVehicle->made.' has been added successfully.');
        return redirect()->route('vehicles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.show',compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.edit',compact('vehicle'));
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
            $this->validate($request,[
                "license_plate"=>"required|string",
                "vehicletype"=>"required",
                "made"=>"required|string|max:20",
                "delivery_personnel"=>"required"
            ]);
            
        }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->route('vehicles.index')
                ->with('open-update-modal', $id)
                ->withInput($request->all())
                ->withErrors($e->validator);
        }

        $newVehicle = Vehicle::find($id);
        $newVehicle->license_plate=$request->license_plate;
        $newVehicle->vehicletype=$request->vehicletype;
        $newVehicle->made=$request->made;
        $newVehicle->delivery_personnel=$request->delivery_personnel;

        $newVehicle->save();
        session()->flash('update','('.$newVehicle->license_plate.') '.$newVehicle->made.' has been updated successfully.');
        return redirect()->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        session()->flash('delete','('.$vehicle->license_plate.') '.$vehicle->made.' has been deleted successfully.');
        return redirect()->route('vehicles.index');
    }
}
