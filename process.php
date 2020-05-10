<?php

// Connection details
$servername="localhost";
$username="root";
$password="";
$dbname="names";

// Create a databse connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Ensure database is connected
if (!$conn){
    die("connection error: " . mysqli_connect_error());
}

if (isset($_POST['search'])) {

     $name = $_POST['search'];

     $sql = "SELECT * FROM common_names WHERE name LIKE '$name%'";
     $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);

     if(mysqli_num_rows($result) > 0){
         while($row = mysqli_fetch_assoc($result)){
             $data[] = array('id' => $row['id'], 'name' => $row['name']);
         }
     }

     echo json_encode($data);
}