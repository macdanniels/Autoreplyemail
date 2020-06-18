<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Controllers\model;
use data;
use Mail;
use Illuminate\Support\MessageBag;



class SendquoteController extends Controller
{
 public function quotemessage(){
 
  return view('Sendquote.quotemessage');

  }

    public function store(Request $request){

      // for checking if code works   
            // dd($request-> all());

     //validating data inputted by users.. 
        $this->validate($request, [

               'fname' => 'required',
               'email' => 'required|email',
               'pno' => 'required|numeric|min:14',
               'message' => 'required',
               'service' => 'required'
             
             ], [], 
         
          [
              'fname' => 'Full Name',
              'email' => 'Last Name',
              'message' => 'Message',
              'service' => 'service',
              'pno' => 'Phone Number'
              ]);

       // accepting data.................
           $fname = $request-> input('fname');
           $email = $request-> input('email');
           $message = $request-> input('message');
           $pno = $request-> input('pno');
           $service = $request-> input('service');

       

          // this line of code should check for duplicates,and return error
            if  ($data = DB::table('sendquotes')->where('pno',$pno)->exists())
              {

                return redirect()->back()->with('flash_error', 'You have Supplied Quote already!'); 
     
           }
          // this line of code should execute if no duplicate value, and store entry. 
          else{ 
            
            DB::table('sendquotes')->insert(
           array('fname'=>$fname,
           'email'=>$email,
           'message'=>$message,
           'pno'=>$pno,
           'service'=>$service));
           
        
                        
           return redirect()->back()->with('flash_message', 'Quote Received'); 
      
               }

               

              }
      
      }

