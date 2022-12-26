<div class="modal fade" id="modal-create-2">
    <form action="{{ route('product.attribute.store') }}" method="post" class="modal-dialog" data-info="reset">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="section" value="images">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="order" class="form-control" placeholder="Ingrese el orden AA BB CC">
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Título">
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control" placeholder="Descripcíon">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>