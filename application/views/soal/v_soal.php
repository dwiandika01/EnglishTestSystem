<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_soal"><i class="fas fa-plus fa-sm"></i> Tambah Data Soal</button>

    <table class="table table-bordered">
    
    <tr>
            <th>NO</th>
            <th style="text-align:center">soal</th>
            <th style="text-align:center">jawaban a</th>
            <th style="text-align:center">jawaban b</th>
            <th style="text-align:center">jawaban c</th>
            <th style="text-align:center">jawaban d</th>
            <th style="text-align:center">jawaban Benar</th>
            <th style="text-align:center">gambar</th>
            <th style="text-align:center">quiz</th>
            <th style="text-align:center" colspan="3">AKSI</th>
        </tr>

        <?php 
        $no = 1;
        foreach($soal as $sl) : ?>

        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $sl->soal ?></td>
            <td><?php echo $sl->a ?></td>
            <td><?php echo $sl->b ?></td>
            <td><?php echo $sl->c ?></td>
            <td><?php echo $sl->d ?></td>
            <td style="text-align:center"><?php echo $sl->j_benar ?></td>
            <td style="text-align:center"><?php echo $sl->gambar ?></td>
            <td style="text-align:center"><?php echo $sl->quiz ?></td>
            <td style="text-align:center"><?php echo anchor('soal/edit/' .$sl->id_soal, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
            <td style="text-align:center"><?php echo anchor('soal/hapus/' .$sl->id_soal, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
        </tr>

        <?php endforeach; ?>
    
    </table>

    <!-- Modal -->
    <div class="modal fade" id="tambah_soal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Siswa Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url().'soal/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label>Soal</label>
                        <br><textarea name="soal" rows="3" cols="50"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Jawaban a</label>
                        <br><textarea name="a" rows="3" cols="50"></textarea>
                    </div>   

                    <div class="form-group">
                        <label>Jawaban b</label>
                        <br><textarea name="b" rows="3" cols="50"></textarea>
                    </div>   

                    <div class="form-group">
                        <label>Jawaban c</label>
                        <br><textarea name="c" rows="3" cols="50"></textarea>
                    </div>   

                    <div class="form-group">
                        <label>Jawaban d</label>
                        <br><textarea name="d" rows="3" cols="50"></textarea>
                    </div>   

                    <div class="form-group">
                        <label>Jawaban_benar</label>
                        <select name="j_benar" id="" class="form-control">
                            <option value="">-PILIH-</option>
                            <option value="a">a</option>
                            <option value="b">b</option>
                            <option value="c">c</option>
                            <option value="d">d</option>
                        </select>
                    </div>   

                    <div class="form-group">
                        <label>Gambar</label><br>
                        <input type="file" name="gambar">
                    </div>   

                    <div class="form-group">
                        <label>Quiz</label>
                        <select name="quiz" id="" class="form-control">
                            <option value="">Pilih Quiz</option>
                            <option value="1">Quiz ke 1</option>
                            <option value="2">Quiz ke 2</option>
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
