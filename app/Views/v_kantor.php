<div class="panel panel-default">
    <div class="panel-heading">
        <a href="<?= base_url('kantor/add') ?>" class="btn btn-primary">Add</a>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kantor</th>
                        <th>Alamat</th>
                        <th>No. Telpon</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                        <?php $no=1; foreach ($kantor as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_kantor'] ?></td>
                            <td><?= $value['alamat'] ?></td>
                            <td><?= $value['no_telp'] ?></td>
                            <td><img src="<?= base_url('foto/'.$value['foto']) ?>" width=60px></td>
                            <td class="text-center">
                                <a href="<?= base_url('kantor/edit/'.$value['id_kantor']) ?>" class="btn btn-warning">Edit</a>
                                <a href="<?= base_url('kantor/delete/'.$value['id_kantor']) ?>" onclick="return confirm('Do you want to delete?')" class="btn btn-danger">Deletes</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>