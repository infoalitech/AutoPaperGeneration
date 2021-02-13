<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class facultycontroller extends Controller
{
    function check(){

    }
    public function fhome(){
        //return view("faculty.home");
        session_start();
       
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $teacher_name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==1){
                 return redirect()->action('maincontroller@home');
            }
        }
        else{
            return redirect()->action('maincontroller@home');
        }

        //-------------------
        $teacher=DB::table('teacher')->where([['id',$id]])->get();
        return view("faculty.fhome")->with(['id'=>$id])->with(['name'=>$teacher_name]);
    }

    public function faculty(){
        //return view("faculty.home");
        session_start();
       
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $teacher_name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==1){
                 return redirect()->action('maincontroller@home');
            }
        }
        else{
            return redirect()->action('maincontroller@home');
        }

        //-------------------
        $teacher=DB::table('subject')->where([['teacher_name',$teacher_name]])->get();
        return view("faculty.home")->with(['teacher'=>$teacher])->with(['name'=>$teacher_name]);
    }

    public function questions()
    {
        session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $teacher_name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==1){
                 return redirect()->action('maincontroller@home');
            }
        }
        else{
            return redirect()->action('maincontroller@home');
        }

        //-------------------
        $teacher_name=$_SESSION["teacher_name"];
        $subject=DB::table('subject')->distinct()->where([['teacher_name',$teacher_name]])->get(['name']);
        $class=DB::table('subject')->distinct()->where([['teacher_name',$teacher_name]])->get(['class_name']);   
        return view("faculty.questions")->with(['subject'=>$subject])->with(['class'=>$class])->with(['name'=>$teacher_name]);
    }

    public function chapters(){
        session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $teacher_name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==1){
                 return redirect()->action('maincontroller@home');
            }
        }
        else{
            return redirect()->action('maincontroller@home');
        }

        //-------------------
        $teacher_name=$_SESSION["teacher_name"];
        $subject=DB::table('subject')->where([['teacher_name',$teacher_name]])->get();
        $class=DB::table('subject')->distinct()->where([['teacher_name',$teacher_name]])->get(['class_name']);
        $chapters=DB::table('chapters')->where([['teacher_name',$teacher_name]])->get();
        $chapterlist=DB::table('chapters')->where([['teacher_name',$teacher_name]])->get();
        $classlist=DB::table('subject')->distinct()->where([['teacher_name',$teacher_name]])->get(['class_name']);
        //$subjectlist=DB::table('subject')->distinct()->where([['teacher_name',$teacher_name]])->get(['subject_name']);

        /*foreach ($classlist as $c) {
            echo $c->name;
            echo $c->subject_name;
        }*/
        return view("faculty.chapters")->with(['subject'=>$subject])->with(['class'=>$class])->with(['chapters'=>$chapters])->with(['chapterlist'=>$chapterlist])->with(['classlist'=>$classlist])->with(['name'=>$teacher_name]);
    }


    public function savechapters(Request $request)
    {
        session_start();
                //----------------
        if (isset($_SESSION["teacher_name"])) {
            $teacher_name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==1){
                 return redirect()->action('maincontroller@home');
            }
        }
        else{
            return redirect()->action('maincontroller@home');
        }

        //-------------------

        $name=$request->input('chapter_name');
        $subject=$request->input('subject');
        $class=$request->input('class');
        $subject_id=$request->input('subject_id');
        $teacher_name=$_SESSION["teacher_name"];
        $subjets=DB::table('subject')->where([['name',$subject],['class_name',$class]])->first();
        if (isset($subjets)) {
            $subject_id=$subjets->id;
            $chapter_check=DB::table('chapters')->where([['name',$name],['teacher_name',$teacher_name],['class_name',$class]])->first();
            if (isset($chapter_check) ) {
                return redirect()->action('facultycontroller@chapters')->with('message','Chapter Already Exist');
            }
        }
       

        DB::table('chapters')->insert
        (
            [
            'name'=>$name,
            'subject_name'=>$subject,
            'class_name'=>$class,
            'teacher_name'=>$teacher_name,
        ]);

        return redirect()->action('facultycontroller@chapters')->with(['name'=>$teacher_name])->with('message','Chapter added successfully');

    }

    public function addquestions(Request $request){
        session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $teacher_name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==1){
                 return redirect()->action('maincontroller@home');
            }
        }
        else{
            return redirect()->action('maincontroller@home');
        }

        //-------------------
        $type=$request->input('type');
        $class_name=$request->input('class');
        $subject_name=$request->input('subject');
        $chapters=DB::table('chapters')->distinct()->where([['subject_name',$subject_name],['class_name',$class_name]])->get(['name']);
        /*foreach ($chapters as $c) {
            echo $c->name;
        }*/

        $teacher_name=$_SESSION["teacher_name"];
        $subject=DB::table('subject')->distinct()->where([['teacher_name',$teacher_name]])->get(['name']);
        $class=DB::table('subject')->distinct()->where([['teacher_name',$teacher_name]])->get(['class_name']);   
        return view("faculty.addquestions")->with(['subject'=>$subject])->with(['class'=>$class])->with(['chapters'=>$chapters])->with(['type'=>$type])->with(['class_name'=>$class_name])->with(['subject_name'=>$subject_name])->with(['name'=>$teacher_name]);
    }

    public function savequestions(Request $request)
    {
        session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $teacher_name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==1){
                 return redirect()->action('maincontroller@home');
            }
        }
        else{
            return redirect()->action('maincontroller@home');
        }
        //-------------------
        //data fetching
        $type=$request->input('type');
        $class_name=$request->input('class_name');
        $subject_name=$request->input('subject_name');
        $chapter_name=$request->input('chapters');

        $questionn=$request->input('question');
        $questions=explode(PHP_EOL, $questionn);
        $count_existing_questions=0;
        //iterating over questions variable
        foreach ($questions as $key => $question) {
            print($question);
            $already_exist=false;
            print($already_exist);
            if ($type==0) {
                $types='fill_in_the_blanks';
            }elseif ($type==1) {
                $types='mcq';
            }elseif ($type==2) {
                $types='short_questions';
            }elseif ($type==3) {
                $types='long_questions';
            }elseif ($type==4) {
                $types='true/false';
            }
            if ($type==0||$type==2||$type==3||$type==4) {
                $question_check=DB::table($types)->where([['question',$question],['chapter_name',$chapter_name],['subject_name',$subject_name],['class_name',$class_name],['teacher_name',$teacher_name]])->first();
                if (isset($question_check)) {
                             $already_exist=true;
                }
            }elseif ($type==1) {
                $option1=$request->input('option1');
                $option2=$request->input('option2');
                $option3=$request->input('option3');
                $option4=$request->input('option4');
                $question_check=DB::table($types)->where([['chapter_name',$chapter_name],['subject_name',$subject_name],['class_name',$class_name],['teacher_name',$teacher_name],['question',$question],['option1',$option1],['option2',$option2],['option3',$option3],['option4',$option4]])->first();
                if (isset($question_check)) {
                             $already_exist=true;
                }
            }

            //inserting the data into database if not exist
            if ($already_exist==false) {
            if ($type==1){  //multiple choices
                    $option1=$request->input('option1');
                    $option2=$request->input('option2');
                    $option3=$request->input('option3');
                    $option4=$request->input('option4');
                    DB::table('mcq')->insert
                    (
                        [
                        'question'=>$question,
                        'subject_name'=>$subject_name,
                        'class_name'=>$class_name,
                        'chapter_name'=>$chapter_name,
                        'teacher_name'=>$teacher_name,
                        'option1'=>$option1,
                        'option2'=>$option2,
                        'option3'=>$option3,
                        'option4'=>$option4,
                        ]
                    );
            }
            if ($type==0||$type==2||$type==3||$type==4) {
                     DB::table($types)->insert
                    (
                        [
                        'question'=>$question,
                        'subject_name'=>$subject_name,
                        'class_name'=>$class_name,
                        'chapter_name'=>$chapter_name,
                        'teacher_name'=>$teacher_name,
                        ]
                    );
                }
            }else {
                $count_existing_questions=$count_existing_questions+1;
            }
        }
        if ($count_existing_questions>0) {
            return redirect()->action('facultycontroller@questions')->with('message',' '.$count_existing_questions.' already exist')->with(['name'=>$teacher_name]);
        }elseif ($count_existing_questions==0) {
            return redirect()->action('facultycontroller@questions')->with('message','Questions added successfully')->with(['name'=>$teacher_name]);
        }
}

    public function showquestions()
    {
        session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $teacher_name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==1){
                 return redirect()->action('maincontroller@home');
            }
        }
        else{
            return redirect()->action('maincontroller@home');
        }

        //-------------------

        $teacher_name=$_SESSION['teacher_name'];
        $subject=DB::table('subject')->where([['teacher_name',$teacher_name]])->get();
        $class=DB::table('subject')->distinct()->where([['teacher_name',$teacher_name]])->get(['class_name']);   
        return view("faculty.showquestions")->with(['subject'=>$subject])->with(['class'=>$class])->with(['name'=>$teacher_name]);
    }

    public function showquestiondetails(Request $request)
    {
        session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $teacher_name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==1){
                 return redirect()->action('maincontroller@home');
            }
        }
        else{
            return redirect()->action('maincontroller@home');
        }

        //-------------------
        $type=$request->input('type');
        $class_name=$request->input('class');
        $subject_name=$request->input('subject');
        $chapters=DB::table('chapters')->where([['subject_name',$subject_name],['class_name',$class_name]])->get();

        $teacher_name=$_SESSION["teacher_name"];
        $subject=DB::table('subject')->where([['teacher_name',$teacher_name]])->get();
        $class=DB::table('subject')->distinct()->where([['teacher_name',$teacher_name]])->get(['class_name']);  

        return view("faculty.showquestionsdetails")->with(['subject'=>$subject])->with(['class'=>$class])->with(['chapters'=>$chapters])->with(['type'=>$type ])->with(['class_name'=>$class_name])->with(['subject_name'=>$subject_name])->with(['name'=>$teacher_name]);
    }


    public function edit(Request $request)
    {
        session_start();
        if (isset($_SESSION["teacher_name"])) {
            $teacher_name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==1){
                 return redirect()->action('maincontroller@home');
            }
        }
        else{
            return redirect()->action('maincontroller@home');
        }
        $class=$request->input('class');
        $subject=$request->input('subject');
        $chapter=$request->input('chapter_name');
        echo $subject;
    }

    public function allquestions(Request $request)
    {
        session_start();
        //----------------
        if (isset($_SESSION["teacher_name"])) {
            $teacher_name=$_SESSION["teacher_name"];
            $id=$_SESSION["admin_id"];
            $users=DB::table('teacher')->where([['id',$_SESSION['admin_id']]])->first();
            if($users->role==1){
                 return redirect()->action('maincontroller@home');
            }
        }
        else{
            return redirect()->action('maincontroller@home');
        }

        //-------------------
        $teacher_name=$_SESSION["teacher_name"];
        $type=$request->input('type');
        if($type==0)
        {
            $class_name=$request->input('class');
            $subject_name=$request->input('subject');
            // $chapter_name=$request->input('chapters');
            // $questions=DB::table('fill_in_the_blanks')->where([['subject_name',$subject_name],['class_name',$class_name],['chapter_name',$chapter_name],['teacher_name',$teacher_name]])->get();
            $questions=DB::table('fill_in_the_blanks')->where([['subject_name',$subject_name],['class_name',$class_name],['teacher_name',$teacher_name]])->get();
            /*foreach ($questions as $question) {
                echo $question->question;
            }*/
            return view("faculty.allquestions")->with(['subject'=>$subject_name])->with(['class'=>$class_name])->with(['type'=>$type])->with(['questions'=>$questions])->with(['name'=>$teacher_name]);
        }
        elseif($type==1)
        {
            $class_name=$request->input('class_name');
            $subject_name=$request->input('subject_name');
            $chapter_name=$request->input('chapters');
            $questions=DB::table('mcq')->where([['subject_name',$subject_name],['class_name',$class_name],['chapter_name',$chapter_name],['teacher_name',$teacher_name]])->get();
            return view("faculty.allquestions")->with(['subject'=>$subject_name])->with(['class'=>$class_name])->with(['chapter'=>$chapter_name])->with(['type'=>$type])->with(['questions'=>$questions])->with(['name'=>$teacher_name]);
        }
        elseif($type==2)
        {
            $class_name=$request->input('class_name');
            $subject_name=$request->input('subject_name');
            $chapter_name=$request->input('chapters');
            $questions=DB::table('short_questions')->where([['subject_name',$subject_name],['class_name',$class_name],['chapter_name',$chapter_name],['teacher_name',$teacher_name]])->get();
            return view("faculty.allquestions")->with(['subject'=>$subject_name])->with(['class'=>$class_name])->with(['chapter'=>$chapter_name])->with(['type'=>$type])->with(['questions'=>$questions])->with(['name'=>$teacher_name]);
        }
        elseif($type==3)
        {
            $class_name=$request->input('class_name');
            $subject_name=$request->input('subject_name');
            $chapter_name=$request->input('chapters');
            $questions=DB::table('long_questions')->where([['subject_name',$subject_name],['class_name',$class_name],['chapter_name',$chapter_name],['teacher_name',$teacher_name]])->get();
            return view("faculty.allquestions")->with(['subject'=>$subject_name])->with(['class'=>$class_name])->with(['chapter'=>$chapter_name])->with(['type'=>$type])->with(['questions'=>$questions])->with(['name'=>$teacher_name]);
        }
        elseif($type==4)
        {
            $class_name=$request->input('class_name');
            $subject_name=$request->input('subject_name');
            $chapter_name=$request->input('chapters');
            $questions=DB::table('true/false')->where([['subject_name',$subject_name],['class_name',$class_name],['chapter_name',$chapter_name],['teacher_name',$teacher_name]])->get();
            return view("faculty.allquestions")->with(['subject'=>$subject_name])->with(['class'=>$class_name])->with(['chapter'=>$chapter_name])->with(['type'=>$type])->with(['questions'=>$questions])->with(['name'=>$teacher_name]);
        }
    }
}
