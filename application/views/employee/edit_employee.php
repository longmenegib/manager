 <!-- MODAL ADD -->
 <form method='post' action="<?= base_url('edit-employee') ?>" autocomplete="off">
            <div class="modal fade" id="Modal_Edit_Emp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-10">
                              <input type="hidden" name="org_id" id="org_id" class="form-control" placeholder="id org" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                              <input type="hidden" name="employee_id" id="employee_id" class="form-control" placeholder="org name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                              <input type="hidden" name="org_name" id="org_name" class="form-control" placeholder="id org" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">First name</label>
                            <div class="col-md-10">
                              <input type="text" name="firstname_edit" id="firstname_edit" class="form-control" placeholder="First name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Last name</label>
                            <div class="col-md-10">
                              <input type="text" name="lastname_edit" id="lastname_edit" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Email</label>
                            <div class="col-md-10">
                              <input type="text" name="email_edit" id="email_edit" class="form-control" placeholder="Ex: example@gmail.com">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Title</label>
                            <div class="col-md-10">
                              <input type="text" name="title_edit" id="title_edit" class="form-control" placeholder="Ex: Software engineer">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Department</label>
                            <div class="col-md-10">
                              <input type="text" name="department_edit" id="department_edit" class="form-control" placeholder="Ex: Software Engineering">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" id="btn_save" class="btn btn-primary" value='Update employee'>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->