<div class="container-fluid">
    <h3 class="fas fa-edit">EDIT DATA SISWA</h3>

    <?php foreach($siswa as $sis) : ?>

        <form  method="post" action="<?php echo base_url().'siswa/update' ?>">
        
            <div class="form-group">
                <label>NIS</label>
                <input type="text" value="<?php echo $sis->NIS ?>" name="NIS" class="form-control" placeholder="<?php echo $sis->NIS ?>" readonly>
                <input type="hidden" name="foto" class="form-control" value="<?php echo $sis->foto ?>" placeholder="<?php echo $sis->foto ?>">
            </div>

            <div class="form-group">
               <label>Nama Siswa</label>
                <input type="text" value="<?php echo $sis->nama_siswa ?>" name="nama_siswa" class="form-control" placeholder="<?php echo $sis->nama_siswa ?>">
            </div> 

             <div class="form-group">
                 <label>Kelas</label>
                 <select name="kelas" id="" class="form-control">
                    <option value="<?php echo $sis->kelas ?>">Kelas <?php echo $sis->kelas ?></option>
                    <option value="8 - A">Kelas 8 - A</option>
                    <option value="8 - B">Kelas 8 - B</option>
                    <option value="8 - C">Kelas 8 - C</option>
                 </select>
             </div>

            <div class="form-group">
               <label>Jenis Kelamin</label>
                  <select name="jk" id="" class="form-control">
                     <option value="<?php echo $sis->jk ?>"><?php 
                        if($sis->jk == '1')
                        {
                            echo "Laki - Laki";
                        }else{
                            echo "Perempuan"; 
                        } ?></option>
                     <option value="1">Laki - Laki</option>
                     <option value="0">Perempuan</option>
                 </select>
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>

        </form>

    <?php endforeach; ?>
    
</div>