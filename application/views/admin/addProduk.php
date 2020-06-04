<div class="right_col" role="main">


  <div class="row">


    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2><span class="fa fa-list"></span> Add Produk </h2>
          <div class="clearfix"></div>
        </div>
        <br>
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <?php echo form_open_multipart("Produk/simpanProduk"); ?>
          <div class="form-group row">
            <label for="nama_produk" class="col-sm-3 col-form-label"> Nama Produk </label>
            <div class="col-sm-8">
              <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" value="<?php echo set_value('nama_produk'); ?>" >
              <?php echo  form_error('nama_produk') ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="kode_produk" class="col-sm-3 col-form-label"> Kode Produk </label>
            <div class="col-sm-8">
              <input type="text" name="kode_produk" class="form-control" placeholder="Kode Produk" value="<?php echo set_value('kode_produk'); ?>" >
              <?php echo  form_error('kode_produk') ?>
            </div>
          </div>
    
          <div class="form-group row">
            <label for="keterangan" class="col-sm-3 col-form-label"> Keterangan </label>
            <div class="col-sm-8">
              <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo set_value('keterangan'); ?>" >
              <?php echo  form_error('keterangan') ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="image" class="col-sm-3 col-form-label"> Image </label>
            <div class="col-sm-8">
              <input type="file" name="image" class="form-control" placeholder="image" value="<?php echo set_value('image'); ?>" >
              <?php echo  form_error('image') ?>
            </div>
          </div>
          <!-- 
            <a href="<?php echo base_url()?>Produk"><button type="button" class="btn btn-danger">TAMBAH</button></a> -->
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