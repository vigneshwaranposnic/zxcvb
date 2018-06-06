<?php 
require_once("include/config.php");



/***User Login ***/
if($_REQUEST['action']=="logon")
{
 $email=trim($_REQUEST['email']);
 $password=base64_encode(trim($_REQUEST['password']));
 $login=$dbobj->query("SELECT * FROM User_login WHERE user_email='$email' AND user_password='$password' AND user_status=1 AND admin_status=1 ",4);
if(count($login)>0)
{
    $_SESSION['user_id']=$login[0]['user_id'];
    $_SESSION['user_name']=$login[0]['user_name'];
    $_SESSION['user_role']=login[0]['user_role'];
    
    header('loaction:route.php?page=main');
    
}
else 
{
    echo "Please Check Username and Password";
    
}
    
}
/***User Registration ***/
if($_REQUEST['action']=="register")
{
$name=trim($_REQUEST['name']);
$email=trim($_REQUEST['email']);
$password=base64_encode(trim($_REQUEST['password']));
$already_exists=$dbobj->query("SELECT * FROM User_login WHERE user_email='$email'",4);
if(count($already_exists)>0)
{
echo "Account Already Exist";
}
else
{
    $result=$dbobj->action_query("INSERT INTO User_login (user_name,user_email,user_password,user_status,admin_status,user_role)VALUES('$name','$email','$password',0,0,0)");	

    if($result!='0')
    {
      echo "User Registration Successful. You have been successfully registered.<a href='index.php'>Click</a>Continue below to proceed to login";
      
     $email_arry=array();
     $email_arry[1]=$email;
     $email_arry[1]="ananth2310@gmail.com";
     $i=1;
     
     foreach($email_arry as $sendmail)
     {
         if($i=='1')
         {
           $message="";  
         }
       else
         {
           $message="";   
         }  
       
      $from_email="";
      $subject="";
      $to_mail=$sendmail;
      $dbobj->sending_mail($from_email,$to_mail,$subject,$message);
      $i++;
    }
    }
    else 
   { 
     echo "user registration failed"; 
    }
}   
}
/***User Activation ****/
if($_REQUEST['action']=="user_activation")
{
 $uesr_id= base64_decode(($_REQUEST['key']));
 
 $dbobj->action_query("Update User_login set user_status='1' WHERE user_id='$uesr_id'");	
       
}
/***Admin Activation ***/
if($_REQUEST['action']=="admin_activation")
{
 $uesr_id= base64_decode(($_REQUEST['key']));
 
 $dbobj->action_query("Update User_login set admin_status='1' WHERE user_id='$uesr_id'");	
       
}


/****Forget password ***/
if($_REQUEST['action']=="forget_password")
{
$email=trim($_REQUEST['email']);
$forget_password=$dbobj->query("SELECT * FROM User_login WHERE user_email='$email'",4);
if(count($already_exists)>0)
{  
$from_email="";
$to_email=$forget_password[0]['user_email'];
$subject="";
$message="";
$dbobj->sending_mail($from_email,$to_mail,$subject,$message);
}
else 
{
  echo "Email Not exists!";   
}

}

?>