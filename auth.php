<?php

function isNotStudent(){
    if(isset($_SESSION['studentId']) == false){
        header("location: index.php");
        exit();
    }
}

function isStudent(){
    if(isset($_SESSION['studentId'])){
        header("location: home.php");
        exit();
    }
}

function isNotAdmin(){
    if(isset($_SESSION['admin']) == false){
        header("location: index.php");
        exit();
    }
}

function isAdmin(){
    if(isset($_SESSION['admin'])){
        header("location: admin-home.php");
        exit();
    }
}

?>