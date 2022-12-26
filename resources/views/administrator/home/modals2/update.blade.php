<div class="modal fade" id="modal-update-2">
    <form action="{{ route('home.content.update') }}" method="post" id="form-update-2" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id">
                <div class="form-group">
                    <input type="text" name="order" class="form-control" placeholder="Ingrese el orden AA BB CC">
                </div>
                <div class="form-group">
                    <label for="">Sección</label>
                    <select name="content_2" class="form-control">
                        <option value="1" >Arriba</option>
                        <option value="2" >Abajo</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="content_1" class="form-control" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-control-file">
                    <small>la imagen debe ser al menos 80x77px</small>
                </div> 
            </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>