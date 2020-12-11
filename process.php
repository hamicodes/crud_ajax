<?php
// session_start();

require "connection.php";

// $id = ;
$name = "";
$age = "";
$location = "";
// $update = true; 

if(isset($_POST["create"])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $location = $_POST["location"];
    $con->query("INSERT INTO crud (name, age, location) VALUES('$name', '$age','$location')");
    $id = $con -> insert_id;
    $res = $con->query("SELECT * FROM crud WHERE id=$id;");
    $row = $res->fetch_assoc();
    echo json_encode($row);
}

if(isset($_POST["delete"])) {
    $id = $_POST["delete"];
    $con->query("DELETE FROM crud WHERE id=$id;");
}

if(isset($_POST["edit"])) {
    $id = $_POST["edit"];
    $res = $con->query("SELECT * FROM crud WHERE id=$id;");
    $row = $res->fetch_assoc();
    echo json_encode($row);
}

if(isset($_POST["update"])) {
    $id = $_POST["update"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $location = $_POST["location"];
    $con->query("UPDATE crud SET name = '$name', location ='$location', age = '$age' WHERE id=$id"); 
    $res = $con->query("SELECT * FROM crud WHERE id=$id;");
    $row = $res->fetch_assoc();
    echo json_encode($row);
}
