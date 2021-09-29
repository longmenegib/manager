<!-- MODAL ADD -->
 
    <div class="modal fade" id="Modal_List_Equipment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <h3 class="card-title"><?= $org[0]['orgName'] ?>'s Equipments</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mac address</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($list_equipment as $equipment) {
                                    ?>
                                    <tr>
                                        <td><?= $equipment['firstname'] ?> <?= $equipment['lastname'] ?></td>
                                        <td><?= $equipment['macaddress'] ?></td>
                                        <td><?= $equipment['equipmenttype'] ?></td>
                                        <td>
                                        <a href="javascript:void(0);" 
                                                class="btn btn-info btn-sm equipment_edit"
                                                data-equipmentid="<?= $equipment['equipmentid'] ?>"
                                                data-macaddress="<?= $equipment['macaddress'] ?>" 
                                                data-type="<?= $equipment['equipmenttype'] ?>" 
                                                data-owner="<?php echo $equipment['firstname'].' '.$equipment['lastname'] ?>"
                                                data-org_name="<?= $equipment['orgName'] ?>">Edit</a>

                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm equipment_delete" 
                                        data-equipmentid="<?= $equipment['equipmentid'] ?>" 
                                        data-org_name="<?= $equipment['orgName'] ?>"
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
            </div>
            <div class="modal-footer">
            </div>
        </div>
        </div>
    </div>

    <?php include('edit_equipment.php')?>
    <?php include('delete_equipment.php')?>
<!--END MODAL ADD-->

<script>
    //get data for update record
    $(document).on('click','.equipment_edit',function(){
            var equipmentid = $(this).data('equipmentid');
            var type = $(this).data('type');
            var owner = $(this).data('owner');
            var org_name = $(this).data('org_name');
            var mac_address = $(this).data('macaddress');
            
             
            $('#Modal_Edit_Equipment').modal('show');
            $('[name="org_name"]').val(org_name);
            $('[name="equipmentid"]').val(equipmentid);
            $('[name="type_edit"]').val(type);
            $('[name="mac_address_edit"]').val(mac_address);
            $('[name="owner_edit"]').val(owner);
        });

        //get data for delete record
        $(document).on('click','.equipment_delete',function(){
            var equipmentid = $(this).data('equipmentid');
            var org_name = $(this).data('org_name');

            $('#Modal_Delete_Equipment').modal('show');
            $('[name="equipment_id_delete"]').val(equipmentid);
            $('[name="org_name"]').val(org_name);
        });
</script>