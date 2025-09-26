<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/admin.css">

</head>

<body style="margin: 50px;">

    <div id="heading">
        <h1>List of User Credentials:</h1><br>
        <h4>Admin Page</h4>
    </div>
    <table class="table" border="4" id="tab">
        <tr align="center">
            <th width='100'>Index No.</th>
            <th width='100'>Username</th>
            <th width='100'>Password</th>
            <th width='100'>Phone-Number</th>
            <th width='100'>Email</th>
            <th width='100'>Reg-Date&Time</th>
        </tr>
        <?php

        $db_server = 'localhost';
        $db_user = 'root';
        $db_password = '';
        $db_name = 'online-shopping';
        $conn = '';

        //create connection
        $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);

        //check connection
        if ($conn->connect_error) {
            die("Connection failed:" . $conn->connect_error);
        }

        $sql = "SELECT * FROM users";

        //read all row from the database table
        $result = $conn->query($sql);

        if (!$result) {
            die("Invalid query:" . $conn->error);
        }

        //read data from each row
        while ($row = $result->fetch_assoc()) {

            echo "
                <tr align='center'>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td>" . $row['phnum'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['reg_date'] . "</td>
                <tr>
                ";
        }

        ?>
    </table>

</body>

</html>