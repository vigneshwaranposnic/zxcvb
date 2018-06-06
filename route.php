<?php 

//if($_SESSION['email_user']!="")
//{
include('header.php');

if($_REQUEST['page']=="main")
{
include('main.php');
}

if($_REQUEST['page']=="sendmail")
{
    include('sendmail.php');
    
    
}
if($_REQUEST['page']=="job_list")
{
    include('job_list.php');
    
    
}
if($_REQUEST['page']=="new_ads")
{
    include('new_ads.php');
    
    
}
if($_REQUEST['page']=="update_ads")
{
    include('update_ads.php');
    
    
}
if($_REQUEST['page']=="track_id")
{
    include('track_id.php');
    
    
}
if($_REQUEST['page']=="add_ip")
{
    include('add_ip.php');
    
    
}
if($_REQUEST['page']=="email_report")
{
    include('email_report.php');
    
    
}
if($_REQUEST['page']=="email_unsubscription")
{
    include('email_unsubscription.php');
    
    
}
if($_REQUEST['page']=="ads_unsubscription")
{
    include('ads_unsubscription.php');
    
    
}
if($_REQUEST['page']=="user_profile")
{
    include('user_profile.php');
    
    
}

//}
//else
//{
    //header('location:login.php');
//}


?>