<div class="right_col" role="main">


  <div class="row">


    <div class=" col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h3>DATA  HASIL KONSUMEN DAN REKOMENDASI PEMILIHAN PRODUK</h3>

          <div class="clearfix"></div>
        </div>
        <br>

        <?php if ($this->session->flashdata('success')) {?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php  } elseif($this->session->flashdata('hapus')) {?>
          <!-- validation message to display after form is submitted -->
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('hapus'); ?> 
            </div>
          <?php } elseif($this->session->flashdata('error')) {?>
            <!-- validation message to display after form is submitted -->
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('error'); ?> 
              </div>
            <?php } ?>
            <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr class="bg-group">
                  <th width="5px">ID Output</th>
                  <th>Usia</th>
                  <th>Lemak Tubuh</th>
                  <th>Massa Tulang</th>
                  <th>Lemak Perut</th>
                  <th>Shake</th>
                  <th>Aloe</th>
                  <th>Thermo</th>
                  <th>Nrg Tea</th>
                  <th>PPP</th>
                  <th>Mixed Fiber</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $i=1;
                foreach ($getData as $key) 
                {
                   //$harga = number_format($key->harga,0,',','.');

                 ?>
                 <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $key->usia;?></td>
                  <td><?php echo $key->lemak_tubuh;?></td>
                  <td><?php echo $key->massa_tulang;?></td>
                  <td><?php echo $key->lemak_perut;?></td>
                  <td><?php echo $key->shake;?></td>
                  <td><?php echo $key->aloe;?></td>
                  <td><?php echo $key->thermo;?></td>
                  <td><?php echo $key->nrg;?></td>
                  <td><?php echo $key->ppp;?></td>
                  <td><?php echo $key->mixed_fiber;?></td>

                  </td>
                </tr>
                <?php
                $i++;
              }
              ?>
            </tbody>
          </table>
        </div>

          <div class="clearfix"></div>


        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets_datatables\DataTables\assets_ajax\js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets_datatables\DataTables\assets_ajax\js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets_datatables\DataTables\assets_ajax\js/jquery.dataTables.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script>