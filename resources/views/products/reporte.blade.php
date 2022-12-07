@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reporte por Fecha') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('reporte.product') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <input class="form-control @error('fecha') is-invalid @enderror" type="date" name="fecha" id="fecha" value="{{ old('fecha') }}" autocomplete="fecha"/>
                            @error('fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning btn-sm"><i class="fa-regular fa-file-lines"></i> Generar</button>
                                <a href="{{ route('index.product') }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-angles-left"></i> Regresar</a>
                            </div>
                        </div>
                    </form>

                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Generado por</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($products))
                                @foreach ($products as $product)
                                    <tr>
                                        <td><a href="{{ route('show.product', ['id' => $product->id]) }}" style="text-decoration:none"><strong>{{ $product->id }}</strong></a></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->user->name }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td><span>no data...</span></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
