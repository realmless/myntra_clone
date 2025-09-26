<?php

include('db/database.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register:Myntra</title>

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
            <a href="women.html">Home & Living</a>
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

    <main>

        <form action="registration.php" method="post">

            <div id="form">

                <div id="icon">
                    <img src="login/new1.webp">
                </div>

                <div id="details">
                    <h2>Register</h2>

                    <div id="input-box" class="box">
                        <label><input type="text" placeholder="username" name="username" required></label>
                    </div>

                    <div id="input-box" class="box">
                        <label><input type="password" placeholder="password" name="password" required></label>
                    </div>

                    <div id="input-box1" class="box">
                        <select id="sel">
                            <option>+91</option>
                            <option>+92</option>
                        </select>
                        <label><input type="tel" placeholder="phone-number" name="number" required></label>
                    </div>

                    <div id="input-box" class="box">
                        <label><input type="email" placeholder="email" name="email" required></label>
                    </div>

                    <div id="input-btn">
                        <input type="submit" id="btn" name="submit" value="Continue">
                    </div>

                    <p id="p1">Have an account?<a href="login.php" id="conn">Login</a></p>

                </div>

            </div>

        </form>
    </main>


</body>

</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);

    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    $phonenumber = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_INT);

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($username)) {
        echo "username missing";
    } else if (empty($password)) {
        echo "password missing";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(username,password,phnum,email)
        VALUES('$username','$password','$phonenumber','$email')";

        try {
            mysqli_query($conn, $sql);
            echo "USER IS REGISTERED";
            header('location:home.html');
        } catch (mysqli_sql_exception) {
            echo "USER CAN'T BE REGISTERED<BR>";
            echo "ANOTHER USER PRESENT WITH THIS USERNAME";
        }
    }

    mysqli_close($conn);
}

?>