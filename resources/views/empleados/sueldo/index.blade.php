@extends("theme.$theme.layout")

@section('titulo')
    Sueldos
@endsection
@section("scripts")
    <script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection
@section('contenido')
    <div class="content-header">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Sueldos</h3>    
                <div class="card-tools pull-right">    
                    <a href="{{route('crear_sueldo')}}" class="btn btn-info btn-sm">    
                        <i class="fa fa-fw fa-plus-circle"></i> Nuevo registro    
                    </a>        
                </div>                   
            </div>        
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped" id="tabla-data">
                    <thead>
                        <tr class="text-center">
                            <th class="width20">ID</th>
                            <th>Sueldo</th>
                            <th>Tipo de Pago</th>
                            <th>Departamento</th>
                            <th>Empleado</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sueldos as $sueldo)
                            <tr class="text-center">
                                <td>{{$sueldo->id}}</td>
                                <td>{{$sueldo->Sueldo}}</td>
                                <td class="text-center">
                                    @foreach ($sueldo->tipos as $tipo)
                                        {{$loop->last ? $tipo->tipo : $tipo->tipo. ','}}
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    @foreach ($sueldo->departamentos as $departamento)
                                        {{$loop->last ? $departamento->Nombre_departamento : $departamento->Nombre_departamento. ','}}
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    @foreach ($sueldo->empleados as $empleado)
                                        {{$loop->last ? $empleado->primer_nombre : $empleado->primer_nombre. ','}}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('editar_sueldo', ['id' => $sueldo->id])}}" class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('eliminar_sueldo', ['id' => $sueldo->id])}}" class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete")
                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar este registro">
                                            <i class="fa fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>   
        </div>   
    </div>
@endsection