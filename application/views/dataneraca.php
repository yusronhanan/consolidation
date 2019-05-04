
<?php
$nbuku_induk_aset = $nb_induk->kas_n1 + $nb_induk->piutang_n1 + $nb_induk->persediaan_n1 + $nb_induk->perlengkapan_n1 + $nb_induk->bangunan_n1 + $nb_induk->tanah_n1;

$nbuku_anak_aset = $nb_anak->kas_n1 + $nb_anak->piutang_n1 + $nb_anak->persediaan_n1 + $nb_anak->perlengkapan_n1 + $nb_anak->bangunan_n1 + $nb_anak->tanah_n1;

$nbuku_induk_hutang = $nb_induk->hutang_dagang_n1 + $nb_induk->hutang_obligasi_n1 + $nb_induk->saham_n1 + $nb_induk->agio_saham_n1 + $nb_induk->laba_ditahan_n1;

$nbuku_anak_hutang = $nb_anak->hutang_dagang_n1 + $nb_anak->hutang_obligasi_n1 + $nb_anak->saham_n1 + $nb_anak->agio_saham_n1 + $nb_anak->laba_ditahan_n1;

if($nbuku_induk_aset != $nbuku_induk_hutang && $nbuku_anak_aset != $nbuku_anak_hutang){
?>
 <script type="text/javascript">
    swal({
  type: 'error',
  title: 'Oops...',
  text: 'Total Aset dan Total Hutang & Ekuitas dari <?php echo $d_ak->pt_induk." dan ".$d_ak->pt_anak; ?> tidak sama, harap diubah !',
  // footer: '<a href>Why do I have this issue?</a>',
})
  </script>
<?php 
} else if($nbuku_induk_aset != $nbuku_induk_hutang) {
?>
 <script type="text/javascript">
    swal({
  type: 'error',
  title: 'Oops...',
  text: 'Total Aset dan Total Hutang & Ekuitas dari <?php echo $d_ak->pt_induk; ?> tidak sama, harap diubah !',
  // footer: '<a href>Why do I have this issue?</a>',
})
  </script>
<?php 
} else if($nbuku_anak_aset != $nbuku_anak_hutang){
?>
 <script type="text/javascript">
    swal({
  type: 'error',
  title: 'Oops...',
  text: 'Total Aset dan Total Hutang & Ekuitas dari <?php echo $d_ak->pt_anak; ?> tidak sama, harap diubah !',
  // footer: '<a href>Why do I have this issue?</a>',
})
  </script>
<?php 
}
?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>
        
        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Neraca Sesaat Sebelum Konsolidasi</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr style="text-align: center">
                    <th rowspan="2"></th>
                    <th colspan="2"><?php if(!empty($nb_induk->tipe_pt)){ 
                      echo $d_ak->pt_induk;
                    }else{ echo "-";} ?></th>
                    <th colspan="2" ><?php if(!empty($nb_induk->tipe_pt)){ 
                      echo $d_ak->pt_anak;
                    }else{ echo "-";} ?></th>
                  </tr>
                  <tr>
                    <th>Nilai Buku
                      <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-xs fas fa-edit" data-toggle="modal" data-target="#editNeraca1"></button>

  <!-- Modal -->
  <div class="modal fade" id="editNeraca1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?php echo base_url() ?>Input/editNeraca" method="post">
    <input type="hidden" name="id_neraca1" value="<?php echo $nb_induk->id_neraca1;?>">
    <input type="hidden" name="tipe_nilai" value="<?php echo $nb_anak->tipe_nilai;?>">

    <div class="form-group">
      <label class="control-label col-sm-4" for="kas_n1">Kas:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="kas_n1" placeholder="Enter Kas" name="kas_n1" value="<?php if(!empty($nb_induk->kas_n1)){ echo $nb_induk->kas_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="piutang_n1">Piutang - net:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="piutang_n1" placeholder="Enter Piutang - net" name="piutang_n1" value="<?php if(!empty($nb_induk->piutang_n1)){ echo $nb_induk->piutang_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="persediaan_n1">Persediaan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="persediaan_n1" placeholder="Enter Persediaan" name="persediaan_n1" value="<?php if(!empty($nb_induk->persediaan_n1)){ echo $nb_induk->persediaan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="perlengkapan_n1">Perlengkapan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="perlengkapan_n1" placeholder="Enter Perlengkapan" name="perlengkapan_n1" value="<?php if(!empty($nb_induk->perlengkapan_n1)){ echo $nb_induk->perlengkapan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="bangunan_n1">Bangunan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="bangunan_n1" placeholder="Enter Bangunan" name="bangunan_n1" value="<?php if(!empty($nb_induk->bangunan_n1)){ echo $nb_induk->bangunan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="tanah_n1">Tanah:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="tanah_n1" placeholder="Enter Tanah" name="tanah_n1" value="<?php if(!empty($nb_induk->tanah_n1)){ echo $nb_induk->tanah_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class="control-label col-sm-4" for="hutang_dagang_n1">Hutang Dagang:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="hutang_dagang_n1" placeholder="Enter Hutang Dagang" name="hutang_dagang_n1" value="<?php if(!empty($nb_induk->hutang_dagang_n1)){ echo $nb_induk->hutang_dagang_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="hutang_obligasi_n1">Hutang Obligasi:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="hutang_obligasi_n1" placeholder="Enter Hutang Obligasi" name="hutang_obligasi_n1" value="<?php if(!empty($nb_induk->hutang_obligasi_n1)){ echo $nb_induk->hutang_obligasi_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="saham_n1">Saham:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="saham_n1" placeholder="Enter Saham" name="saham_n1" value="<?php if(!empty($nb_induk->saham_n1)){ echo $nb_induk->saham_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="agio_saham_n1">Agio Saham:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="agio_saham_n1" placeholder="Enter Agio Saham" name="agio_saham_n1" value="<?php if(!empty($nb_induk->agio_saham_n1)){ echo $nb_induk->agio_saham_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="laba_ditahan_n1">Laba Ditahan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="laba_ditahan_n1" placeholder="Enter Laba Ditahan" name="laba_ditahan_n1" value="<?php if(!empty($nb_induk->laba_ditahan_n1)){ echo $nb_induk->laba_ditahan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info">Save</button>
      </div>
    </div>
  </form>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- end modal -->
                    </th>
                    <th>Nilai Pasar
         <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-xs fas fa-edit" data-toggle="modal" data-target="#editNeraca2"></button>

  <!-- Modal -->
  <div class="modal fade" id="editNeraca2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?php echo base_url() ?>Input/editNeraca" method="post">
    <input type="hidden" name="id_neraca1" value="<?php echo $np_induk->id_neraca1;?>">
    <input type="hidden" name="tipe_nilai" value="<?php echo $np_anak->tipe_nilai;?>">

    <div class="form-group">
      <label class="control-label col-sm-4" for="piutang_n1">Piutang - net:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="piutang_n1" placeholder="Enter Piutang - net" name="piutang_n1" value="<?php if(!empty($np_induk->piutang_n1)){ echo $np_induk->piutang_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="persediaan_n1">Persediaan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="persediaan_n1" placeholder="Enter Persediaan" name="persediaan_n1" value="<?php if(!empty($np_induk->persediaan_n1)){ echo $np_induk->persediaan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="perlengkapan_n1">Perlengkapan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="perlengkapan_n1" placeholder="Enter Perlengkapan" name="perlengkapan_n1" value="<?php if(!empty($np_induk->perlengkapan_n1)){ echo $np_induk->perlengkapan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="bangunan_n1">Bangunan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="bangunan_n1" placeholder="Enter Bangunan" name="bangunan_n1" value="<?php if(!empty($np_induk->bangunan_n1)){ echo $np_induk->bangunan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="tanah_n1">Tanah:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="tanah_n1" placeholder="Enter Tanah" name="tanah_n1" value="<?php if(!empty($np_induk->tanah_n1)){ echo $np_induk->tanah_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class="control-label col-sm-4" for="hutang_dagang_n1">Hutang Dagang:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="hutang_dagang_n1" placeholder="Enter Hutang Dagang" name="hutang_dagang_n1" value="<?php if(!empty($np_induk->hutang_dagang_n1)){ echo $np_induk->hutang_dagang_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="hutang_obligasi_n1">Hutang Obligasi:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="hutang_obligasi_n1" placeholder="Enter Hutang Obligasi" name="hutang_obligasi_n1" value="<?php if(!empty($np_induk->hutang_obligasi_n1)){ echo $np_induk->hutang_obligasi_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info">Save</button>
      </div>
    </div>
  </form>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- end modal -->
                    </th>
                    <th>Nilai Buku
                  <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-xs fas fa-edit" data-toggle="modal" data-target="#editNeraca3"></button>

  <!-- Modal -->
  <div class="modal fade" id="editNeraca3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?php echo base_url() ?>Input/editNeraca" method="post">
    <input type="hidden" name="id_neraca1" value="<?php echo $nb_anak->id_neraca1;?>">
    <input type="hidden" name="tipe_nilai" value="<?php echo $nb_anak->tipe_nilai;?>">

    <div class="form-group">
      <label class="control-label col-sm-4" for="kas_n1">Kas:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="kas_n1" placeholder="Enter Kas" name="kas_n1" value="<?php if(!empty($nb_anak->kas_n1)){ echo $nb_anak->kas_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="piutang_n1">Piutang - net:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="piutang_n1" placeholder="Enter Piutang - net" name="piutang_n1" value="<?php if(!empty($nb_anak->piutang_n1)){ echo $nb_anak->piutang_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="persediaan_n1">Persediaan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="persediaan_n1" placeholder="Enter Persediaan" name="persediaan_n1" value="<?php if(!empty($nb_anak->persediaan_n1)){ echo $nb_anak->persediaan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="perlengkapan_n1">Perlengkapan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="perlengkapan_n1" placeholder="Enter Perlengkapan" name="perlengkapan_n1" value="<?php if(!empty($nb_anak->perlengkapan_n1)){ echo $nb_anak->perlengkapan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="bangunan_n1">Bangunan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="bangunan_n1" placeholder="Enter Bangunan" name="bangunan_n1" value="<?php if(!empty($nb_anak->bangunan_n1)){ echo $nb_anak->bangunan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="tanah_n1">Tanah:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="tanah_n1" placeholder="Enter Tanah" name="tanah_n1" value="<?php if(!empty($nb_anak->tanah_n1)){ echo $nb_anak->tanah_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class="control-label col-sm-4" for="hutang_dagang_n1">Hutang Dagang:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="hutang_dagang_n1" placeholder="Enter Hutang Dagang" name="hutang_dagang_n1" value="<?php if(!empty($nb_anak->hutang_dagang_n1)){ echo $nb_anak->hutang_dagang_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="hutang_obligasi_n1">Hutang Obligasi:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="hutang_obligasi_n1" placeholder="Enter Hutang Obligasi" name="hutang_obligasi_n1" value="<?php if(!empty($nb_anak->hutang_obligasi_n1)){ echo $nb_anak->hutang_obligasi_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="saham_n1">Saham:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="saham_n1" placeholder="Enter Saham" name="saham_n1" value="<?php if(!empty($nb_anak->saham_n1)){ echo $nb_anak->saham_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="agio_saham_n1">Agio Saham:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="agio_saham_n1" placeholder="Enter Agio Saham" name="agio_saham_n1" value="<?php if(!empty($nb_anak->agio_saham_n1)){ echo $nb_anak->agio_saham_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="laba_ditahan_n1">Laba Ditahan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="laba_ditahan_n1" placeholder="Enter Laba Ditahan" name="laba_ditahan_n1" value="<?php if(!empty($nb_anak->laba_ditahan_n1)){ echo $nb_anak->laba_ditahan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info">Save</button>
      </div>
    </div>
  </form>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- end modal -->
    
                    </th>
                    <th>Nilai Pasar 
                  <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-xs fas fa-edit" data-toggle="modal" data-target="#editNeraca4"></button>

  <!-- Modal -->
  <div class="modal fade" id="editNeraca4" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?php echo base_url() ?>Input/editNeraca" method="post">
    <input type="hidden" name="id_neraca1" value="<?php echo $np_anak->id_neraca1;?>">
    <input type="hidden" name="tipe_nilai" value="<?php echo $np_anak->tipe_nilai;?>">

    <div class="form-group">
      <label class="control-label col-sm-4" for="piutang_n1">Piutang - net:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="piutang_n1" placeholder="Enter Piutang - net" name="piutang_n1" value="<?php if(!empty($np_anak->piutang_n1)){ echo $np_anak->piutang_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="persediaan_n1">Persediaan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="persediaan_n1" placeholder="Enter Persediaan" name="persediaan_n1" value="<?php if(!empty($np_anak->persediaan_n1)){ echo $np_anak->persediaan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="perlengkapan_n1">Perlengkapan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="perlengkapan_n1" placeholder="Enter Perlengkapan" name="perlengkapan_n1" value="<?php if(!empty($np_anak->perlengkapan_n1)){ echo $np_anak->perlengkapan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="bangunan_n1">Bangunan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="bangunan_n1" placeholder="Enter Bangunan" name="bangunan_n1" value="<?php if(!empty($np_anak->bangunan_n1)){ echo $np_anak->bangunan_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="tanah_n1">Tanah:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="tanah_n1" placeholder="Enter Tanah" name="tanah_n1" value="<?php if(!empty($np_anak->tanah_n1)){ echo $np_anak->tanah_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <br>
    <br>
    <div class="form-group">
      <label class="control-label col-sm-4" for="hutang_dagang_n1">Hutang Dagang:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="hutang_dagang_n1" placeholder="Enter Hutang Dagang" name="hutang_dagang_n1" value="<?php if(!empty($np_anak->hutang_dagang_n1)){ echo $np_anak->hutang_dagang_n1;} else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="hutang_obligasi_n1">Hutang Obligasi:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="hutang_obligasi_n1" placeholder="Enter Hutang Obligasi" name="hutang_obligasi_n1" value="<?php if(!empty($np_anak->hutang_obligasi_n1)){ echo $np_anak->hutang_obligasi_n1;} else{ echo "-";} ?>">
      </div>
    </div>
   
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-info">Save</button>
      </div>
    </div>
  </form>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- end modal -->
    
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Kas</td>
                    <td><?php if(!empty($nb_induk->kas_n1)){ echo number_format($nb_induk->kas_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($nb_induk->kas_n1)){ echo number_format($nb_induk->kas_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($nb_anak->kas_n1)){ echo number_format($nb_anak->kas_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($nb_anak->kas_n1)){ echo number_format($nb_anak->kas_n1);} else{ echo "-";} ?></td>
                  </tr>
                  <tr>
                    <td>Piutang - net</td>
                    <td><?php if(!empty($nb_induk->piutang_n1)){ echo number_format($nb_induk->piutang_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_induk->piutang_n1)){ echo number_format($np_induk->piutang_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($nb_anak->piutang_n1)){ echo number_format($nb_anak->piutang_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->piutang_n1)){ echo number_format($np_anak->piutang_n1);} else{ echo "-";} ?></td>
                  </tr>
                  <tr>
                    <td>Persediaan</td>
                    <td><?php if(!empty($nb_induk->persediaan_n1)){ echo number_format($nb_induk->persediaan_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_induk->persediaan_n1)){ echo number_format($np_induk->persediaan_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($nb_anak->persediaan_n1)){ echo number_format($nb_anak->persediaan_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->persediaan_n1)){ echo number_format($np_anak->persediaan_n1);} else{ echo "-";} ?></td>
                  </tr>
                  <tr>
                    <td>Perlengkapan - net</td>
                    <td><?php if(!empty($nb_induk->perlengkapan_n1)){ echo number_format($nb_induk->perlengkapan_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_induk->perlengkapan_n1)){ echo number_format($np_induk->perlengkapan_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($nb_anak->perlengkapan_n1)){ echo number_format($nb_anak->perlengkapan_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->perlengkapan_n1)){ echo number_format($np_anak->perlengkapan_n1);} else{ echo "-";} ?></td>
                  </tr>
                  <tr>
                    <td>Bangunan - net</td>
                    <td><?php if(!empty($nb_induk->bangunan_n1)){ echo number_format($nb_induk->bangunan_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_induk->bangunan_n1)){ echo number_format($np_induk->bangunan_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($nb_anak->bangunan_n1)){ echo number_format($nb_anak->bangunan_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->bangunan_n1)){ echo number_format($np_anak->bangunan_n1);} else{ echo "-";} ?></td>
                  </tr>
                  <tr>
                    <td>Tanah - net</td>
                    <td><?php if(!empty($nb_induk->tanah_n1)){ echo number_format($nb_induk->tanah_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_induk->tanah_n1)){ echo number_format($np_induk->tanah_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($nb_anak->tanah_n1)){ echo number_format($nb_anak->tanah_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->tanah_n1)){ echo number_format($np_anak->tanah_n1);} else{ echo "-";} ?></td>
                  </tr>
                  <tr style="font-weight: bold;">
                    <td>Total Aset</td>
                    <td><?php if(!empty($nb_induk->kas_n1) && !empty($nb_induk->piutang_n1) && !empty($nb_induk->persediaan_n1) && !empty($nb_induk->perlengkapan_n1) && !empty($nb_induk->bangunan_n1) && !empty($nb_induk->tanah_n1)){ echo number_format($nb_induk->kas_n1 + $nb_induk->piutang_n1 + $nb_induk->persediaan_n1 + $nb_induk->perlengkapan_n1 + $nb_induk->bangunan_n1 + $nb_induk->tanah_n1);} else{ echo "-";} ?></td>
                    <td>-</td>
                    <td><?php if(!empty($nb_anak->kas_n1) && !empty($nb_anak->piutang_n1) && !empty($nb_anak->persediaan_n1) && !empty($nb_anak->perlengkapan_n1) && !empty($nb_anak->bangunan_n1) && !empty($nb_anak->tanah_n1)){ echo number_format($nb_anak->kas_n1 + $nb_anak->piutang_n1 + $nb_anak->persediaan_n1 + $nb_anak->perlengkapan_n1 + $nb_anak->bangunan_n1 + $nb_anak->tanah_n1);} else{ echo "-";} ?></td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>Hutang Dagang</td>
                    <td><?php if(!empty($nb_induk->hutang_dagang_n1)){ echo number_format($nb_induk->hutang_dagang_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_induk->hutang_dagang_n1)){ echo number_format($np_induk->hutang_dagang_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($nb_anak->hutang_dagang_n1)){ echo number_format($nb_anak->hutang_dagang_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->hutang_dagang_n1)){ echo number_format($np_anak->hutang_dagang_n1);} else{ echo "-";} ?></td>
                  </tr>
                  <tr>
                    <td>Hutang Obligasi</td>
                    <td><?php if(!empty($nb_induk->hutang_obligasi_n1)){ echo number_format($nb_induk->hutang_obligasi_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_induk->hutang_obligasi_n1)){ echo number_format($np_induk->hutang_obligasi_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($nb_anak->hutang_obligasi_n1)){ echo number_format($nb_anak->hutang_obligasi_n1);} else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->hutang_obligasi_n1)){ echo number_format($np_anak->hutang_obligasi_n1);} else{ echo "-";} ?></td>
                  </tr>
                  <tr>
                    <td>Saham</td>
                    <td><?php if(!empty($nb_induk->saham_n1)){ echo number_format($nb_induk->saham_n1);} else{ echo "-";} ?></td>
                    <td></td>
                    <td><?php if(!empty($nb_anak->saham_n1)){ echo number_format($nb_anak->saham_n1);} else{ echo "-";} ?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Agio Saham</td>
                    <td><?php if(!empty($nb_induk->agio_saham_n1)){ echo number_format($nb_induk->agio_saham_n1);} else{ echo "-";} ?></td>
                    <td></td>
                    <td><?php if(!empty($nb_anak->agio_saham_n1)){ echo number_format($nb_anak->agio_saham_n1);} else{ echo "-";} ?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Laba Ditahan</td>
                    <td><?php if(!empty($nb_induk->laba_ditahan_n1)){ echo number_format($nb_induk->laba_ditahan_n1);} else{ echo "-";} ?></td>
                    <td></td>
                    <td><?php if(!empty($nb_anak->laba_ditahan_n1)){ echo number_format($nb_anak->laba_ditahan_n1);} else{ echo "-";} ?></td>
                    <td></td>
                  </tr>
                  <tr style="font-weight: bold;">
                    <td>Total Hutang dan Ekuitas</td>
                    <td><?php if(!empty($nb_induk->hutang_dagang_n1) && !empty($nb_induk->hutang_obligasi_n1) && !empty($nb_induk->saham_n1) && !empty($nb_induk->agio_saham_n1) && !empty($nb_induk->laba_ditahan_n1)){ echo number_format($nb_induk->hutang_dagang_n1 + $nb_induk->hutang_obligasi_n1 + $nb_induk->saham_n1 + $nb_induk->agio_saham_n1 + $nb_induk->laba_ditahan_n1);} else{ echo "-";} ?></td>
                    <td></td>
                    <td><?php if(!empty($nb_anak->hutang_dagang_n1) && !empty($nb_anak->hutang_obligasi_n1) && !empty($nb_anak->saham_n1) && !empty($nb_anak->agio_saham_n1) && !empty($nb_anak->laba_ditahan_n1)){ echo number_format($nb_anak->hutang_dagang_n1 + $nb_anak->hutang_obligasi_n1 + $nb_anak->saham_n1 + $nb_anak->agio_saham_n1 + $nb_anak->laba_ditahan_n1);} else{ echo "-";} ?></td>
                    <td></td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">
<?php
if($nbuku_induk_aset != $nbuku_induk_hutang && $nbuku_anak_aset != $nbuku_anak_hutang){
echo 'Total Aset dan Total Hutang & Ekuitas dari '.$d_ak->pt_induk.' dan '.$d_ak->pt_anak.' tidak sama, harap diubah !';
} else if($nbuku_induk_aset != $nbuku_induk_hutang) {
echo 'Total Aset dan Total Hutang & Ekuitas dari '.$d_ak->pt_induk.' tidak sama, harap diubah !';
} else if($nbuku_anak_aset != $nbuku_anak_hutang){
echo 'Total Aset dan Total Hutang & Ekuitas dari '.$d_ak->pt_anak.' tidak sama, harap diubah !';
} else{
echo 'Total Aset dan Total Hutang & Ekuitas dari '.$d_ak->pt_induk.' dan '.$d_ak->pt_anak.' sudah sama';
}
?>

            <!-- Catatan: Jika nilai aset dengan nilai hutang dan ekutas berdasarkan nilai buku tidak sama, maka akan ada peringatan -->
</div>
        </div>
        

      </div>
      <!-- /.container-fluid -->
