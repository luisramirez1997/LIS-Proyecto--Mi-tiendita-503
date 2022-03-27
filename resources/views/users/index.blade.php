
@extends('layouts.app')
@section('content')
<div class="container">


{{-- @include('partial.mensajes') --}}



<a href="{{ url('roles/create') }}" class="btn btn-success"> Agregar Usuariuo</a>
<br/>
<br/>

<table class="table table-light table-hover">

<thead class="thead-light">
    <tr>

    <th> Num </th>
    <th> Nombre </th>
    <th> Correo </th>
    <th> Rol </th>
    <th> Estado </th>
    <th> Acciones </th>
    
    </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{$loop->iteration}}</td>         
           
            <td>{{$empleado->name}} </td> 
            <td>{{$empleado->email}} </td> 
            <td>{{$empleado->rol->descripcion }} </td> 
            <td>{{$empleado->estado}} </td> 
          
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
