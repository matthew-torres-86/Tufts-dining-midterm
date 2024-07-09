<?php
        session_start();


        $utln = $_POST["UTLN"];
		$pass = $_POST["pw"];

         
        $server = "sql208.epizy.com";
        $userid = "epiz_30185190";
        $pw = "gZ70WRnjiyTkc";
        $db = "epiz_30185190_tuftsusers";
        $conn = new mysqli($server, $userid, $pw);
  
        if($conn->connect_error){
	        die("Connection failed:". $conn->connect_error);
         }
  
         $conn->select_db($db);
        
        $sql = "SELECT UTLN, password, fname, swipes FROM `users` WHERE UTLN = '$utln' AND password = MD5('$pass')";
        // $sql = "SELECT UTLN, password, fname FROM `users`";
        $result = $conn->query($sql);
        
        $fname = "";
        $uservalid = false;
        if($result->num_rows > 0){
            $uservalid = true;
            while($row = $result->fetch_array()){
                $fname = $row[2];
                $swipes = $row[3];
                break;
            }
            }
            echo $fname;
            $_SESSION["fname"]=$fname;
            $_SESSION["utln"]=$utln;
            $_SESSION["pw"]=$pass;
            $_SESSION["swipes"]=$swipes;
        if($uservalid)
        {
            $_SESSION["loggedin"]="true";
            header("Location: http://tuftsdining.infinityfreeapp.com/".$_SESSION['destination']);
        }
        else{

            $_SESSION["loggedin"]="false";
            header("Location: http://tuftsdining.infinityfreeapp.com/login.php");
        }

        ?>