<div class="container-fluid">

        <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i> Tambah Data Siswa</button>
        <div class="dropdown">
            <button class="btn btn-sm btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-download"> Export</i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?php echo base_url('siswa/excel') ?>">Semua</a>
                <a class="dropdown-item" href="<?php echo base_url('siswa/excelA') ?>">Kelas 8 - A</a>
                <a class="dropdown-item" href="<?php echo base_url('siswa/excelB') ?>">Kelas 8 - B</a>
                <a class="dropdown-item" href="<?php echo base_url('siswa/excelC') ?>">Kelas 8 - C</a>
            </div>
        </div><br>
        <form action="<?php echo base_url().'siswa/sort'; ?>" method="post" enctype="multipart/form-data">
            <?php
                if($keyword == "8 - C")
                {
                    echo '<select name="keyword" id="" class="btn btn-sm btn-primary mb-3 bg-dark">';
                    echo '<option value="8 - C">Kelas 8 - C</option>';
                    echo '<option value="">SEMUA</option>';
                    echo '<option value="8 - A">Kelas 8 - A</option>';
                    echo '<option value="8 - B">Kelas 8 - B</option>';
                    echo '</select>';

                    echo '<button type="submit" class="btn btn-sm btn-primary mb-3">Urutkan</button>';
                   
                }elseif($keyword == "8 - A")
                {
                    echo '<select name="keyword" id="" class="btn btn-sm btn-primary mb-3 bg-dark">';
                    echo '<option value="8 - A">Kelas 8 - A</option>';
                    echo '<option value="">SEMUA</option>';
                    echo '<option value="8 - B">Kelas 8 - B</option>';
                    echo '<option value="8 - C">Kelas 8 - C</option>';
                    echo '</select>';

                    echo '<button type="submit" class="btn btn-sm btn-primary mb-3">Urutkan</button>';
                }elseif($keyword == "8 - B")
                {
                    echo '<select name="keyword" id="" class="btn btn-sm btn-primary mb-3 bg-dark">';
                    echo '<option value="8 - B">Kelas 8 - B</option>';
                    echo '<option value="">SEMUA</option>';
                    echo '<option value="8 - A">Kelas 8 - A</option>';
                    echo '<option value="8 - C">Kelas 8 - C</option>';
                    echo '</select>';

                    echo '<button type="submit" class="btn btn-sm btn-primary mb-3">Urutkan</button>';
                }else{
                    echo '<select name="keyword" id="" class="btn btn-sm btn-primary mb-3 bg-dark">';
                    echo '<option value="">SEMUA</option>';
                    echo '<option value="8 - A">Kelas 8 - A</option>';
                    echo '<option value="8 - B">Kelas 8 - B</option>';
                    echo '<option value="8 - C">Kelas 8 - C</option>';
                    echo '</select>';

                    echo '<button type="submit" class="btn btn-sm btn-primary mb-3">Urutkan</button>';
                }
            ?>
        </form>

    

    <table class="table table-bordered">
    
    <tr>
            <th>NO</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Foto</th>
            <th>Kelas</th>
            <th>Jenis Kelamin</th>
            <th>Nilai Quiz 1</th>
            <th>Nilai Quiz 2</th>
            <th>Status Quiz 1  <?php echo anchor('siswa/setStatus1/' , '<div class="btn btn-primary btn-sm"><i class="fa fa-eraser"></i></div>') ?></th>
            <th>Status Quiz 2  <?php echo anchor('siswa/setStatus2/' , '<div class="btn btn-primary btn-sm"><i class="fa fa-eraser"></i></div>') ?></th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php 
        $no = 1;
        foreach($siswa as $sis) : ?>

        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $sis->NIS ?></td>
            <td><?php echo $sis->nama_siswa ?></td>
            <td><?php echo $sis->foto ?></td>
            <td><?php echo $sis->kelas ?></td>
            <td><?php
            if($sis->jk == '0')
            {
                echo "Perempuan";
            }else{
                echo "Laki - Laki";
            } ?></td>
            <td><?php echo $sis->n_quiz1 ?></td>
            <td><?php echo $sis->n_quiz2 ?></td>
            <td><?php echo $sis->s_quiz1 ?></td>
            <td><?php echo $sis->s_quiz2 ?></td>
            <td><?php echo anchor('siswa/edit/' .$sis->NIS, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
            <td><?php echo anchor('siswa/hapus/' .$sis->NIS, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>

        <?php endforeach; ?>
    
    </table>

    <!-- Modal -->
    <div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Siswa Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url().'siswa/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" name="NIS" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nama_siswa" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>   

                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="kelas" id="" class="form-control">
                            <option value="">Pilih Kelas</option>
                            <option value="8 - A">Kelas 8 - A</option>
                            <option value="8 - B">Kelas 8 - B</option>
                            <option value="8 - C">Kelas 8 - C</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jk" id="" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="1">Laki - Laki</option>
                            <option value="0">Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
             </form>
        </div>
    </div>
</div>