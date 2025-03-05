<?php
    	$host = "localhost";
        $user = "root";
        $pwd = "12345678P";
        $db = "shop4621";
    	
        $conn = mysqli_connect($host,$user,$pwd)or die ("cannotconnection");
        mysqli_select_db($conn, $db)or die ("cannotconnection");
        mysqli_query($conn, "set names utf8");
?>
