@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('flash-messages.flash')
            <div class="card">
                <div class="card-header">{{ __('Detalle de Usuario') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <p><strong>{{ $user->name }}</strong></p>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico:</label>
                        <p><strong>{{ $user->email }}</strong></p>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Rol:</label>
                        <p><strong>{{ $user->role }}</strong></p>
                    </div>

                    <form name="form1" role="form" method="post" action="{{ route('destroy.user', ['user_id' => $user->id]) }}">
                        <div class="mb-3">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-primary mb-3" href="{{ route('index.user') }}"><i class="fa-solid fa-angles-left"></i> Regresar</a>
                            <button type="submit" class="btn btn-warning mb-3"><i class="fa-solid fa-trash-can"></i> Eliminar Usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
