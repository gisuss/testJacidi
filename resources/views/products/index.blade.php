@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('flash-messages.flash')
            <div class="card">
                <div class="card-header">{{ __('Lista de Productos') }}
                    <a href="{{ route('create.product') }}" class="btn btn-success btn-sm"><i class="fa-solid fa-plus"></i> Crear</a>
                    <a href="{{ url('almacenista/reportes') }}" class="btn btn-warning btn-sm"><i class="fa-regular fa-file-lines"></i> Reporte</a>
                    <a href="{{ route('home') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-angles-left"></i> Regresar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td><a href="{{ route('show.product', ['id' => $product->id]) }}" style="text-decoration:none"><strong>{{ $product->id }}</strong></a></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a href="{{ route('show.product', ['id' => $product->id]) }}"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('edit.product', ['id' => $product->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $product->id }}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                <!--Ventana Modal para la Alerta de Eliminar--->
                                @include('products.modal_delete')
                            @endforeach
                        </tbody>
                    </table>
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
