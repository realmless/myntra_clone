<?php

include('db/database.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login:Myntra</title>

    <link rel="shortcut icon" href="home/myntra_logo.jpg" type="image/x-icon">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/style2.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>


    <header>

        <div id="logo-container">
            <a href="home.html"><img src="home/myntra_logo.jpg" alt="myntra-logo" id="myntra-home"></a>
            <div id="content">
                <a href="home.html">Home</a>
                <a href="registration.php">Create Account</a>
                <a href="login.php">Log In</a>
                <a href="bag.html">Orders</a>
                <a href="wishlist.html">WishList</a>
                <a href="">Contact Us</a>
            </div>
        </div>

        <nav id="navbar">
            <a href="men.html">Men</a>
            <a href="women.html">Women</a>
            <a href="kids.html">Kids</a>
            <a href="living.html">Home & Living</a>
            <a href="beauty.html">Beauty</a>
            <a href="">Studio<sup>New</sup></a>
        </nav>

        <div id="search-bar">
            <i class='bx bxs-search-alt-2' id="img"></i>
            <input id="search-input" placeholder="Search for products, brands and more">
        </div>

        <div id="action-bar">

            <div id="action-container">
                <i class='bx bxs-user-pin'></i>
                <a href="login.php" id="login">Profile</a>
            </div>

            <div id="action-container">
                <i class='bx bxs-shopping-bags'></i>
                <a href="bag.html" id="login">Cart</a>
            </div>

            <div id="action-container">
                <i class='bx bx-heart'></i>
                <a href="wishlist.html" id="login">WishList</a>
            </div>

        </div>

    </header>

    <form action="login.php" method="post">

        <div id="form">

            <div id="icon">
                <img src="login/new1.webp">
            </div>

            <div id="details">
                <h2>Login</h2>

                <div id="input-box" class="box">
                    <label><input type="text" placeholder="username" name="username" required></label>
                </div>

                <div id="input-box" class="box">
                    <label><input type="password" placeholder="password" name="password" required></label>
                </div>

                <div id="input-btn">
                    <input type="submit" id="btn" name="submit" value="Login">
                </div>

                <p id="p1">Don't have an account?<a href="registration.php" id="conn">Register</a></p>

            </div>

        </div>

    </form>


</body>

</html>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username=filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);

    $password=filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username)){
        echo"username missing";
    }
    else if(empty($password)){
        echo"password missing";
    }
    else{

        $sql="SELECT * FROM users WHERE username='$username'";

        $result=mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);

            $db_name=$row['username'];
            $db_pass=$row['password'];

            if($db_name==$username and $db_pass==$password){
                echo"LOGIN SUCCESS";
                header('location:home.html');
            }
            else{
                echo"LOGIN CREDENTIALS ERROR";
            }
        }
        else{
            echo"USER IS NOT FOUND IN THE DATABASE";
        }
    }
}

mysqli_close($conn);

?>