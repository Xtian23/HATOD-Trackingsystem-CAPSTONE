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

   		$this->validate($request,[
        "userimage"=>"image",
   			"username"=>"required|string|unique:users",
   			"fname"=>"required|regex:/^[a-zA-Z\s]+$/",
   			"lname"=>"required|regex:/^[a-zA-Z\s]+$/",
   			"birthdate"=>"required|before:-1 year|date",
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
      session()->flash('notif',$user->fname . ' ' . $user->lname . ' Registered Successfully!, Please Login');



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
        "userimage"=>"image",
        "username"=>"required|string",
        "fname"=>"required|regex:/^[a-zA-Z\s]+$/",
        "lname"=>"required|regex:/^[a-zA-Z\s]+$/",
        "birthdate"=>"required|before:-1 year|date",
        "password"=>"nullable|min:4|same:password_confirmation",
        "password_confirmation"=>"nullable|same:password"

      ]);
        $user =  User::find($id);
        $user->title=Input::get('username');

        if($request->hasFile('userimage')){
            $user->userimage = $request->file('userimage')->store('user-images', 'public');
        }

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

          session()->flash('update',$user->fname . ' ' . $user->lname . ' has been updated successfully.');
        return redirect('/user');
    }



}


