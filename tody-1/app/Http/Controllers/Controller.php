<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


// use App\app_user;
use App\model_task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function signup_user_fun(Request $req)
    { 
        $users_data = DB::select('select * from tbl_person');


        foreach ($users_data as $us) {
           
            if($us->person_username ==  $req->get('username') ){
                return back()->with('username_use','');
            }
        }


        if($req->get('confirmpass') != $req->get('password')){
            return back()->with('password','');
        }



 
        $data = array(
            "person_username"=>$req->input('username'),
            "person_password"=>$req->input('password'),
            "person_gender"=> $req->input('gender'),
            "person_email"=>$req->input('email'),
            "person_number"=>$req->input('number')
        );
        DB::table('tbl_person')->insert($data);
        return  redirect('/')->with('signup','');
    }


    public function login_user_fun(Request $req)
    {
        $person = DB::select('select * from tbl_person');
        $bool = false;

        foreach ($person as $s) {
       
            if($s->person_username == $req->input('username') &&  $s->person_password == $req->input('password') ){
                $bool = true;
                session()->put('person_id_sessions',$s->person_id);
                session()->put('person_username_sessions',$s->person_username);
            }
        }   

        if($bool){
       
            return redirect('/open_home')->with('login','');
            
        }
        else{
            return back()->with('login_not','');
        }
    }


    public function add_task_fun(Request $request)
    {


        if(session()->get('person_id_sessions') == ""){
            return redirect('/')->with('exp','');
        }


        $task = new model_task(); 
        $task->task_name = $request->input('task_name');
        $task->task_status ="ongoing";
        $task->task_category = $request->input('task_category');
        $task->task_owner = session()->get('person_id_sessions');

        $task->save();
        return redirect('/open_home')->with('','');
    }


    public function open_home_fun(Request $req)
    {

        if(session()->get('person_id_sessions') == ""){
            return redirect('/')->with('exp','');
        }

        $tasks = DB::select('select * from tbl_task  where task_owner = ? AND task_status = ? ORDER BY task_id DESC',[session()->get('person_id_sessions'), "ongoing"]);

        $tasks_done = DB::select('select * from tbl_task where task_owner = ? AND task_status = ?',[session()->get('person_id_sessions'), "done"]);
        
        return view('home',compact('tasks','tasks_done'));
    }

    public function task_done_fun(Request $req)
    {

        if(session()->get('person_id_sessions') == ""){
            return redirect('/')->with('exp','');
        }
        DB::update('update tbl_task set task_status =? where task_id = ?',["done",$req->get('id')]);
        return redirect('/open_home')->with('','');

    }
    public function task_undone_fun(Request $req)
    {
        if(session()->get('person_id_sessions') == ""){
            return redirect('/')->with('exp','');
        }
        DB::update('update tbl_task set task_status =? where task_id = ?',["ongoing",$req->get('id')]);
        return redirect('/open_home')->with('','');

    }
    public function task_remove_fun(Request $req)
    {
        if(session()->get('person_id_sessions') == ""){
            return redirect('/')->with('exp','');
        }
        DB::update('update tbl_task set task_status =? where task_id = ?',["remove",$req->get('id')]);
        return redirect('/open_home')->with('','');
    }
    public function hide_fun(Request $req)
    {
        if(session()->get('person_id_sessions') == ""){
            return redirect('/')->with('exp','');
        }
        DB::update('update tbl_task set task_status =? where task_status = ?',["hidden","done"]);
        return redirect('/open_home')->with('','');
    }
    public function save_profile_update_fun(Request $req)
    {
        if(session()->get('person_id_sessions') == ""){
            return redirect('/')->with('exp','');
        }
        DB::update('update tbl_person set 
            person_username =?,
            person_password =?, 
            person_gender =?, 
            person_email =?, 
            person_number =?
            where person_id = ?',[
                $req->get('person_username'),
                $req->get('person_password'),
                $req->get('person_gender'),
                $req->get('person_email'),
                $req->get('person_number'),
                session()->get('person_id_sessions')
            ]);

        return redirect('/open_profile')->with('updated','');
    }


    public function open_profile_fun(Request $req)
    {
        if(session()->get('person_id_sessions') == ""){
            return redirect('/')->with('exp','');
        }
        $profile = DB::select('select * from tbl_person where person_id = ? ',[session()->get('person_id_sessions')]);
        $tasks = DB::select('select * from tbl_task where task_owner = ? AND task_status = ?',[session()->get('person_id_sessions'), "hidden"]);
        $tasks_cat = DB::select('select distinct task_category from tbl_task where task_owner = ? AND task_status = ?',[session()->get('person_id_sessions'),"hidden"]);
        return view('profile',compact('profile','tasks','tasks_cat'));
    }



}
