<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Realmente desea eliminar este producto?<br><br>
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
            </div>
            <div class="modal-footer">
                <form action="{{ route('destroy.product', ['id' => $product->id]) }}" method="post">
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