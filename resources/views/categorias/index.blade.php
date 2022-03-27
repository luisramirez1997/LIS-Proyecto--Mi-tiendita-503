
@extends('layouts.app')
@section('content')
<div class="container">


{{-- @include('partial.mensajes') --}}


<button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_producto">
    Agregar Categoria
</button>

<!-- Modal -->
<div class="modal fade" id="agregar_producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos del Nuevo Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form action="/categoria/create" method="post">
            @csrf

                <div class="modal-body">


                                  <label for="">Nombre</label>
                                  <input  name="nombre" class="form-control" type="text">
                                
                                  <label for="">Descripcion</label>
                                  <input  name="descripcion" class="form-control" type="text">


                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>



            </div>
            </form>

    </div>
</div>




<br/>
<br/>

<table class="table table-light table-hover">

<thead class="thead-light">
    <tr>

    <th> Num </th>
    <th> Nombre </th>
    <th> Descripcion </th>
    <th> Estado </th>
    <th> Acciones </th>
    
    </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{$loop->iteration}}</td>         
           
            <td>{{$empleado->name}} </td> 
            <td>{{$empleado->descripcion }} </td> 

			<td class="text-bold-600">{!! $empleado->status() !!}</td>

          
            <td>
            <a class="btn btn-warning" href=" {{ url('/rol/'.$empleado->id.'/edit') }}">
            Editar
            </a>           
            <form method="post" action="{{ url('/rol/'.$empleado->id)  }}" style="display:inline">
            {{csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-danger" type="submit" onclick="return confirm('Borrar?');" >Borrar</button>
            </form>
            </td>       
        </tr>

        @endforeach

    </tbody>
</table>



{{ $empleados->links()  }}

</div>
@endsection
