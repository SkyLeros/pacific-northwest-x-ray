<?php 
    $servername = "localhost";
    $username = "id18251758_db_user";
    $password = "WopK1kfEG(*mZE%3";

    //Pass for PNWX_admin is 2L4R/4hb6Qd6GVG3
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    //Check connection
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        //echo "Connection successful!";
    }

    /*$sql = "CREATE DATABASE DB_PNWX";
    $dbResult = mysqli_query($conn, $sql);
    if ($dbResult === FALSE) 
    {
        //echo "Database creation failed:" . mysqli_error($conn);
    }
    else
    {
        //echo "Database created successfully";   
    }*/

    $dbname = "id18251758_db_pnwx";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //Check connection
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        //echo "Connection successful!";
    }

    
?>