
<link rel="stylesheet" href="doctor.css">
<style>
    h1{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        color:red;
        text-align: center;
    }
</style>
<?php   
    
    session_start();
    if(isset($_SESSION['id'])){
        header("location:index.php");
        exit;
    }
     $host = "localhost";  
     $user = "root";  
     $password = '';  
     $db_name = "pk";  
       
    $conn = mysqli_connect($host, $user, $password, $db_name);    

    $username = $_POST['id'];  //username should be post id
    $password = $_POST['pass']; //password passing through the system
    $password=base64_encode($password);//make the password encrypted
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select *from doctorlogin where id= '$username' and pass = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        $sql_e = "SELECT id FROM `doctorlogin` WHERE id='$username'";
        $res_e = mysqli_query($conn, $sql_e);
          
        if($count == 1){  
            //echo "<h1> Login successful </h1>"; 
            session_start();
            $_SESSION["id"]=$username;
            $_SESSION["pass"]=$password;
            //$count=true;
            $_SESSION["loggedin"]=true;
            header("location:inner-page.php"); 
        } 
        
        else{
            if(mysqli_num_rows($res_e) == 0){
                header("location:acountcreate.php"); 	
                  } 
            else{  
               
                header("location:accountnot.php");
                   
            
            }   
        }    

  
?>  

