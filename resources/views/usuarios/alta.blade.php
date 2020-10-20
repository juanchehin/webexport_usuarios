<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
  <h3 href="index.php"> WebExport - Usuarios </h3>
</nav>
{{--  Cuerpo de pagina  --}}

<div class="container">
    <h1 class="well">Nuevo Usuario</h1>
    <div class="col-lg-12 well">
        <div class="row">
        <form action="{{ url('/usuarios') }}" method="POST">
            {{ csrf_field() }}

                <div class="col-sm-12">

                    <div class="alert alert-primary" role="alert">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>{{'Apellido'}}</label>
                                <input name="Apellido" required type="text" class="form-control" id="Apellido" placeholder="Apellido...">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label> {{'Nombre'}} </label>
                                <input name="Nombre" required type="text" class="form-control" id="Nombre" placeholder="Nombre...">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>{{'Edad'}} </label>
                                <input name="Edad" required type="number" class="form-control" id="Edad" placeholder="Edad..">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>{{'Email'}} </label>
                                <input name="Email" required type="email" class="form-control" id="Email" placeholder="Email...">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>{{'Telefono'}} </label>
                                <input name="Telefono" required type="text" class="form-control" id="inputCity" placeholder="Telefono...">
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="alta" value="alta">Cargar</button>
                    <br>
                </div>
            </form>
        </div>
    </div>
</div>

{{--  Pie de pagina  --}}


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
<br><br>
<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-4 mb-5">
                <h3>Acerca de 'Usuarios'</h3>
                <ul class="list-unstyled footer-link d-flex footer-social">
                    <li><a href="https://www.facebook.com/juan.chehin/" class="p-2"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="https://www.instagram.com/chehin.j/" class="p-2"><span class="fa fa-instagram"></span></a></li>
                </ul>

            </div>
            <div class="col-md-5 mb-5 pl-md-5">
                <div class="mb-5">
                    <h3>Informacion de contacto</h3>
                    <ul class="list-unstyled footer-link">
                        <li class="d-block">
                            <span class="d-block"><i class="material-icons">room</i> Direccion:</span>
                            <span>San miguel de tucuman, Argentina</span></li>
                        <li class="d-block"><span class="d-block">Telefono:</span><span><i class="material-icons">phone</i>+54 9 3865 415369</span></li>
                        <li class="d-block"><span class="d-block">Email:</span><span><i class="material-icons">email</i>chehinjuan@gmail.com</span></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-3 mb-5">
                <h3>Links</h3>
                <ul class="list-unstyled footer-link">
                    <li><a href="https://www.instagram.com/chehin.j/">Acerca de</a></li>
                    <li><a href="https://www.instagram.com/chehin.j/">Terminos de uso</a></li>
                    <li><a href="https://www.instagram.com/chehin.j/">Contacto</a></li>
                    <li><a href="https://www.instagram.com/chehin.j/">Otros</a></li>
                </ul>
            </div>
            <div class="col-md-3">

            </div>
        </div>
        <div class="row">
            <div class="col-12 text-md-center text-left">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> Todos los derechos reservados <a href="https://www.facebook.com/juan.chehin/" target="_blank">Chehin Juan Martin</a>
                </p>
            </div>
        </div>
    </div>
</footer>
