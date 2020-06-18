<?php

namespace App\Http\Controllers;
 use Mail;
use Illuminate\Http\Request;

use App\post;

class FrontEndController extends Controller
{
    
        public function index(){
         
            return view('FrontEnd.index');
    
        }
        
        public function about(){
         
            return view('FrontEnd.about');
    
        }

     public function project(){
            return view('FrontEnd.project');
    
        }
        // public function contact(){
           // return view('FrontEnd.contact');
    
        //     }
        public function blog(){
            
            return view('FrontEnd.blog');
    
           }
        public function services(){
            
            return view('FrontEnd.services');
    
           }

        //Single post (post_single)

        public function blog_single(){
     
            return view('FrontEnd.blog_single');
            
               }
        public function posts(){

        return view('FrontEnd.post');
        
                   }
        public function post_single(){

            return view('FrontEnd.post_single');
            
            }

         //creating create email message

        public function create(){
     
        return view('FrontEnd.contact');
        
           }
          

        public function store(Request $request){
         // for checking if code works   dd($request-> all()); 
            // return view('FrontEnd.contact');
            $this-> validate($request,  [

                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required'

            ]);
            
            Mail::send('emails.contact-message' ,[
                   'msg'=> $request->message ],
                   function ($mail) use ($request){
                        $mail-> from($request->email, $request->name);

                        $mail-> to ('info@danweb.com.ng')-> subject('Message from Website Contact Form');
                   });
                   
      //   Mail::send('emails.autoreply', [
        //    'msg'=> $request->message ],
          //  function ($mail) use ($request){
            //     $mail-> from($request->email, $request->name)->to('$email', '$lname')->subject('$subject');
                          // }); 

                   return redirect()->back()->with('flash_message', 'Thank you for your message'); 

          

        
            }
}
