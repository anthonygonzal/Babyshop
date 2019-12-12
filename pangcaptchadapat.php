<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<div class="g-recaptcha" data-sitekey="6Ldv2bcUAAAAAFeYuQAQWH7I_BVv2_2_fedg2Fpp"></div>



<html>  
    <head>  
        <title>How to Implement Google reCaptcha in PHP Form</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    </head>  
    <body>  
        <div class="container" style="width: 600px">
   <br />
   
   <h3 align="center">How to Implement Google reCaptcha in PHP Form</a></h3><br />
   <br />
   <div class="panel panel-default">
      <div class="panel-heading">Register Form</div>
    <div class="panel-body">
     
     <form metod="post" id="captcha_form">
      <div class="form-group">
       <div class="row">
        <div class="col-md-6">
         <label>First Name <span class="text-danger">*</span></label>
         <input type="text" name="first_name" id="first_name" class="form-control" />
         <span id="first_name_error" class="text-danger"></span>
        </div>
        <div class="col-md-6">
         <label>Last Name <span class="text-danger">*</span></label>
         <input type="text" name="last_name" id="last_name" class="form-control" />
         <span id="last_name_error" class="text-danger"></span>
        </div>
       </div>
      </div>
      <div class="form-group">
       <label>Email Address <span class="text-danger">*</span></label>
       <input type="text" name="email" id="email" class="form-control" />
       <span id="email_error" class="text-danger"></span>
      </div>
      <div class="form-group">
       <label>Password <span class="text-danger">*</span></label>
       <input type="password" name="password" id="password" class="form-control" />
       <span id="password_error" class="text-danger"></span>
      </div>
      <div class="form-group">
       <div class="g-recaptcha" data-sitekey="6Ldv2bcUAAAAAFeYuQAQWH7I_BVv2_2_vvmn2Fpp"></div>
       <span id="captcha_error" class="text-danger"></span>
      </div>
      <div class="form-group">
       <input type="submit" name="register" id="register" class="btn btn-info" value="Register" />
      </div>
     </form>
     
    </div>
   </div>
  </div>
    </body>  
</html>

<script>
$(document).ready(function(){

 $('#captcha_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"process_data.php",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function()
   {
    $('#register').attr('disabled','disabled');
   },
   success:function(data)
   {
    $('#register').attr('disabled', false);
    if(data.success)
    {
     $('#captcha_form')[0].reset();
     $('#first_name_error').text('');
     $('#last_name_error').text('');
     $('#email_error').text('');
     $('#password_error').text('');
     $('#captcha_error').text('');
     grecaptcha.reset();
     alert('Form Successfully validated');
    }
    else
    {
     $('#first_name_error').text(data.first_name_error);
     $('#last_name_error').text(data.last_name_error);
     $('#email_error').text(data.email_error);
     $('#password_error').text(data.password_error);
     $('#captcha_error').text(data.captcha_error);
    }
   }
  })
 });

});
</script>


Validate User Response at Server side

After this we need to validate user response at server side, for this we have to process_data.php file, in which recaptcha response data will be received using Ajax. When user submit form, then reCAPTCHA widget response has been received at process_data.php using Ajax. Here we need to verify response by following php script.


if(empty($_POST['g-recaptcha-response']))
 {
  $captcha_error = 'Captcha is required';
 }
 else
 {
  $secret_key = '6Ldv2bcUAAAAAFXUKdLW_qljFd9FpxNguf06DHhp';

  $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);

  $response_data = json_decode($response);

  if(!$response_data->success)
  {
   $captcha_error = 'Captcha verification failed';
  }
 }




<?php

//process_data.php

if(isset($_POST["first_name"]))
{
 $first_name = '';
 $last_name = '';
 $email = '';
 $password = '';

 $first_name_error = '';
 $last_name_error = '';
 $email_error = '';
 $password_error = '';
 $captcha_error = '';

 if(empty($_POST["first_name"]))
 {
  $first_name_error = 'First name is required';
 }
 else
 {
  $first_name = $_POST["first_name"];
 }

 if(empty($_POST["last_name"]))
 {
  $last_name_error = 'Last name is required';
 }
 else
 {
  $last_name = $_POST["last_name"];
 }
 if(empty($_POST["email"]))
 {
  $email_error = 'Email is required';
 }
 else
 {
  if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
  {
   $email_error = 'Invalid Email';
  }
  else
  {
   $email = $_POST["email"];
  }
 }

 if(empty($_POST["password"]))
 {
  $password_error = 'Password is required';
 }
 else
 {
  $password = $_POST["password"];
 }

 if(empty($_POST['g-recaptcha-response']))
 {
  $captcha_error = 'Captcha is required';
 }
 else
 {
  $secret_key = '6Ldv2bcUAAAAAFXUKdLW_qljFd9FpxNguf06DHhp';

  $response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);

  $response_data = json_decode($response);

  if(!$response_data->success)
  {
   $captcha_error = 'Captcha verification failed';
  }
 }

 if($first_name_error == '' && $last_name_error == '' && $email_error == '' && $password_error == '' && $captcha_error == '')
 {
  $data = array(
   'success'  => true
  );
 }
 else
 {
  $data = array(
   'first_name_error' => $first_name_error,
   'last_name_error' => $last_name_error,
   'email_error'  => $email_error,
   'password_error' => $password_error,
   'captcha_error'  => $captcha_error
  );
 }

 echo json_encode($data);
}

?>
