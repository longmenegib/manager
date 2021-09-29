<!-- MODAL ADD -->
 
<div class="modal fade" id="Modal_List_Report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $org[0]['orgName'] ?>'s Attendance list: <?= date('d-m-Y') ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            Download option:
                            <table id="examp" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($list_reports as $equipment) {
                                    ?>
                                    <tr>
                                        <td><?= $equipment['firstname'] ?> <?= $equipment['lastname'] ?></td>
                                        <td><?= $equipment['start'] ?></td>
                                        <td><?= $equipment['end'] ?></td>
                                        <td><?= $equipment['status'] ?></td>
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
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>
<!--END MODAL ADD-->

<script>
        //get data for delete record
        $(document).on('click','.equipment_delete',function(){
            var equipmentid = $(this).data('equipmentid');
            var org_name = $(this).data('org_name');

            $('#Modal_Delete_Equipment').modal('show');
            $('[name="equipment_id_delete"]').val(equipmentid);
            $('[name="org_name"]').val(org_name);
        });
</script>

<script>
  $(function () {
    $("#examp").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#examp_wrapper .col-md-6:eq(0)');
    $('#examp2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>