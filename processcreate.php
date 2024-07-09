<?php

        session_start();

        $utln = $_POST["UTLN"];
		$pass = $_POST["pw"];
        $firstn = $_POST["fname"];
        $lastn = $_POST["lname"];
        $email = $_POST["email"];

        $server = "sql208.epizy.com";
        $userid = "epiz_30185190";
        $pw = "gZ70WRnjiyTkc";
        $db = "epiz_30185190_tuftsusers";
        $conn = new mysqli($server, $userid, $pw);
    
        if($conn->connect_error){
	        die("Connection failed:". $conn->connect_error);
         }
  
         $conn->select_db($db);
         

        //ensure not inserting a duplicate utln
        $sql = "SELECT UTLN FROM `users` WHERE UTLN = '$utln'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION["loggedin"]="duplicateutln";
            header("Location: http://tuftsdining.infinityfreeapp.com/login.php");
            die();
        }
    


         $sql = "INSERT INTO `users` (`UTLN`, `fname`, `lname`, `password`, `activeOrder`, `email`) VALUES ('$utln', '$firstn', '$lastn', MD5('$pass'), '0', '$email')";
        if( $conn->query($sql)==true){
            $_SESSION["loggedin"]="created";
            header("Location: http://tuftsdining.infinityfreeapp.com/login.php");
            die();
        }
        else{
            $_SESSION["loggedin"]="createfail";
            header("Location: http://tuftsdining.infinityfreeapp.com/login.php");
            die();
        }

         ?>