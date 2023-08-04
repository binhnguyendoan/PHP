<?php   
       $userhost = "localhost:4306";
       $username = "root";
       $password = "";
       $userdb = "quanlysanphamdientu";
   
       $conn = mysqli_connect($userhost,$username,$password,$userdb);
      
       if($conn){
           mysqli_query($conn,"SET NAMES 'UTF8'");
          
           
       }else{
            echo "kết nối thất bại";
       }