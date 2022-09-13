<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use \App\Models\Profile;

use App\Models\User;

use App\Models\Payment;

use App\Models\Records;

use App\Models\Event;

use App\Models\AddCard;

use DB;

use Stripe;

use Session;


class CustomerController extends Controller
{

  /**
     * Write code on Method
     *
     * @return response()
     */

    public function index() {
      $user = Auth::user();
      $user_id = $user->id;
      $inv = DB::table('users')
      ->join('records', 'users.id', '=', 'records.Account')
      ->where('records.Account' , '=', $user->id)
      ->get();
      $alert = Event::all();
      $alerts = Event::all('status');
     return view('customer.home', compact('inv', 'alert', 'alerts'));
        
    }

    public function profileid($id){
     
      $info =  Profile::find($id);
      
     return view('account/profile', compact('info'));
    
    }

    public function profileupdate(Request $request ){

        profile::create($request->except('_token'));

        return view('account/profile');
    }

    public function billing($id){
      $stripe = new \Stripe\StripeClient(
        'sk_test_51JBRfTDEECnDvGw4Pu0devKmZzqSTi9FTBkf9oTW7dZh25sf3yD3rsxnQ8yfhi8xBZriP1LRe9HwxEbXw9161u8s00oRul8s9O'
      );
      $user = Auth::user();
      $user_id = $user->id;
      $inv = DB::table('users')
      ->join('records', 'users.id', '=', 'records.Account')
      ->join('payments', 'users.id', '=', 'payments.Account')
      ->where('records.Account' , '=', $user->id)
      ->where('payments.Account' , '=', $user->id)
      ->get();
      $addcard = DB::table('users')
      ->join('add_cards', 'users.id', '=', 'add_cards.Account')
      ->where('add_cards.Account' , '=', $user->id)
      ->get();
      $record = Records::find($id);
      return view('account/billing',compact('inv', 'addcard' ,'record'));
      
     
    }

    public function security(){

    
        return view('account/security', array('user' => Auth::user()) );
      
      }

      public function notifications(){

    
        return view('account/notifications', array('user' => Auth::user()) );
      
      }  

      public function invoice($id)
    {
       $user = Auth::user();
       $user_id = $user->id;
       $record = Records::find($id);
       $profile = profile::find($user->id);
       
      return view('customer/invoice', compact('record','profile'));
    }

    public function stripe($id){
      
       $user = Auth::user();
       $user_id = $user->id;
       $addcard = DB::table('users')
      ->join('add_cards', 'users.id', '=', 'add_cards.Account')
      ->where('add_cards.Account' , '=', $user->id)
      ->get();
      $stripe = new \Stripe\StripeClient(
        'sk_test_51JBRfTDEECnDvGw4Pu0devKmZzqSTi9FTBkf9oTW7dZh25sf3yD3rsxnQ8yfhi8xBZriP1LRe9HwxEbXw9161u8s00oRul8s9O'
      );
      
      
      $customer = $stripe->customers->create([
        'name' => Auth::user()->name,
        "email" =>  Auth::user()->email,
        'payment_method' => "pm_card_visa_debit",
      ]); 
      $customer->getLastResponse()->headers["Request-Id"];
      $addcard = Addcard::find($id);
      return view('account/stripe', compact('addcard'));
    
    } 

    public function handlePost(Request $request)
    {
      
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => Records::sum('MiscellaneousCharges')*100,
                "currency" => "ZAR",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);
        Session::flash('success', 'Payment has been successfully processed.');
          
        return back();
    }

    public function addcard(){

      return view('account/add_cards');
    }

    public function createcard(Request $request){
      Addcard::create($request->except('_token'));
      Session::flash('success', 'Card has been added successfully .');
          
        return back();
    }
     
}
