
<form action="" method="POST" class="modalCanc">
    @csrf
    @method('DELETE')
<div class="modal fade" id="modal">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Deseja Realmente Excluir ?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Voltar</button>
          <button type="submit" id="btnConfimDelete" class="btn btn-outline-light">Confirmar</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  </form>