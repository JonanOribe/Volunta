<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style/styles.css">
    <meta charset="UTF-8">
</head>

<body>

    <h2 class="titulo">Formulario Login</h2>

    <form method="post" action="login.php" id="form">
             <?php
                session_start();
                 if(isset($_SESSION['error_login'])){
                    echo $_SESSION['error_login'];
                    unset($_SESSION['error_login']);
                }
            ?>

        <div class="imgcontainer">
            <img src="./img/avatar.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <!--<button class="buttonColor" type="submit" onclick="location.href='vistaPrincipalVoluntario.html';">Login</button>-->
            <button class="buttonColor" type="submit" onclick="location.href='login.php';">Login</button>
            <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button class="buttonColor" type="button" onclick="location.href='http://127.0.0.1/Volunta/listadoPersonas.php';">MODO ADMIN</button>
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>

</body>

</html>