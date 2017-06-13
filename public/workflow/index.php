<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/form.css" rel="stylesheet">
    <title>Login - Sistema web para el control de flujo de trabajo</title>
</head>
<body>
<div class="container">
    <div class="card card-container">
        <div class="center-align">
            <h3 class="uppercase">Sistema web para el control de flujo de trabajo</h3>
        </div>
        <img id="profile-img" class="profile-img-card" src="img/user.png"/>
        <p id="profile-name" class="profile-name-card"></p>
        <form action="login.php" method="post" class="form-signin" id="sign-in">
            <input type="text" name="id_usuario" id="id_usuario" class="form-control" placeholder="Usuario" autofocus>
            <input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Contraseña">
            <div class="has-error">
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-wrk" type="submit">Iniciar sesión</button>
        </form><!-- /form -->
    </div><!-- /card-container -->
</div><!-- /container -->
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/validate-spanish.js"></script>
<script>
    $("#sign-in").submit(function (event) {
        var validator = $("#sign-in").validate({
            rules: {
                id_usuario: {
                    required: true,
                    minlength: 3
                },
                contrasena: {
                    required: true,
                    minlength: 4
                }
            }
        });
        if (!validator.form()) {
            event.preventDefault();
        }
    });
</script>
</body>
</html>