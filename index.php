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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

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
                    <a href="index.php">
                       
                    </a>
                </div>
                
                <div class="login-form">
                     <div id="errormsg" style="color:red;"></div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" id="useremail" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" onclick="return userLogin();" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                      
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="uesr_register.php"> Sign Up Here</a></p>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
<script>
function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}
    function userLogin()
    {
        var useremail=$("#useremail").val();
        var userpassword=$("#password").val();
       if(useremail=="")
       {
        $("#useremail").focus();
        $("#useremail").css("background-color", "yellow");
         return false();
       }   
       if( !validateEmail(useremail))
       {
        $("#useremail").focus();
        $("#useremail").css("background-color", "yellow");
         return false();
       }

       if(userpassword=="")
       {
        $("#password").focus();
         return false();
       }

       if(useremail!="" && userpassword!="" )

       {
        $.ajax({
       type: "POST",
       url: "ajax.php",
       data:"action=login&email="+useremail+"&password="+userpassword,
        beforeSend: loadStart,
       complete: loadStop, 
       success: function(resultData){
        $('#errormsg').html(resultData);
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
