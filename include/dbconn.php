<?php
class dbcon
{
    var $con;
    var $host;
    var $user;
    var $pass;
    var $dbname;
    
    //Constructor for conncetivity
    function dbcon()
    {
        global $dbserver;
        global $dbuser;
        global $dbpass;
        global $dbname;
        
        $this->host = $dbserver;
        $this->user = $dbuser;
        $this->pass = $dbpass;
        $this->dbname = $dbname;
        
        if($this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname) or die(mysqli_connect_errno( $this->con))) 
        {
            mysqli_select_db( $this->con,$this->dbname) or die(mysqli_connect_errno( $this->con)."in line num. ".__LINE__);
            return $this->con;
        }
        else
        {
            die(mysqli_connect_errno( $this->con));
        }
    }
    
    //To action a query (INSERT, UPDATE, DELETE)
    function action_query($query, $return_insert_id='')
    {
        $result = mysqli_query( $this->con,$query ) or die("Error".  mysqli_error($this->con));
        if($return_insert_id != '')
        {
            return mysqli_insert_id();
        }
    } 
    
    //Constructor for database object.
    function query1($query)
    {
        $result = mysqli_query($this->con,$query);
        if(mysqli_error($this->con))
        {
            return 0;
        }
        else
        {
            return $result;
        }
    }
    
    //Function for query method
    function query($query, $method)
    {
        $arr = array();
        $result = mysqli_query($this->con,$query) or die("Error".  mysqli_error($this->con));
        
        if(!$error = mysqli_errno($this->con))
        {
            if($method == 1)
            {
                return $result;
            }
            else if($method == 2)
            {
                while ($curobj = mysqli_fetch_assoc($result))
                        $resass[] = $curobj;
                return $resass;
                //returns fetch row as an associative array
            }
            else if($method == 3)
            {
                $resultass = mysqli_fetch_assoc($result);
                return $resultass;
                //returns only one single result row
            }
            else if($method == 4)
            {
                while ($farr = mysqli_fetch_array($result))
                        $arr[] = $farr;
                return $arr;
                //returns result row as an associative array, numeric array or both
            }
            else if($method == 5)
            {
                $resnum = mysqli_num_rows($result);
                return $resnum;
                //returns the number of rows
            }
            else if($methos == 6)
            {
                $resobj = mysqli_fetch_object($result);
                        return $resobj;
                        //returns the current row as an object
            }
            else 
            {
                return $error;
            }
        }
    }
   function logout()
   {
	   if(!isset($_SESSION['id']))
	   {
		
		   header('location:login.php');
	   }
   }   
   function cwUpload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = '')
{

    $target_path = $target_folder;
    $thumb_path = $thumb_folder;
    

    $filename_err = explode(".",$_FILES[$field_name]['name']);
    $filename_err_count = count($filename_err);
    $file_ext = $filename_err[$filename_err_count-1];
    if($file_name != ''){
        $fileName = $file_name.'.'.$file_ext;
    }else{
        $fileName = $_FILES[$field_name]['name'];
    }

    $upload_image = $target_path.basename($fileName);

    if(move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_image))
    {
    
        if($thumb == TRUE)
        {
            $thumbnail = $thumb_path.$fileName;
            list($width,$height) = getimagesize($upload_image);
            $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
            switch($file_ext){
                case 'jpg':
                    $source = imagecreatefromjpeg($upload_image);
                    break;
                case 'jpeg':
                    $source = imagecreatefromjpeg($upload_image);
                    break;

                case 'png':
                    $source = imagecreatefrompng($upload_image);
                    break;
                case 'gif':
                    $source = imagecreatefromgif($upload_image);
                    break;
                default:
                    $source = imagecreatefromjpeg($upload_image);
            }

            imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
            switch($file_ext){
                case 'jpg' || 'jpeg':
                    imagejpeg($thumb_create,$thumbnail,100);
                    break;
                case 'png':
                    imagepng($thumb_create,$thumbnail,100);
                    break;

                case 'gif':
                    imagegif($thumb_create,$thumbnail,100);
                    break;
                default:
                    imagejpeg($thumb_create,$thumbnail,100);
            }

        }

        return $thumbnail;
    }
    else
    {
        return false;
    }
} 

 function galleryupload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = '')
{

    $target_path = $target_folder;
    $thumb_path = $thumb_folder;
    

    $filename_err = explode(".",$_FILES[$field_name]['name']);
    $filename_err_count = count($filename_err);
    $file_ext = $filename_err[$filename_err_count-1];
    if($file_name != '')
	{
		
        $fileName = $file_name.'.'.$file_ext;
    }else{
        $fileName = $_FILES[$field_name]['name'];
    }
  $tmp_name=date('Y-m-d-H-i-s') . '_'.uniqid().'.'.$file_ext;

    $upload_image = $target_path.basename($tmp_name);

    if(move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_image))
    {
    
        if($thumb == TRUE)
        {
            $thumbnail = $thumb_path.$tmp_name;
            list($width,$height) = getimagesize($upload_image);
            $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
            switch($file_ext){
                case 'jpg':
                    $source = imagecreatefromjpeg($upload_image);
                    break;
                case 'jpeg':
                    $source = imagecreatefromjpeg($upload_image);
                    break;

                case 'png':
                    $source = imagecreatefrompng($upload_image);
                    break;
                case 'gif':
                    $source = imagecreatefromgif($upload_image);
                    break;
                default:
                    $source = imagecreatefromjpeg($upload_image);
            }

            imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
            switch($file_ext){
                case 'jpg' || 'jpeg':
                    imagejpeg($thumb_create,$thumbnail,100);
                    break;
                case 'png':
                    imagepng($thumb_create,$thumbnail,100);
                    break;

                case 'gif':
                    imagegif($thumb_create,$thumbnail,100);
                    break;
                default:
                    imagejpeg($thumb_create,$thumbnail,100);
            }

        }

        return $thumbnail;
    }
    else
    {
        return false;
    }
} 

function sending_mail($from_email,$to,$subject,$message)
{ 
    
$message=   
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From:'.$from_email. "\r\n";
mail($to,$subject,$message,$headers);
    
}


}
?>
