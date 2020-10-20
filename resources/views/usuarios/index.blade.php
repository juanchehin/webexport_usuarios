@include('usuarios\header');
{{--  Mensaje  --}}
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
{{--  Cuerpo de pagina  --}}

<div class="container">
    <div class="row">
        <div class="col-auto mr-auto">
            <h1 class="well">Listado de usuarios</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 ml-md-auto">
            <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary" onclick="location='usuarios/create'">
            <i class="fa fa-plus"></i>
            Nuevo usuario
            </button>
        </div>
    </div>
    <br>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h3 class="card-title">Usuarios registrados ( <small> </small> )</h3>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Apellido</th>
      <th scope="col">Nombre</th>
      <th scope="col">Edad</th>
      <th scope="col">Email</th>
      <th scope="col">Telefono</th>
      <th></th>
    </tr>
  </thead>
    <tbody>
        @foreach($usuarios as $usuario)
          <tr>
            {{--  <td>{{ $loop->iteration }}</td>  --}}
            <td>{{ $usuario->Apellido }}</td>
            <td>{{ $usuario->Nombre }}</td>
            <td>{{ $usuario->Edad }}</td>
            <td>{{ $usuario->Email }}</td>
            <td>{{ $usuario->Telefono }}</td>
            <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{ url('/usuarios/'.$usuario->id.'/edit') }}" type="button" class="btn btn-success">Editar</a>
              <form method="post" action="{{ url('/usuarios/'.$usuario->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Realmente desea borrar el registro?');" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
            </td>
          </tr>
        </tbody>
        @endforeach
</table>


</div>
        </div>
        <br>
        <button class="btn btn-secondary">
            Anteriores
          </button>

        <button class="btn btn-secondary" style="margin-left: 50px; ">
              Siguientes
          </button>
        <br>
    </div>
    <!-- <br><br> -->


</div>
@include('usuarios\footer');
