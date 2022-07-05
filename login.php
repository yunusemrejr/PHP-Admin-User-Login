<?php

$host="localhost";
$user="root";
$password="";
$db="user";

$data= mysqli_connect($host,$user,$password,$db);
if($data===false){
    die("error");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];


    $sql="select * from `login` where username= '".$username."'    and password=  '".$password."' ";

    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);
     
    if($row !== null){

         

        if($row["usertype"]=="user"){
            echo "<h1 style='color:green'>Welcome to your User panel!</h1>";
        }
       else if($row["usertype"]=="admin"){
            echo "<h1 style='color:green'>Welcome to your Admin panel!</h1>";
        }
        else{
            echo "<h2 style='color:red'>username or password incorrect</h2>";
        }



    }

    if($row == null){
        echo "<h2 style='color:red'>username or password incorrect</h2>"; 
       }

}

?>



<!DOCTYPE html>
<html style="font-family:arial;">
    <head>

<title></title>


</head>
<body>
<h1>Login Page</h1>

<form action="#" method="POST">
<div>
    <label>username</label>
    <input type="text" name="username" required> 
</div>

<div>
    <label>password</label>
    <input type="password" name="password" required> 
</div>

<div>
     <input type="submit" value="login"> 
</div>
</form>
</body>
       
</html>
