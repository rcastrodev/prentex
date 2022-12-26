<div class="modal fade" id="modal-update-2">
    <form action="{{ route('company.content.updateSlider') }}" method="post" id="form-update-2" class="modal-dialog" data-info="reset">
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
                <input type="text" name="order" class="form-control" placeholder="Orden">
            </div>   
            <div class="form-group">
                <input type="text" name="content_6" class="form-control" placeholder="Iframe de mapa">
            </div> 
            <div class="form-group">
                <input type="text" name="content_1" class="form-control" placeholder="Nombre de oficina">
            </div> 
            <div class="form-group">
                <input type="text" name="content_2" class="form-control" placeholder="Dirección">
            </div> 
            <div class="form-group">
                <input type="text" name="content_3" class="form-control" placeholder="Correo">
            </div> 
            <div class="form-group">
                <input type="text" name="content_4" class="form-control" placeholder="Télefono">
            </div> 
            <div class="form-group">
                <input type="text" name="content_5" class="form-control" placeholder="Instagram">
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