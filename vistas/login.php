<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/principal.css">
    <link rel="stylesheet" href="../public/css/login2.css">
    <title>Bloodify</title>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <h1 class="titulo">Bloodify</h1>
            <form class="col s12 center" id="formAcceso">
               <div class="input-field col s6">
                  <input id="usuario" name="usuario" type="email" class="validate">
                  <label id="texto1">E-mail</label>
               </div>
               <div class="input-field col s6">
                  <input id="pass" name="pass" type="password" class="validate">
                  <label id="texto2">Contraseña</label>
               </div>
                <!--div class="form-group">
                    <input type="checkbox" class="form-control">Recuérdame
                </div!-->
                <button class="btn #d32f2f red darken-2 waves-effect waves-light" 
                type="submit">Iniciar Sesión</button>
                <div class="s12">
                </br><a href="RegistroDonante.php" id="resgistrarse">Registrarse</a>
                </div>
            </form>
        </div>
    </div>

    <script src="../public/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../public/js/materialize.js"></script>
    <script src="scripts/login.js"></script>
</body>
</html>