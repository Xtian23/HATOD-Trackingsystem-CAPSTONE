<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input; 
use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
   public function register(Request $request)
   {  
   		// return $request->username.$request->fname.$request->lname;
   		$this->validate($request,[
   			"username"=>"required|string|unique:users",
   			"fname"=>"required|string",
   			"lname"=>"required|string",
   			"birthdate"=>"required",
   			"password"=>"required|min:4|same:password_confirmation",
   			"password_confirmation"=>"same:password"

   		]);

   		$user= new User;

        
        $user->title=Input::get('username');
        $user->userimage = $request->file('userimage')->store('user-images', 'public');

       

   		$user->username=$request->username;
   		$user->fname=$request->fname;
   		$user->lname=$request->lname;
   		$user->birthdate=$request->birthdate;
   		$user->password=bcrypt($request->password);
      $user->address=$request->address;
      $user->email_add=$request->email_add;
      $user->contact_no=$request->contact_no;
      $user->usertype=$request->usertype;
      $user->save();
      session()->flash('notif',' Registered Successfully!, Please Login');



   return redirect('/register');

   }

   function login(Request $request){

      $this->validate($request,[          
            "username"=>"required",
            "password"=>"required|min:4"
        ]);  

      $credentials=$request->all([
         'username','password'
        ]);

       $login=Auth::attempt($credentials);
  
      if($login){
        if(Auth::user()->usertype=='admin'){
              return redirect('/index')->with('message', 'Welcome to HATOD TRACKINGSYSTEM!');

            }
            else {
              return redirect('/clerkindex')->with('message', 'Welcome to HATOD TRACKINGSYSTEM!');
            }
      }
      else
      {
         return redirect()->back()->with('loginError','Username or Password error. Please try again');
      }

   }

   public function logout(Request $request) {

          if(Auth::user()->usertype=='admin'){
             return redirect('/login')->with(Auth::logout());
          }else{
            return redirect('/clerklogin')->with(Auth::logout());
          }
        

  }


   public function index()  
   {
         return view('accountsetting');
   }


     public function edit($id)
    {
        $User = User::find($id);
        return view('users.edit',compact('user'));
    }


     public function update(Request $request, $id)
    {


          $this->validate($request,[
        "username"=>"string|nullable",
        "fname"=>"string",
        "lname"=>"string",
        "birthdate"=>"date",
        "password"=>"min:4|same:password_confirmation|nullable",
        "password_confirmation"=>"same:password|nullable"

      ]);
        $user =  User::find($id);
        //        $user->userimage=$request->userimage;
        // $user->title=Input::get('username');

        //      if (Input::hasFile('userimage')){
        //         $newuser=Input::file('userimage');
        //         $newuser->move(public_path().'/', $newuser->getClientOriginalName());
        //         $user->name=$newuser->getClientOriginalName();
        //     }
        $user->username=$request->username;
        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->birthdate=$request->birthdate;

        // for uodate password
        if(trim($request->password)){
          $user->password=bcrypt($request->password);
        }
        
        $user->address=$request->address;
        $user->email_add=$request->email_add;
        $user->contact_no=$request->contact_no;
        $user->usertype=$request->usertype;
        $user->save();

        return redirect('/user');
    }

    //   public function destroy($id)
    // {
    //     $unit=Unit::find($id);
    //     $unit->delete();

    //     return redirect('products.index');

    // }


}


