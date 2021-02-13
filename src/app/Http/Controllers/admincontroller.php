<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class admincontroller extends Controller
{
    //-----------------------------------------------

    ///Home

    //---------------------------------------
    public function ahome(){
               session_start();
                //----------------
                if (isset($_SESSION["teacher_name"])) {
                    $name=$_SESSION["teacher_name"];
                    $id=$_SESSION["admin_id"];
                    $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
                    if($users->role==0){
                    return redirect()->action('maincontroller@home');
                    }}
                else {
                     return redirect()->action('maincontroller@home');
                }
                //-----------------
                return view("admin.adminhome")->with(['id'=>$id])->with(['name'=>$name]);
    }
    public function logout(){
        session_start();
        session_unset('teacher_name');
        session_unset('admin_id');
        return redirect()->action('maincontroller@home');  
    }
    //-----------------------------------------------



    ///Class




    //-----------------------------------------------
    public function classs(){
        session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $classs=DB::table('class')->get();
        return view("admin.home")->with(['class'=>$classs])->with(['name'=>$name]);
    }

    public function saveclass(Request $request)
    {
         session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $name=$request->input('class_name');
        $category=$request->input('category');
        $class_checking=DB::table('class')->where([['name',$name],['category',$category]])->first();
        if (isset($class_checking) ) {
            return redirect()->action('admincontroller@classs')->with('message','Class Already Exist');
        }
            DB::table('class')->insert
            (
                [
                'name'=>$name,
                'category'=>$category,
            ]);
            return redirect()->action('admincontroller@classs')->with(['name'=>$name])->with('message','Class Inserted successfully');
    }
    public function editclass(Request $request,$iddd)
    {
        session_start();
                //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $idd=$iddd;
        $class=DB::table('class')->where([['id',$iddd]])->first();
        return view("admin.editclass")->with(['class'=>$class]);
    }
    public function updateclass(Request $request)
    {
        session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $class_name=$request->input('class_name');

        $id=$request->input('class_id');
        $clas=DB::table('class')->where('id',$id)->first();
        $cc_name=$clas->name;
        
        DB::table('class')
            ->where('id', $id)
            ->update(['name' => $class_name]);



        $types = array('fitb' => "fill_in_the_blanks",'mcq'=>"mcq",'sq'=>"short_questions",'lq'=>"long_questions",'tf'=>"true/false" ,'subject'=>"subject",'chapters'=>"chapters");

        print($cc_name);
        print($class_name);
        foreach ($types as $key => $value) {
            $mcqid=DB::table($value)->where('class_name',$cc_name)->get();
            foreach ($mcqid as $mcq) {
                echo $mcq->id;
                DB::table($value)
               ->where('id', $mcq->id)
               ->update(['class_name' => $class_name]);
            }
        }
        return redirect()->action('admincontroller@classs')->with(['name'=>$name])->with('message','Class updated Successfuly');
    }
    public function deleteclass($iddd)
    {        
        session_start();
                //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $chpid=$iddd;
        $sub=DB::table('class')->where('id',$iddd)->first();
        $c_name=$sub->name;
        $types = array('fitb' => "fill_in_the_blanks",'mcq'=>"mcq",'sq'=>"short_questions",'lq'=>"long_questions",'tf'=>"true/false" ,'chapters'=>"chapters",'subject',"subject");
        foreach ($types as $key => $value) {
            $mcqid=DB::table($value)->where([['class_name',$c_name]])->get();
                foreach ($mcqid as $mcq) {
                        echo $mcq->id;
                            DB::table($value)->where('id', $mcq->id)->delete();
                    }   
        }
        DB::table('class')->where('id', $iddd)->delete();
        return redirect()->action('admincontroller@classs')->with(['name'=>$name])->with('message','Class deleted Successfuly');
    }


    //-----------------------------------------------




    ///Subject




    //-----------------------------------------------
    public function subject(){
        session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $class=DB::table('class')->get();
        $teacher=DB::table('teacher')->get();
        $subject=DB::table('subject')->get();
        return view("admin.subject")->with(['class'=>$class])->with(['teacher'=>$teacher])->with(['subject'=>$subject])->with(['name'=>$name]);
    }


    public function savesubject(Request $request)
    {
         session_start();
                 //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $name=$request->input('subject');
        $class=$request->input('class');
        $teacher=$request->input('teacher');
        $subject_checking=DB::table('subject')->where([['name',$name],['class_name',$class],['teacher_name',$teacher],])->first();
        if (isset($subject_checking) ) {
            return redirect()->action('admincontroller@subject')->with('message','Subject Already Exist');
            
        }
        DB::table('subject')->insert
        (
            [
            'name'=>$name,
            'class_name'=>$class,
            'teacher_name'=>$teacher,
        ]);
        return redirect()->action('admincontroller@subject')->with(['name'=>$name])->with('message','Subject Added successfully');
    }


    public function editsubject(Request $request,$iddd)
    {
        session_start();
                //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $idd=$iddd;
        $subject=DB::table('subject')->where([['id',$iddd]])->first();
        $class=DB::table('class')->get();
        $teacher=DB::table('teacher')->get();
        return view("admin.editsubject")->with(['subject'=>$subject])->with(['class'=>$class])->with(['teacher'=>$teacher])->with(['chpid'=>$idd])->with(['name'=>$name]);
    }
    public function updatesubject(Request $request)
    {
        session_start();
                //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $subject_name=$request->input('subject_name');
        $id=$request->input('id');
        $teacher_name=$request->input('teacher_name');
        $class_name=$request->input('class_name');
        //echo $id;
        //echo $subject_name;
        //echo $teacher_name;
        //echo $class_name;

        $sub=DB::table('subject')->where('id',$id)->first();
        $s_name=$sub->name;
        $t_name=$sub->teacher_name;
        $c_name=$sub->class_name;
        DB::table('subject')
            ->where('id', $id)
            ->update(['name' => $subject_name,'class_name' => $class_name,'teacher_name' => $teacher_name]);

         $types = array('fitb' => "fill_in_the_blanks",'mcq'=>"mcq",'sq'=>"short_questions",'lq'=>"long_questions",'tf'=>"true/false" ,'chapters'=>"chapters");

        foreach ($types as $key => $value) {
            $mcqid=DB::table($value)->where([['subject_name',$s_name],['teacher_name',$t_name],['class_name',$c_name]])->get();

            foreach ($mcqid as $mcq) {
                echo $mcq->id;
                DB::table($value)
               ->where('id', $mcq->id)
               ->update(['subject_name' => $subject_name,'class_name' => $class_name,'teacher_name' => $teacher_name]);
            }   
        }

        $class=DB::table('class')->get();
        $teacher=DB::table('teacher')->get();
        $subject=DB::table('subject')->get();
        return redirect()->action('admincontroller@subject')->with(['name'=>$name])->with('message','Subject updated Successfuly');
    }
    public function deletesubject($iddd)
    {        
        session_start();
                //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $chpid=$iddd;
        $sub=DB::table('subject')->where('id',$iddd)->first();
        $s_name=$sub->name;
        $t_name=$sub->teacher_name;
        $c_name=$sub->class_name;

        $types = array('fitb' => "fill_in_the_blanks",'mcq'=>"mcq",'sq'=>"short_questions",'lq'=>"long_questions",'tf'=>"true/false" ,'chapters'=>"chapters");

        foreach ($types as $key => $value) {

        $mcqid=DB::table($value)->where([['subject_name',$s_name],['teacher_name',$t_name],['class_name',$c_name]])->get();
        foreach ($mcqid as $mcq) {
                echo $mcq->id;
                DB::table($value)->where('id', $mcq->id)->delete();
            }   
        }

         DB::table('subject')->where('id', $iddd)->delete();
        // $class=DB::table('class')->get();
        // $teacher=DB::table('teacher')->get();
        // $subject=DB::table('subject')->get();


        return redirect()->action('admincontroller@subject')->with(['name'=>$name])->with('message','Subject Deleted Successfuly');
    }


    //-----------------------------------------------




    ///teacher




    //-----------------------------------------------
    public function teacher(){
        session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $teacher=DB::table('teacher')->get();
        return view("admin.teacher")->with(['teacher'=>$teacher])->with(['name'=>$name]);
    }
    public function saveteacher(Request $request)
    {
         session_start();
                 //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $name=$request->input('teacher_name');
        $designation=$request->input('designation');
        $contact=$request->input('contact_no');
        $email=$request->input('email');
        $password=$request->input('password');
        $teacherCheck=DB::table('teacher')->where([['email',$email]])->first();
        if (isset($teacherCheck) ) {
            return redirect()->action('admincontroller@teacher')->with('message','Teacher Already Exist');
        }
        DB::table('teacher')->insert
        (
            [
            'name'=>$name,
            'designation'=>$designation,
            'contact'=>$contact,
            'email'=>$email,
            'password'=>$password,
            'role'=>0,
        ]);

         // $email_from = "fazil.kiu@gmail.com"; // Who the email is from
         // $email_subject = "Your Email and Password";// The Subject of the email 
         // $email_message =" Your email id is ".$email." and password is ".$password;// Message that the email has in it 

// $host = "ssl://smtp.dreamhost.com";
// $username = "fazil.kiu@gmail.com";
// $password = "mohsin1234";
// $port = "465";
// $to = $email;
// $email_from = "fazil.kiu@gmail.com";
// $email_subject = "Your Email and Password";
// $email_body = " Your email id is ".$email." and password is ".$password;
// $email_address = "aqpgs@example.com";

// $headers = array ('From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address);
// $smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
// $mail = $smtp->send($to, $headers, $email_body);
            
        return redirect()->action('admincontroller@teacher')->with(['name'=>$name])->with('message','Teacher Added Successfuly');
    }

    public function editteacher(Request $request,$iddd)
    {
        session_start();
                //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $idd=$iddd;
        $teacher=DB::table('teacher')->where([['id',$iddd]])->first();
        return view("admin.editteacher")->with(['teacher'=>$teacher])->with(['name'=>$name]);
    }
    public function updateteacher(Request $request)
    {
        session_start();
                //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $id=$request->input('id');
        $teacher_name=$request->input('teacher_name');
        $teacher_contact=$request->input('teacher_contact');
        $teacher_designation=$request->input('teacher_designation');
        DB::table('teacher')
            ->where('id', $id)
            ->update(['name' => $teacher_name,'contact' => $teacher_contact,'designation' => $teacher_designation]);
        return redirect()->action('admincontroller@teacher')->with(['name'=>$name])->with('message','Teacher Updated Successfuly');
    }
    public function deleteteacher($iddd)
    {        
        session_start();
                //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $chpid=$iddd;
        $sub=DB::table('teacher')->where('id',$iddd)->first();
        $t_name=$sub->name;
        $types = array('fitb' => "fill_in_the_blanks",'mcq'=>"mcq",'sq'=>"short_questions",'lq'=>"long_questions",'tf'=>"true/false" ,'chapters'=>"chapters",'subject',"subject");

        foreach ($types as $key => $value) {
        $mcqid=DB::table($value)->where([['teacher_name',$t_name]])->get();
        foreach ($mcqid as $mcq) {
                echo $mcq->id;
                 DB::table($value)
                ->where('id', $mcq->id)
                ->update(['teacher_name' => " "]);  
            }   
        }
        DB::table('teacher')->where('id', $iddd)->delete();
        return redirect()->action('admincontroller@teacher')->with(['name'=>$name])->with('message','Teacher Deleted Successfuly');
    }





    //-----------------------------------------------
    ///generate
    //-----------------------------------------------
    public function generate(Request $request){
        session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else{
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $message="ee";
        $message=$request->message;
        $classs=DB::table('class')->get();
        return view("admin.generate")->with(['class'=>$classs])->with(['name'=>$name])->with(['message'=>$message]);
    }



    public function generate1(Request $request){
        session_start();

                 //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $class=DB::table('class')->get();
        $class_name=$request->input('class');
        $subject_name=$request->input('subject');
        $chapter_name=$request->input('chapters');
        $school=$request->input('school');
        $exam=$request->input('exam');
        $time=$request->input('time');
        $fil=0;
        $lq=0;
        $mq=0;
        $sq=0;
        $tf=0;
            foreach ($chapter_name as $key => $value) {
            $datafil=DB::table('fill_in_the_blanks')->where([['chapter_name',$value],['subject_name',$subject_name],['class_name',$class_name]])->get();
                foreach ($datafil as $k => $val) {
                    $fil=$fil+1;
                }
            $datalq=DB::table('long_questions')->where([['chapter_name',$value],['subject_name',$subject_name],['class_name',$class_name]])->get();
                foreach ($datalq as $k => $val) {
                    $lq=$lq+1;
                }
            $datamq=DB::table('mcq')->where([['chapter_name',$value],['subject_name',$subject_name],['class_name',$class_name]])->get();
                foreach ($datamq as $k => $val) {
                    $mq=$mq+1;
                }
            $datasq=DB::table('short_questions')->where([['chapter_name',$value],['subject_name',$subject_name],['class_name',$class_name]])->get();
                foreach ($datasq as $k => $val) {
                    $sq=$sq+1;
                }
            $datatf=DB::table('true/false')->where([['chapter_name',$value],['subject_name',$subject_name],['class_name',$class_name]])->get();
                foreach ($datatf as $k => $val) {
                    $tf=$tf+1;
                }
            }
         
        return view("admin.generate1")->with('school',$school)->with('exam',$exam)->with('time',$time)->with('chapter_name',$chapter_name)->with('class_name',$class_name)->with('subject_name',$subject_name)->with(['name'=>$name])->with(['fil'=>$fil])->with(['mq'=>$mq])->with(['lq'=>$lq])->with(['sq'=>$sq])->with(['tf'=>$tf]);
    }


    public function generate2(Request $request){
         session_start();
                 //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $class=DB::table('class')->get();
        $class_name=$request->input('class');
        $subject_name=$request->input('subject');
        $chapter_name=$request->input('chapters');
        $school=$request->input('school');
        $exam=$request->input('exam');
        $time=$request->input('time');
        $fitb=$request->input('fitb');
        $fitb_marks=$request->input('fitb_marks');
        $mcqs=$request->input('mcqs');
        $mcqs_marks=$request->input('mcqs_marks');
        $long=$request->input('long');
        $long_marks=$request->input('long_marks');
        $short=$request->input('short');
        $short_marks=$request->input('short_marks');
        $tf=$request->input('tf');
        $tf_marks=$request->input('tf_marks');

        $tmarks=($tf_marks*$tf)+($fitb_marks*$fitb)+($mcqs_marks*$mcqs)+($long_marks*$long)+($short_marks*$short);
        $check=$fitb+$mcqs+$long+$short+$tf;
        if ($fitb>0) {
            if ($fitb_marks==0) {
                return redirect()->action('admincontroller@generate')->with('message',"fill_in_the_blanks Marks...?");
            }
        }
        if ($mcqs>0) {
            if ($mcqs_marks==0) {
                return redirect()->action('admincontroller@generate')->with('message',"Mcqs Marks...?");
            }
        }
        if ($long>0) {
            if ($long_marks==0) {
                return redirect()->action('admincontroller@generate')->with('message',"Long questions Marks...?");
            }
        }
        if ($short>0) {
            if ($short_marks==0) {
                return redirect()->action('admincontroller@generate')->with('message',"short questions Marks...?");
            }
        }
        if ($tf>0) {
            if ($tf_marks==0) {
                return redirect()->action('admincontroller@generate')->with('message',"true false Marks...?");
            }
        }
        if ($check>0) {
         $fill_in_the_blanks=DB::table('fill_in_the_blanks')->where('subject_name',$subject_name)->where('class_name',$class_name)->whereIn('chapter_name',$chapter_name)->inRandomOrder()->take($fitb)->get();
        $mcqs=DB::table('mcq')->where('subject_name',$subject_name)->where('class_name',$class_name)->whereIn('chapter_name',$chapter_name)->inRandomOrder()->take($mcqs)->get();
        $short_questions=DB::table('short_questions')->where('subject_name',$subject_name)->where('class_name',$class_name)->whereIn('chapter_name',$chapter_name)->inRandomOrder()->take($short)->get();
        $long_questions=DB::table('long_questions')->where('subject_name',$subject_name)->where('class_name',$class_name)->whereIn('chapter_name',$chapter_name)->inRandomOrder()->take($long)->get();
        $true_false=DB::table('true/false')->where('subject_name',$subject_name)->where('class_name',$class_name)->whereIn('chapter_name',$chapter_name)->inRandomOrder()->take($tf)->get();
         return view("admin.generate22")->with('school',$school)->with('exam',$exam)->with('tmarks',$tmarks)->with('time',$time)->with('fill_in_the_blanks',$fill_in_the_blanks)->with('mcqs',$mcqs)->with('long_questions',$long_questions)->with('short_questions',$short_questions)->with('true_false',$true_false)->with('fitb_marks',$fitb_marks)->with('mcqs_marks',$mcqs_marks)->with('long_marks',$long_marks)->with('short_marks',$short_marks)->with('tf_marks',$tf_marks)->with('class_name',$class_name)->with('subject_name',$subject_name);
        }

        else{

            return redirect()->action('admincontroller@generate')->with('message',"Please Select Questions");
        }
    }



    //



    // ajax



    //

    public function findchapters(Request $request)
    {
         session_start();
                 //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $data=DB::table('chapters')->where('subject_name',$request->id)->get();
        return response()->json($data);
    }
    public function findsubject(Request $request)
    {
         session_start();
                 //----------------
        if (isset($_SESSION["teacher_name"])) {
            $name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==0){
            return redirect()->action('maincontroller@home');
            }
        }
        else {
             return redirect()->action('maincontroller@home');
        }
        //-----------------
        $data=DB::table('subject')->where('class_name',$request->id)->get();
        return response()->json($data);
    }

}
