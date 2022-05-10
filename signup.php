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
    <div class="signup">
        <h1>Registrazione al sito</h1>
        <form action="signup.php" method="post" id="formuser">
            <label for="email">email</label><br>
            <input type="text" id="email" name="email"><br><br>
            <label for="text">nome</label><br>
            <input type="text" id="nome" name="nome"><br><br>
            <label for="text">cognome</label><br>
            <input type="text" id="cognome" name="cognome"><br><br>
            <label for="text">nickname</label><br>
            <input type="text" id="nickname" name="nickname"><br><br>
            <label for="text">codice fiscale</label><br>
            <input type="text" id="cf" name="cf"><br><br>
            <label for="password">password</label><br>
            <input type="text" id="password" name="password"><br><br>
            <input type="submit" value="signup" name="signup">
        </form>

        <a href="login.php">Accedi</a>
    </div>

    <?php
    if (isset($_POST['signup'])) {
        signup();
    }

    function signup()
    {
        $email = $_POST['email'];
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $nickname = $_POST['nickname'];
        $cf = $_POST['cf'];
        $password = $_POST['password'];
        echo $email . " " . $nome . " " . $cognome . " " . $nickname . " " . $cf . " " . $password;
        $conn = new mysqli("localhost", "root", "", "webcommunity");
        //get the category id
        $sql = "INSERT INTO membri(CF,nome,cognome,nickname,email,password) VALUES ('$cf','$nome','$cognome','$nickname','$email','$password')";
        $conn->query($sql);
        $conn->close();
        session_start();
        echo "Login effettuato";
        header("Location:index.php");
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['nickname'] = $nickname;
        $_SESSION['CF'] = $cf;
    }
    ?>
</body>

</html>