<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class maincontroller extends Controller
{
    public function home(Request $request)
    {
        session_start();
        // session code start 
        if (isset($_SESSION['teacher_name'])) {
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            $class=DB::table('class')->get();
            $name=$users->name;
            $id=$users->id;
                if($users->role==1){

                    return view("admin.adminhome")->with(['class'=>$class])->with(['id'=>$id])->with(['name'=>$name]);
                }
                if($users->role==0){
                    //echo $_SESSION["teacher_name"];
                    //$teacher=DB::table('subject')->where([['teacher_name',$name]])->get();
                    //$teacher->teacher_name;
                    //return view("faculty.home")->with(['teacher'=>$teacher])->(['teacher_name'=>$te]);
                    return redirect()->action('facultycontroller@fhome');
                }
            
        }else{

            return view("home");
        }
    }

    public function aboutus()
    {

        session_start();
        // session code start 
        if (isset($_SESSION['teacher_name'])) {
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            $class=DB::table('class')->get();
            $name=$users->name;
            $id=$users->id;
                if($users->role==1){

                    return view("admin.adminhome")->with(['class'=>$class])->with(['id'=>$id])->with(['name'=>$name]);
                }
                if($users->role==0){
                    //echo $_SESSION["teacher_name"];
                    //$teacher=DB::table('subject')->where([['teacher_name',$name]])->get();
                    //$teacher->teacher_name;
                    //return view("faculty.home")->with(['teacher'=>$teacher])->(['teacher_name'=>$te]);
                    return redirect()->action('facultycontroller@fhome');
                }
            
        }else{
            //end session
            return view("about");
        }
        

    }
    
    public function contact()
        
    {
        session_start();
        // session code start 
        if (isset($_SESSION['teacher_name'])) {
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            $class=DB::table('class')->get();
            $name=$users->name;
            $id=$users->id;
                if($users->role==1){

                    return view("admin.adminhome")->with(['class'=>$class])->with(['id'=>$id])->with(['name'=>$name]);
                }
                if($users->role==0){
                    //echo $_SESSION["teacher_name"];
                    //$teacher=DB::table('subject')->where([['teacher_name',$name]])->get();
                    //$teacher->teacher_name;
                    //return view("faculty.home")->with(['teacher'=>$teacher])->(['teacher_name'=>$te]);
                    return redirect()->action('facultycontroller@fhome');
                }
            
        }else{
            //end session
            return view("contact");
        }
        
    }
     
     public function login()
     {
        session_start();
        // session code start 
        if (isset($_SESSION['teacher_name'])) {
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            $class=DB::table('class')->get();
            $name=$users->name;
            $id=$users->id;
                if($users->role==1){
                    return view("admin.adminhome")->with(['class'=>$class])->with(['id'=>$id])->with(['name'=>$name]);
                }
                if($users->role==0){
                    return redirect()->action('facultycontroller@fhome');
                }
            
        }else{
            //end session
            return view("login");
        }
        
     }

     public function register(){
        session_start();
        return view("register");
     }
    public function editsubject(){
        session_start();
        return view("editsubject");
     }
     
      public function show_questions(){
        session_start();
        return view("show_questions");
     }
     public function loginuser(Request $request){
        session_start();
        $email=$request->input("email");
        $password=$request->input("password");

        $users=DB::table('teacher')->where([['email',$email],['password',$password]])->first();
        if ($users) {
            $name=$users->name;
            $class=DB::table('class')->get();
            $id=$users->id;
            $_SESSION["teacher_name"]=$name;
            $_SESSION["admin_id"]=$id;
            if(count($users)>0){
                if($users->role==1){
                    return view("admin.adminhome")->with(['class'=>$class])->with(['id'=>$id])->with(['name'=>$name]);
                }
                if($users->role==0){
                    //echo $_SESSION["teacher_name"];
                    //$teacher=DB::table('subject')->where([['teacher_name',$name]])->get();
                    //$teacher->teacher_name;
                    //return view("faculty.home")->with(['teacher'=>$teacher])->(['teacher_name'=>$te]);
                    return redirect()->action('facultycontroller@fhome');
                }
            }
        }else{
            return redirect()->action('maincontroller@home')->with('message','Login Fail');
        }
        

       
     }

     public function registeruser(Request $request){
        session_start();
        $name=$request->input('name');
        $email=$request->input("email");
        $password=$request->input("password");
        $conform_password=$request->input("conformpassword");
        $role=$request->input("role");
        if($password!=$conform_password)
        {
            return redirect()->action('maincontroller@register')->with('message','Passwords are not same');
        }
        $exists=0;
        //$admin=0;
        $e_mail=DB::table('teacher')->get();
        $admin=DB::table('teacher')->get();
        if($role==1)
        {
            foreach($admin as $u)
            {
                if($u->role==1)
                {
                    return redirect()->action('maincontroller@register')->with('message','Admin already exists');
                }    
            }
        }
        foreach($e_mail as $e)
        {
            if($e->email==$email)
            {
                $exists=1;
            }
        }

        if($exists==1)
        {
           return redirect()->action('maincontroller@register')->with('message','Email already exists');
        }
        else
        {
            DB::table('teacher')->insert
            (
                [
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
                'role'=>$role
            ]);

            if($role==1)
            {
               return redirect()->action('maincontroller@home')->with('message','Admin added successfully');
            }
            else if($role==0)
            {
                return redirect()->action('maincontroller@home')->with('message','user added successfully');
            }
        }
     }



 }
