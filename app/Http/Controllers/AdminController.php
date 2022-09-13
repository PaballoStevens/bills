<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\User;

use App\Models\Records;

use App\Models\Event;

use App\Models\Group;

use App\Models\Progress;

use Carbon\Carbon;

use DB;

class AdminController extends Controller
{
    public function index() {
           
      $months = ['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep'];
       $test = Records::count();
      $Records = [$test];
      foreach ($months as $key => $value) {
          $Records[] = Records::where(\DB::raw("DATE_FORMAT(created_at, '%M')"),$value)->count();
      }
      $Progress = DB::table('Users')
      ->join('progress', 'Users.id' , '=' ,'progress.user_id')
      ->paginate(5);

     
   return view('admin.home', compact('Progress'))->with('months',json_encode($months,JSON_NUMERIC_CHECK))->with('Records',json_encode($Records,JSON_NUMERIC_CHECK));
     
    }

    public function profile(){

      return view('account/profile', array('user' => Auth::user()) );
    
    }

    public function users(){
      
      $users = User::paginate(10);

      return view('admin/users/user-management-list', compact('users'));
    
    }

    public function adduser(){
      $group = Group::all();
      $user_type = User::all('user_type');
      return view('admin/users/user-management-add-user' , compact('group', 'user_type'));
    
    }

    public function storeuser(Request $request){
      User::create($request->except('_token'));

      return redirect()->back()->with('status','User was successfully added');
    
    }

    public function edituser($id) {
       $update = User::find($id);
       return view('admin/users/user-management-edit-user', compact('update'));
    }

    public function deleteuser($id){
      $user = User::find($id);
      $user_id = $user->id;
      DB::table('users')->where('id', '=', $user->id)->delete();
      DB::table('records')->where('Account', '=', $user->id)->delete();
      DB::table('add_cards')->where('Account', '=', $user->id)->delete();
      DB::table('payment')->where('Account', '=', $user->id)->delete();
      return redirect()->back()->with('status','Record was successfully added');
   }

    public function groups(){
       $grouplist = Group::paginate(5);
      return view('admin/groups/user-management-groups-list',compact('grouplist'));
    
    }

    public function storegroups(Request $request){
      Group::create($request->except('_token'));

      return redirect()->back()->with('status','Record was successfully added');
    }

    public function delete($id){
      $user = Group::find($id);
      $user_id = $user->id;
      DB::table('groups')->where('id', '=', $user->id)->delete();
      return redirect()->back()->with('status','Record was successfully added');
   }

    public function security(){

    
        return view('account/security', array('user' => Auth::user()) );
      
      }

      public function notifications(){

    
        return view('account/notifications', array('user' => Auth::user()) );
      
      }

      public function billlist() {
          $view = Records::all();
        return view('admin/records/management-bills-list' , compact('view'));
      }

      public function createview() {

        $record = DB::table('users')
      ->join('profiles', 'users.id', '=', 'profiles.id')
      ->get();
        return view('admin/records/create' , compact('record'));
      }
      

      public function create(Request $request) {

        Records::create($request->except('_token'));

        return redirect()->back()->with('status','Record was successfully added');
      }

      public function alertlist(){
           $alertlist = Event::paginate(10);
        return view('/admin/alerts/management-alerts-list', compact('alertlist'));
      }

      public function alert(){

        return view('/admin/alerts/create');

      }

      public function alertcreate(Request $request) {

        Event::create($request->except('_token'));

        return redirect()->back()->with('status','Event was successfully added');
      }

      public function deletealert($id){
        $user = Event::find($id);
        $user_id = $user->id;
       DB::table('events')->where('id', '=', $user->id)->delete();
       return redirect()->back()->with('status','Event was successfully added');

   }

   public function progress(){

    return view('admin/ProgressTracker/create');
   }

   public function taskcenter(){
    $task = DB::table('users')
    ->join('progress', 'users.id', '=', 'progress.user_id')
    ->get();
    return view('admin/ProgressTracker/taskcenter' , compact('task'));
   }

   public function progresscreate(Request $request ){
  
    Progress::create($request->except('_token'));

    return redirect()->back()->with('status','Process Task was successfully added');
   }

   public function deleteprogress($id){
    $user = Progress::findOrFail($id);
    $user_id = $user->id;
   DB::table('progress')->where('id', '=', $user->id)->delete();
   return redirect()->back()->with('status','Event was successfully added');
   }
     
}
