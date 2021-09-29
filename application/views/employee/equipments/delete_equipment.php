    <!--MODAL DELETE-->
    <form method="post" action="<?= base_url('delete-equipment') ?>">
            <div class="modal fade" id="Modal_Delete_Equipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="delete"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this equipment?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="equipment_id_delete" id="equipment_id_delete" class="form-control">
                    <input type="hidden" name="org_name" id="org_name" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <input type="submit" id="btn_delete" class="btn btn-primary" value='Yes'>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->