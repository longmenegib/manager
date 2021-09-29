  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Organization</h1>
          </div>
          <div class="col-sm-6">
            <div class="float-right"><a href="javascript:void(0);"
              class="btn btn-success" data-toggle="modal" data-target="#Modal_Add_Org">
                <span class="fa fa-plus"></span> Add new organisation</a>
            </div>
                
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <?php
        include("statistic.php");
    ?>
   

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Organizations</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Domain</th>
                    <th>Token</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach ($list_organization as $org) {
                        ?>
                        <tr>
                            <td><?= $org['orgName'] ?></td>
                            <td><?= $org['orgLocation'] ?></td>
                            <td><?= $org['orgDomain'] ?></td>
                            <td><?= $org['token'] ?></td>
                            <td>
                            <a href="javascript:void(0);" 
                                    class="btn btn-info btn-md org_edit"
                                    data-org_id="<?= $org['orgId'] ?>" 
                                    data-org_name="<?= $org['orgName'] ?>" data-org_location="<?= $org['orgLocation'] ?>" 
                                    data-org_domain="<?= $org['orgDomain'] ?>">Edit</a>

                            <a href="javascript:void(0);" class="btn btn-danger btn-md org_delete" 
                            data-org_id="<?= $org['orgId'] ?>" 
                            data-org_name="<?= $org['orgName'] ?>"
                            >Delete</a>

                            <a href='<?= base_url("dashboard/org/$org[orgName]")?>'' class="btn btn-success btn-md" >
                                View employees
                            </a>
                            </td>
                        </tr>
                  <?php
                        }
                      ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <?php include('edit_org.php')?>
    <?php include('delete_org.php')?>
    <?php include('add_org.php');?> 

    <script>
        //get data for update record
        $(document).on('click','.org_edit',function(){
            var org_id = $(this).data('org_id');
            var org_name = $(this).data('org_name');
            var org_location = $(this).data('org_location');
            var org_domain        = $(this).data('org_domain');
             
            $('#Modal_Edit_Org').modal('show');
            $('[name="org_id"]').val(org_id);
            $('[name="org_name_edit"]').val(org_name);
            $('[name="org_location_edit"]').val(org_location);
            $('[name="org_domain_edit"]').val(org_domain);
        });

        //get data for delete record
        $(document).on('click','.org_delete',function(){
            var org_id = $(this).data('org_id');
            var org_name = $(this).data('org_name');

            var html = '';

            html += 'Delete '+org_name;

            $('#delete').html(html);

            $('#Modal_Delete_Org').modal('show');
            $('[name="org_id_delete"]').val(org_id);
        });
    </script>