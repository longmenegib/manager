<!-- MODAL ADD -->
<form method='post' action="<?= base_url('save-org')?>" autocomplete="off">  
    <div class="modal fade" id="Modal_Add_Org" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Organization</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Organization name</label>
                    <div class="col-md-10">
                        <input type="text" name="org_name" id="org_name" class="form-control" placeholder="Ex: Bhent Cameroun">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Organization Location</label>
                    <div class="col-md-10">
                        <input type="text" name="org_location" id="org_location" class="form-control" placeholder="Ex: Yaounde, Cameroun">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Organization Domain</label>
                    <div class="col-md-10">
                        <input type="text" name="org_domain" id="org_domain" class="form-control" placeholder="Ex: Technology">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" id="btn_save" class="btn btn-primary" value="Save organization">
            </div>
        </div>
        </div>
    </div>
</form>
<!--END MODAL ADD-->