@include('usuarios\header');
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
                                <input maxlength="11" size="11" required pattern="[0-9]*" name="Telefono" required type="text" class="form-control" id="inputCity" placeholder="Telefono...">
                            </div>
                        </div>
                    </div>

                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="alta" value="alta">Cargar</button>
                <br>
            </form>
                <a type="button" class="btn btn-success btn-lg btn-block" href="{{ url('usuarios') }}">Cancelar</a>
                <br>
        </div>
    </div>
</div>

{{--  Pie de pagina  --}}
@include('usuarios\footer');
