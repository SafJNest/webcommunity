<!DOCTYPE html>
<html>

<head>
    <title>Web Community</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');
    </style>

    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            border: 1px solid #e7e7e7;
            background-color: #f3f3f3;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: #666;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: #ddd;
        }

        li a.active {
            color: white;
            background-color: #04AA6D;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        th {
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <div class="login">
        <h1>Login al sito</h1>
        <form action="login.php" method="post" id="formuser">
            <label for="email">email</label><br>
            <input type="text" id="email" name="email"><br><br>
            <label for="password">password</label><br>
            <input type="text" id="password" name="password"><br><br>
            <input type="submit" value="login" name="login">
        </form>

        <a href="signup.php">Registrati</a>
    </div>

    <?php
    if (isset($_POST['login'])) {
        login();
    }

    function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $conn = new mysqli("localhost", "root", "", "webcommunity");
        //get the category id
        $sql = "SELECT * FROM membri WHERE email = '$email'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $toCheck = $row['password'];
        $nickname = $row['nickname'];
        $cf = $row['CF'];
        if ($toCheck == $password) {
            session_start();
            echo "Login effettuato";
            header("Location:index.php");
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['nickname'] = $nickname;
            $_SESSION['CF'] = $cf;
        } else {
            echo "Login fallito";
        }
    }
    ?>
</body>

</html>