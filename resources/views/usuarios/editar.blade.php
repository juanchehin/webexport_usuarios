@include('usuarios\header');
{{--  Cuerpo de pagina  --}}

<div class="container">
    <h1 class="well">Edita Usuario</h1>
    <div class="col-lg-12 well">
        <div class="row">
        <form action="{{ url('/usuarios/'.$usuario->id) }}" method="POST">
        {{--  TOKEN  --}}
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

                <div class="col-sm-12">

                    <div class="alert alert-primary" role="alert">
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label>{{'Apellido'}}</label>
                                <input name="Apellido" required type="text" value="{{ $usuario->Apellido }}" class="form-control" id="Apellido" placeholder="Apellido...">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label> {{'Nombre'}} </label>
                                <input name="Nombre" required type="text" value="{{ $usuario->Nombre }}"  class="form-control" id="Nombre" placeholder="Nombre...">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>{{'Edad'}} </label>
                                <input name="Edad" required type="number" value="{{ $usuario->Edad }}" class="form-control" id="Edad" placeholder="Edad..">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>{{'Email'}} </label>
                                <input name="Email" required type="email" value="{{ $usuario->Email }}" class="form-control" id="Email" placeholder="Email...">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>{{'Telefono'}} </label>
                                <input name="Telefono" required type="text" value="{{ $usuario->Telefono }}"  class="form-control" id="inputCity" placeholder="Telefono...">
                            </div>
                        </div>
                    </div>
                    <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block" name="edita" value="edita">Editar</button>
                <br>
            </form>
                <a type="button" class="btn btn-success btn-lg btn-block" href="{{ url('usuarios') }}">Cancelar</a>
                <br>
        </div>
    </div>
</div>
@include('usuarios\footer');
