<div class="container-fluid">
    <h3 class="fas fa-edit">EDIT DATA SOAL</h3>

    <?php foreach($soal as $sl) : ?>

        <form  method="post" action="<?php echo base_url().'soal/update' ?>">
        
            <div class="form-group">
                <br>
                <label>Soal</label>
                <br><textarea name="soal" rows="3" cols="164" value="<?php echo $sl->soal ?>" placeholder="<?php echo $sl->soal ?>"></textarea>
                <input type="hidden" name="id_soal" class="form-control" value="<?php echo $sl->id_soal ?>">
            </div>

            <div class="form-group">
                <label>Jawaban a</label>
                <br><textarea name="a" value="<?php echo $sl->a ?>" placeholder="<?php echo $sl->a ?>" rows="3" cols="50"></textarea>
            </div>   

            <div class="form-group">
                <label>Jawaban b</label>
                <br><textarea name="b" value="<?php echo $sl->b ?>" placeholder="<?php echo $sl->b ?>" rows="3" cols="50"></textarea>
            </div>   

            <div class="form-group">
                <label>Jawaban c</label>
                <br><textarea name="c" value="<?php echo $sl->c ?>" placeholder="<?php echo $sl->c ?>" rows="3" cols="50"></textarea>
            </div>   

            <div class="form-group">
                <label>Jawaban d</label>
                <br><textarea name="d" value="<?php echo $sl->d ?>" placeholder="<?php echo $sl->d ?>" rows="3" cols="50"></textarea>
            </div>

            <div class="form-group">
                <label>Jawaban_benar</label>
                <select value="<?php echo $sl->j_benar ?>" name="j_benar" id="" class="form-control">
                <option><?php echo $sl->j_benar ?></option>
                <?php if($sl->j_benar == "a")
                    {
                        echo '
                        <option value="b">b</option>
                        <option value="c">c</option>
                        <option value="d">d</option>
                        ';
                    }elseif($sl->j_benar == "b"){
                        echo '
                        <option value="a">b</option>
                        <option value="c">c</option>
                        <option value="d">d</option>
                        ';
                    }elseif($sl->j_benar == "c"){
                        echo '
                        <option value="a">b</option>
                        <option value="b">c</option>
                        <option value="d">d</option>
                        ';
                    }else{
                        echo '
                        <option value="a">b</option>
                        <option value="b">c</option>
                        <option value="c">d</option>
                        ';
                    } ?>
                </select>
            </div>   

            <div class="form-group">
                <label>Gambar</label><br>
                <input type="file" value="<?php echo $sl->gambar ?>" name="gambar">
            </div>
            
            <div class="form-group">
                <label>Quiz</label>
                <select name="quiz" value="<?php echo $sl->quiz ?>" id="" class="form-control">
                    <option><?php echo $sl->quiz ?></option>
                    <?php if($sl->quiz == "1")
                    {
                        echo '
                        <option value="2">Quiz ke 2</option>
                        ';
                    }else{
                        echo '
                        <option value="1">Quiz ke 1</option>
                        ';
                    } ?>
                </select>
            </div> 

            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>

        </form>

    <?php endforeach; ?>
    
</div>