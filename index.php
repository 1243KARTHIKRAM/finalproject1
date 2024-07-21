<?php
session_start();

include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $Gender = $_POST['gender'];
    $num = $_POST['number'];
    $address = $_POST['add'];
    $gmail = $_POST['mail'];
    $password = $_POST['pass'];

    if (!empty($gmail) && !empty($password) && !is_numeric($gmail)) {
     $query = "INSERT INTO project (fname, lname, gender, cnum, address, email, pass) VALUES ('$firstname', '$lastname', '$Gender', '$num', '$address', '$gmail', '$password')";

        if (mysqli_query($con, $query)) {
            echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Registration Failed')</script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Please Enter some valid Information')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
        
header {
    background: #3333337c;
    color: #fff;
    padding: 1rem 0;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 90%;
    margin: 0 auto;
}

nav h1 {
    font-size: 1.5rem;
}

nav ul {
    display: flex;
    list-style: none;
}

nav ul li {
    margin-left: 1rem;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}
h1:hover{
    color: #ff7200;
}
a:hover{
    color: #ff7200;
}

</style>
<body style="background-image: url('background1.avif'); background-size:cover;">
<header>
        <nav>
            <h1>EASYSHOP</h1>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Cart</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">About</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </nav>
    </header>
     <div class="signup" style="background-image: url('loginback.avif')">
          <h1>Signup</h1>
          <h4>It's free and only takes a minute</h4>
          <form method="POST">
             <label>First Name</label>
             <input type="text" name="fname" required>
             <label>Last Name</label>
             <input type="text" name="lname" required>
             <label>Gender</label>
             <input type="text" name="gender" required>
             <label>Contact Number</label>
             <input type="tel" name="number" required>
             <label>Address</label>
             <input type="text" name="add" required>
             <label>Email</label>
             <input type="email" name="mail" required>
             <label>Password</label>
             <input type="password" name="pass" required>
             <input type="submit" value="Submit">
          </form>
          <p>By clicking the Sign Up button, you agree to our
          <a href="">Terms and Conditions</a> and <a href="">Privacy Policy</a>
          </p>
          <p>Already have an account? <a href="login.php">Login here</a></p>
     </div>
</body>
</html>
