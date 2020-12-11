<?php
session_start();

$con = new mysqli('localhost', 'root', 'sqlpass', 'sql_prac');

// $id = ;
$name = "";
$age = "";
$location = "";
// $update = true; 

if(isset($_GET["create"])) {
    $name = $_GET["name"];
    $age = $_GET["age"];
    $location = $_GET["location"];
    $con->query("INSERT INTO crud (name, age, location) VALUES('$name', '$age','$location')");
    $id = $con -> insert_id;
    $res = $con->query("SELECT * FROM crud WHERE id=$id;");
    $row = $res->fetch_assoc();
    echo json_encode($row);
}

if(isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $con->query("DELETE FROM crud WHERE id=$id;");
}

if(isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $res = $con->query("SELECT * FROM crud WHERE id=$id;");
    $row = $res->fetch_assoc();
    echo json_encode($row);
}

if(isset($_GET["update"])) {
    $id = $_GET["update"];
    $name = $_GET["name"];
    $age = $_GET["age"];
    $location = $_GET["location"];
    $con->query("UPDATE crud SET name = '$name', location ='$location', age = '$age' WHERE id=$id"); 
    $res = $con->query("SELECT * FROM crud WHERE id=$id;");
    $row = $res->fetch_assoc();
    echo json_encode($row);
}
