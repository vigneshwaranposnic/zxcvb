<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adssendy</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">
    <div id="loading" class="none"  style="position: fixed;top: 10%;left: 40%;padding: 5px;z-index: 1002; display:none;">
  <img src="./images/loadimage.gif" border="0" style="width: 200px;height: 200px;" />
 </div>

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                 <div id="displaymsg" style="color:#008000;" ></div>
                </div>
                <div class="login-form">
                  
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password">
                        </div>
                       <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" id="confirm_password" onkeyup="return password(this.value);" class="form-control" placeholder="Password">
                        </div>
                       
                       
                        <button type="submit" onclick="return userRegistration()" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                      
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="index.php"> Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
   
function password(confirm_password)
{
  var password=$("#password").val();
  if(confirm_password!=password)
  {
 
          $('#confirm_password').css("background-color", "#FF0000");
           return false();  
  }
  else
  {
     $('#confirm_password').css("background-color", "#90EE90");   
  }
}

function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
  }
      function userRegistration()
      {
          var name=$("#name").val();
          var useremail=$("#email").val();
          var userpassword=$("#password").val();
           var confirm_password=$("#confirm_password").val();
   
          if(name=="")
         {
          $("#name").focus();
          $("#name").css("background-color", "yellow");
           return false();
         }

         if(useremail=="")
         {
          $("#email").focus();
          $("#email").css("background-color", "yellow");
           return false();
         }   
         if( !validateEmail(useremail))
         {
          $("#email").focus();
          $("#email").css("background-color", "yellow");
           return false();
         }
  
         if(userpassword=="")
         {
          $("#password").focus();
           return false();
         }
           if(confirm_password=="")
         {
          $("#confirm_password").focus();
           return false();
         }
         if(confirm_password!=userpassword)
         {
          $("#confirm_password").focus();
          $("#confirm_password").val("");
           $('#confirm_password').css("background-color", "yellow");
           return false();
         }
  
         if(useremail!="" && userpassword!="" )
  
         {
          $.ajax({
         type: "POST",
         url: "ajax.php",
         data:"action=register&name="+name+"&email="+useremail+"&password="+userpassword,
         beforeSend: loadStart,
         complete: loadStop,   
         success: function(resultData)
         {
             $("#displaymsg").html(resultData);  
             $("email").val('');
             $("Password").val('');
             $("name").val('');
         }
  
         });
            
      }
      }
      
      
       function loadStart()
       {
         $('#loading').show();
       }
      function loadStop() 
      {
   $('#loading').hide();
       }
    </script>
</body>
</html>
