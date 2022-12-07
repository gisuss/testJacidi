<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Realmente desea eliminar este usuario?<br><br>
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
            </div>
            <div class="modal-footer">
                <form action="{{ route('destroy.user', ['user_id' => $user->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fa-solid fa-angles-left"></i> Regresar</button>
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->