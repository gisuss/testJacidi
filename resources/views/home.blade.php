@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('flash-messages.flash')
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (auth()->check())
                        @if (auth()->user()->role === 'Administrador')
                            <a href="{{ route('index.user') }}">Usuarios</a>
                            <a href="{{ route('index.product') }}">Productos</a>
                        @else
                            <a href="{{ route('index.product') }}">Productos</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
