<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Product;
use App\Unit;
use Illuminate\validation\Rule;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $AllUnits = Unit::orderBy('unit','asc')->get();    
        $search = $request->search;
        $AllProducts=Product::when($search, function ($q)use ($search) {
                $q->where('itemname', 'like', "%{$search}%")
                ->orwhere('item_description', 'like', "%{$search}%")
                ->orwhere('unit', 'like', "%{$search}%")
                ->orwhere('unitprice', 'like', "%{$search}%");
        })->orderBy('itemname')->paginate(10);
      
            return view('products.index',[
                        'products'=>$AllProducts,
                        'AllUnits'=>$AllUnits
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {

        $AllUnits = Unit::all();
        return view('products.index',[
                    'AllUnits'=>$AllUnits
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
            //validation for input products
            $this->validate($request,[
            "itemimage"=>"required|image",
            "itemname"=>"required|string|unique:products",
            "item_description"=>"required|string|max:150",
            "unitprice"=>"required",
            "unit"=>"required"
             ]);


           }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->route('products.index')
                ->with('open-create-modal', true)
                ->withInput($request->all())
                ->withErrors($e->validator);
        }

        $newProduct = new Product;
        $newProduct->title=Input::get('item_description');
        $newProduct->itemimage = $request->file('itemimage')->store('item-images', 'public');

        $newProduct->name = '  ';


        $newProduct->itemname=$request->itemname;
        $newProduct->unit=$request->unit;
        $newProduct->unitprice=$request->unitprice;
        $newProduct->item_description=$request->item_description;

        $newProduct->save();
        session()->flash('notif',$newProduct->itemname.' has been added successfully.');
        return redirect()->route('products.index');

    }
    /**
     * Display the specified resource.
     *

     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Product::find($id);
        return view('products.edit',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $product = Product::find($id);
         return view('products.edit',compact('product'));
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
        //validation for input products
            $this->validate($request,[
            "itemimage"=>"image",
            "itemname"=> ['required', 'string', Rule::unique('products')->where(function ($q) use ($id){
                return $q->where('id', '!=', $id)->whereNull('deleted_at');
            })],
            "item_description"=>"required|string|max:150",
            "unitprice"=>"required",
            "unit"=>"required"
             ]);

            }catch(\Illuminate\Validation\ValidationException $e){
            return redirect()->route('products.index')
                ->with('open-update-modal', $id)
                ->withInput($request->all())
                ->withErrors($e->validator);
        }

        $newProduct = Product::find($id);
        // $newProduct->itemimage=$request->itemimage;
        $newProduct->title=Input::get('item_description');

        if($request->hasFile('itemimage')){
            $newProduct->itemimage = $request->file('itemimage')->store('item-images', 'public');
        }
        $newProduct->name = '  ';
  
        $newProduct->itemname=$request->itemname;
        $newProduct->unit=$request->unit;
        $newProduct->unitprice=$request->unitprice;
        $newProduct->item_description=$request->item_description;

        $newProduct->save();
        session()->flash('update',$newProduct->itemname.' has been updated successfully.');
        return redirect()->route('products.index');
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('delete',$product->itemname.' has been deleted successfully.');

        return redirect()->route('products.index');
       
    }
}
