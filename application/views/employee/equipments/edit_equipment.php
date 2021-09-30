<!-- MODAL ADD -->
<form method='post' action="<?= base_url('update-equipment')?>" autocomplete="off">  
    <div class="modal fade" id="Modal_Edit_Equipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Equipment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="form-group row">
                    <div class="col-md-10">
                        <input type="hidden" readonly name="equipmentid" id="equipmentid" class="form-control" placeholder="Ex: Computer laptop">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">orgname</label>
                    <div class="col-md-10">
                        <input type="text" readonly name="org_name" id="org_name" class="form-control" placeholder="Ex: Computer laptop">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Equipment type</label>
                    <div class="col-md-10">
                        <input type="text" name="type_edit" id="type_edit" class="form-control" placeholder="Ex: Computer laptop">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">Mac address</label>
                    <div class="col-md-10">
                        <input type="text" name="mac_address_edit" id="mac_address_edit" class="form-control" placeholder="Ex: 11:AD:23:00:12:34">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label"> Owner</label>
                    <div class="col-md-10">
                        
                        <input type="text" readonly name="owner_edit" id="owner_edit" class="form-control" placeholder="Ex: Technology">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="submit" id="btn_save" class="btn btn-primary" value="Update equipment">
            </div>
        </div>
        </div>
    </div>
</form>
<!--END MODAL ADD-->