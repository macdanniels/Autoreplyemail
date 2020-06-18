
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
  </head>
  <body>

  <h1>Hi, {{$fname}}!</h1>
 
    <p> Thank you for sending your Quoute!</p>
    <p> below are your submission</p>
  
  <div>E-mail: {{$email}} </div>
  <div>mobile Number: {{$pno}}</div>
  <div>Service: {{$service}}</div>
    
</body>
</html>


<!-- Mail::send('emails.autoreply' , $emailData, function($message) use ($email)
{
 $message-> to ($email, 'fname')->service('service');

});