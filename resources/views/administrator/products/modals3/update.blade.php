<div class="modal fade" id="modal-update-3">
    <form action="{{ route('product.download.update') }}" method="post" id="form-update-3" class="modal-dialog" data-info="reset">
        <input type="hidden" name="section" value="download">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <input type="hidden" name="id">
            <input type="hidden" name="section" value="download">
            <div class="form-group">
                <input type="text" name="order" class="form-control" placeholder="Orden">
            </div>  
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Título">
            </div> 
            <div class="form-group">
                <input type="file" name="image" class="form-control-file">
                <small>archivo para descarga</small>
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