<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',"maincontroller@home");

Route::get('home',"maincontroller@home")->name('home');

Route::get('about',"maincontroller@aboutus")->name('about');

Route::get('contact',"maincontroller@contact")->name('contact');

Route::get('login',"maincontroller@login")->name('login');

Route::get('register',"maincontroller@register")->name('register');

Route::post('loginuser',"maincontroller@loginuser")->name('loginuser');

Route::post('registeruser',"maincontroller@registeruser")->name('registeruser');

Route::post('saveclass',"admincontroller@saveclass")->name('saveclass');

Route::get('class',"admincontroller@classs")->name('adminhome');

Route::get('subject',"admincontroller@subject")->name('subject');

Route::get('teacher',"admincontroller@teacher")->name('teacher');

Route::post('saveteacher',"admincontroller@saveteacher")->name('saveteacher');

Route::post('savesubject',"admincontroller@savesubject")->name('savesubject');

Route::get('logout',"admincontroller@logout")->name('logout');

Route::get('facultyhome',"facultycontroller@faculty")->name('facultyhome');

Route::get('fhome',"facultycontroller@fhome")->name('fhome');

Route::get('chapters',"facultycontroller@chapters")->name('chapters');

Route::post('savechapters',"facultycontroller@savechapters")->name('savechapters');

Route::get('questions',"facultycontroller@questions")->name('questions');

Route::post('addquestions',"facultycontroller@addquestions")->name('addquestions');

Route::post('savequestions',"facultycontroller@savequestions")->name('savequestions');

Route::get('showquestions',"facultycontroller@showquestions")->name('showquestions');

Route::post('showquestiondetails',"facultycontroller@showquestiondetails")->name('showquestiondetails');

Route::post('allquestions',"facultycontroller@allquestions")->name('allquestions');

Route::get('generate_paper',"admincontroller@generate")->name('generate');

Route::post('generate_paper1',"admincontroller@generate1")->name('generate_paper1');

Route::post('generate_paper2',"admincontroller@generate2")->name('generate_paper2');

Route::get('findsubject',"admincontroller@findsubject");


Route::get('calquestions',"admincontroller@calquestions");

Route::get('findchapters',"admincontroller@findchapters");

Route::get('findquestions',"admincontroller@findquestions");

Route::get('adminhome',"admincontroller@ahome")->name('ahome');
//Route::post('generate_paper2',"admincontroller@generate2")->name('generate_paper2');

//Route::get('showclass',"admincontroller@showclass");

//Route::get('editsubject/{id}', [
//'uses'=>'facultycontroller@editsubject',
//'as'=>'editsubject']);

// Route::get('deletesubject/{id}', [
// 'uses'=>'facultycontroller@editsubject',
// 'as'=>'editsubject']);


Route::post('editchapter',"admincontroller@edit")->name('editchapters');



Route::get('editsubject/{id}','admincontroller@editsubject')->name('editsubject');
Route::post('updatesubject','admincontroller@updatesubject')->name('updatesubject');
Route::get('deletesubject/{id}','admincontroller@deletesubject')->name('deletesubject');

Route::get('editclass/{id}','admincontroller@editclass')->name('editclass');
Route::post('updateclass','admincontroller@updateclass')->name('updateclass');
Route::get('deleteclass/{id}','admincontroller@deleteclass')->name('deleteclass');

Route::get('editteacher/{id}','admincontroller@editteacher')->name('editteacher');
Route::post('updateteacher','admincontroller@updateteacher')->name('updateteacher');
Route::get('deleteteacher/{id}','admincontroller@deleteteacher')->name('deleteteacher');



Route::get('romoveadmin','admincontroller@remove')->name('remove');