@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('flash-messages.flash')
            <div class="card">
                <div class="card-header">{{ __('Detalle del Producto') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <p><strong>{{ $product->name }}</strong></p>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción:</label>
                        <p><strong>{{ $product->description }}</strong></p>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Precio:</label>
                        <p><strong>{{ $product->price }} $</strong></p>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Generado por:</label>
                        <p><strong>{{ $product->user->name }}</strong></p>
                    </div>

                    <form name="form1" role="form" method="post" action="{{ route('destroy.product', ['id' => $product->id]) }}">
                        <div class="mb-3">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary mb-3" href="{{ route('index.product') }}"><i class="fa-solid fa-angles-left"></i> Regresar</a>
                            <button type="submit" class="btn btn-warning mb-3"><i class="fa-solid fa-trash-can"></i> Eliminar Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
