<?php
    	$host = "localhost";
        $user = "root";
        $pwd = "";
        $db = "shop";
    	
        $conn = mysqli_connect($host,$user,$pwd)or die ("cannotconnection");
        mysqli_select_db($conn, $db)or die ("cannotconnection");
        mysqli_query($conn, "set names utf8");
?>
