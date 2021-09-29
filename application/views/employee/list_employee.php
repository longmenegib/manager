  
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $org[0]['orgName'] ?></h1>
          </div>
          <div class="col-sm-6">
            <div class="float-right"><a href="javascript:void(0);"
              class="btn btn-success" data-toggle="modal" data-target="#Modal_Add_Emp">
                <span class="fa fa-plus"></span> Add new employee</a>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <?php
        include("statistic.php");
    ?>

<section style="margin: 10px 0px 20px 5px">
  <div class="container-fluid">
    <h4>Manage equipments</h4>
    <div class='row align-items-center'>
      <div class=" col-xs-6" style="margin-right:10px">
        <div class=""><a href="javascript:void(0);"
          class="btn btn-info" data-toggle="modal" data-target="#Modal_List_Equipment">
           View employees equipment</a>
        </div>
      </div>
      <div class=" col-xs-6">
        <div class=""><a href="javascript:void(0);"
          class="btn btn-success" data-toggle="modal" data-target="#Modal_Add_Equipment">
            <span class="fa fa-plus"></span>Add equipment</a>
        </div>
      </div>

      <div class="col-xs-6" style="margin-left: 50px;">
        <div class=""><a href="javascript:void(0);" style=" ;height:50px"
          class="btn btn-secondary d-flex align-items-center" data-toggle="modal" data-target="#Modal_List_Report">
           VIEW ATTENDANCE</a>
        </div>
      </div>
    </div>
  </div>
  
</section>
   
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?= $org[0]['orgName'] ?>'s employees</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Title</th>
                    <th>Department</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                        foreach ($list_employee as $employee) {
                        ?>
                        <tr>
                            <td><?= $employee['firstname'] ?></td>
                            <td><?= $employee['lastname'] ?></td>
                            <td><?= $employee['email'] ?></td>
                            <td><?= $employee['title'] ?></td>
                            <td><?= $employee['department'] ?></td>
                          
                            <td>
                            <a href="javascript:void(0);" 
                                    class="btn btn-info btn-sm employee_edit"
                                    data-org_id="<?= $employee['orgId'] ?>" 
                                    data-employee_id="<?= $employee['employeeid'] ?>"
                                    data-firstname="<?= $employee['firstname'] ?>" 
                                    data-lastname="<?= $employee['lastname'] ?>" data-email="<?= $employee['email'] ?>" 
                                    data-title="<?= $employee['title'] ?>"
                                    data-department="<?= $employee['department'] ?>"
                                    data-org_name="<?= $employee['orgName'] ?>">Edit</a>

                            <a href="javascript:void(0);" class="btn btn-danger btn-sm employee_delete" 
                            data-employee_id="<?= $employee['employeeid'] ?>" 
                            data-firstname="<?= $employee['firstname'] ?>"
                            data-lastname="<?= $employee['lastname'] ?>"
                            data-org_name="<?= $employee['orgName'] ?>"
                            >Delete</a>
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
    
    <?php include('add_employee.php')?>
    <?php include('edit_employee.php')?>
    <?php include('delete_employee.php')?>
    <?php include('equipments/list_equipment.php')?>
    <?php include('equipments/add_equipment.php')?>
    <?php include('report/list_reports.php')?>
 

    <script>
        //get data for update record
        $(document).on('click','.employee_edit',function(){
            var org_id = $(this).data('org_id');
            var org_name = $(this).data('org_name');
            var employee_id = $(this).data('employee_id');
            var firstname = $(this).data('firstname');
            var lastname = $(this).data('lastname');
            var email= $(this).data('email');
            var title= $(this).data('title');
            var department = $(this).data('department');
             
            $('#Modal_Edit_Emp').modal('show');
            $('[name="org_id"]').val(org_id);
            $('[name="org_name"]').val(org_name);
            $('[name="employee_id"]').val(employee_id);
            $('[name="firstname_edit"]').val(firstname);
            $('[name="lastname_edit"]').val(lastname);
            $('[name="email_edit"]').val(email);
            $('[name="title_edit"]').val(title);
            $('[name="department_edit"]').val(department);
        });

        //get data for delete record
        $(document).on('click','.employee_delete',function(){
            var employee_id = $(this).data('employee_id');
            var firstname = $(this).data('firstname');
            var lastname = $(this).data('lastname');
            var org_id = $(this).data('org_id');
            var org_name = $(this).data('org_name');

            var html = '';

            html += 'Delete '+firstname+ ' '+lastname+' ';
           

            $('#delete').html(html);

            $('#Modal_Delete_Employee').modal('show');
            $('[name="employee_id_delete"]').val(employee_id);
            $('[name="org_name"]').val(org_name);
        });

        

    </script>