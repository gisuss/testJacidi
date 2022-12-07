<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generar Reporte de Porductos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Escoja la Fecha para generar el reporte<br><br>

                <form action="{{ route('report.product') }}" method="GET">
                    @csrf
                    <input type="date" name="fecha" required/>
                    <button type="submit" class="btn btn-warning"><i class="fa-regular fa-file-lines"></i> Generar</button>
                </form>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fa-solid fa-angles-left"></i> Regresar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->