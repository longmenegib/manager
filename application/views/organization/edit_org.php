  <!-- MODAL EDIT -->
  <form action="<?= base_url('update-org')?>" method="post" autocomplete="off">
            <div class="modal fade" id="Modal_Edit_Org" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Organization</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">id</label>
                            <div class="col-md-10">
                              <input type="text" name="org_id" id="org_id" class="form-control" placeholder="id">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                              <input type="text" name="org_name_edit" id="org_name_edit" class="form-control" placeholder="Ex: Bhent Cameroun">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Location</label>
                            <div class="col-md-10">
                              <input type="text" name="org_location_edit" id="org_location_edit" class="form-control" placeholder="Yaounde, Cameroun">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Domain</label>
                            <div class="col-md-10">
                              <input type="text" name="org_domain_edit" id="org_domain_edit" class="form-control" placeholder="Informatique">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" id="btn_update" class="btn btn-primary" value="Update organization">
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->
 
    