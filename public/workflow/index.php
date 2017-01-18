<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Login</title>
</head>
<body>


    <!-- Iniciar Sesion -->
    <section id="registro" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <form class="form-signin" role="form" method="POST" action="login.php">

                        <h3>Iniciar Sesión</h3>

                        <p>Usuario <input type="text" class="form-control" required="" name="id_usuario">
                        <p>Contraseña <input type="password" class="form-control" required="" name="contrasena">

                        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesi&oacute;n</button>
                    </form>

                </div>
            </div>
        </div>
    </section>


</body>
</html>