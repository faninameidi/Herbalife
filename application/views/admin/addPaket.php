<div class="right_col" role="main">


  <div class="row">


    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><span class="fa fa-list"></span> Add Paket Produk </h2>
          <div class="clearfix"></div>
        </div>
        <br>
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <?php echo form_open_multipart("Paket/simpanPaket"); ?>
          <div class="form-group row">
            <label for="nama_paket" class="col-sm-3 col-form-label"> Nama Paket </label>
            <div class="col-sm-8">
              <input type="text" name="nama_paket" class="form-control" placeholder="Nama Paket" value="<?php echo set_value('nama_paket'); ?>" >
              <?php echo  form_error('nama_paket') ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="manfaat_paket" class="col-sm-3 col-form-label"> Manfaat Paket </label>
            <div class="col-sm-8">
              <input type="text" name="manfaat_paket" class="form-control" placeholder="Manfaat paket" value="<?php echo set_value('manfaat_paket'); ?>" >
              <?php echo  form_error('manfaat_paket') ?>
            </div>
          </div>

           <div class="form-group row">
            <label for="keterangan_paket" class="col-sm-3 col-form-label"> Keterangan Paket </label>
            <div class="col-sm-8">
              <input type="text" name="keterangan_paket" class="form-control" placeholder="keterangan paket" value="<?php echo set_value('keterangan_paket'); ?>" >
              <?php echo  form_error('keterangan_paket') ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="image" class="col-sm-3 col-form-label"> Image </label>
            <div class="col-sm-8">
              <input type="file" name="image" class="form-control" placeholder="image" value="<?php echo set_value('image'); ?>" >
              <?php echo  form_error('image') ?>
            </div>
          </div>

          <center><button type="submit" class="btn btn-primary" name="submit"><span class="oi oi-person"></span> TAMBAH </button></center>
        </div>
        <?php echo form_close(); ?>
        <div class="col-sm-1"></div>
        <!-- </form> -->

        <div class="clearfix"></div>


      </div>
    </div>

  </div>
</div>