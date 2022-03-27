@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    
                    {{ __('MIS PRODUCTOS') }}
                                
                                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_producto">
                    Agregar Producto
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
                        <form action="/categoria/save" method="post">
                            @csrf

                                <div class="modal-body">


                                                <label for="">Categoria</label>
                                                <select name="categoria"  class="form-control">

                                                    @foreach ( $categorias as $categoria )

                                                    <option value="{{ $categoria->id}}">{{ $categoria->name }}</option>
                                                        
                                                    @endforeach
                                                 


                                                  </select>


                                                
                                                  <label for="">Nombre</label>
                                                  <input  name="nombre" class="form-control" type="text">
                                                
                                                  <label for="">Descripcion</label>
                                                  <input  name="descripcion" class="form-control" type="text">

                                                  
                                                <label for="">Precio</label>
                                                <input  name="precio" class="form-control" type="text">

                                                
                                                <label for="">Stock</label>
                                                <input  name="stock" class="form-control" type="number">


                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            </div>



                            </div>
				        	</form>

                    </div>
                </div>

                </div>

                <div class="card-body">
                 

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Accciones</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach($empleados as $empleado)
                            <tr>
                                <td>{{$loop->iteration}}</td>         
                                <td>{{$empleado->categoria->name}} </td> 
                                <td>{{$empleado->name}} </td> 
                                <td>{{$empleado->precio }} </td> 
                                <td>{{$empleado->stock }} </td> 
			                    <td class="text-bold-600">{!! $empleado->status() !!}</td>

                              
                                <td>
                                <a class="btn btn-warning" href=" {{ url('/rol/'.$empleado->id.'/edit') }}">
                                Editar
                                </a>           
                                

                                <a href="#" type="submit" onclick="eliminar({{ $empleado->id }})" class="btn btn-danger" >Eliminar</a>

                                </td>       
                            </tr>
                    
                            @endforeach
                    
                        </tbody>
                    </table>

                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>

function eliminar(id) {
    Swal.fire({
        title: 'Quiere eliminar este registro?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        confirmButtonClass: 'btn btn-warning',
        cancelButtonText: 'Cancelar',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
        allowOutsideClick: function () {
            !Swal.isLoading()
        },
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                type: 'GET',
                url: '/categoria/delete/'+id,
                data: $(this).serialize(),
                success: function(data) {
                    if (data.type == 'success'){
                        autClose(data.title);
                        setTimeout(function(){ location.reload(); }, 1500);
                        
                    }else if(data.type == 'error'){ 
                        msg_type(data.type,data.title,'');
                    }
                }   
            });
            
        }
        else if (result.dismiss === Swal.DismissReason.cancel) {
            msg_type('success','Tu registro imaginario ha sido salvado','');
        }
    })
}
 

</script>