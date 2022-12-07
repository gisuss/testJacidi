@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('flash-messages.flash')
            <div class="card">
                <div class="card-header">{{ __('Lista de Usuarios') }}
                    <a href="{{ route('create.user') }}" class="btn btn-success btn-sm"> <i class="fa-solid fa-plus"></i> Crear</a>
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
                                <th>Email</th>
                                <th>Role</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td><a href="{{ route('show.user', ['id' => $user->id]) }}" style="text-decoration:none"><strong>{{ $user->id }}</strong></a></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('show.user', ['id' => $user->id]) }}"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('edit.user', ['id' => $user->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $user->id }}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                <!--Ventana Modal para la Alerta de Eliminar--->
                                @include('users.modal_delete')
                            @endforeach
                        </tbody>
                    </table>
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
