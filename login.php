<?php
      session_start();

      include("db.php");

      if($_SERVER['REQUEST_METHOD'] == "POST")
      {
        $gmail = $_POST['mail'];
        $password = $_POST['pass'];

        if(!empty($gmail)  && !empty($password) && !is_numeric($gmail))
        {
            $query = "select * from project where email='$gmail' limit 1";
            $result = mysqli_query($con,$query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['pass'] == $password)
                    {
                        header("Location: home.html");
                        die;
                    }
                }
            }
            echo "<script type='text/javascript'> alert('wrong username or password')</script>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('wrong username or password')</script>";
        }
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
.login{
    background-image: url('loginback.avif');
}

</style>
<body style="background-image: url('background1.avif');background-size:cover" >
<header>
        <nav>
            <h1>EASYSHOP</h1>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Cart</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Login</a></li>
                <li><a href="index.php">Signup</a></li>
                <li><a href="">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="login">
    
        <h1>Login</h1>
        <form method="POST">
           <label>Email</label>
           <input type="email" name="mail" required>
           <label>Password</label>
           <input type="password" name="pass" required>
           <input type="submit" value="submit">
        </form>
       <p>Not have an account? <a href="index.php">signup</a></p>
    </div>
</body>
</html>
