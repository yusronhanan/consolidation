    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>
        
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Induk</div>
          <div class="card-body">
            <p>Induk : <?php if(!empty($d_ak->pt_induk)){ echo abs($d_ak->pt_induk);}else{ echo "-";} ?></p> 
            <p>Anak : <?php if(!empty($d_ak->pt_anak)){ echo abs($d_ak->pt_anak);}else{ echo "-";} ?></p>
            <p>Tanggal Akuisisi : <?php if(!empty($d_ak->tgl_akuisisi)){ echo abs($d_ak->tgl_akuisisi);}else{ echo "-";} ?></p>
            <p>Persentase Akuisisi (% ): <?php if(!empty($d_ak->persen_akuisisi)){ echo abs($d_ak->persen_akuisisi).'%';}else{ echo "-";} ?> </p>
            
            <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#editAkuisisi1">Edit</button>

  <!-- Modal -->
  <div class="modal fade" id="editAkuisisi1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?php echo base_url() ?>Input/editAkuisisi1" method="post">
    <div class="form-group">
      <label class="control-label col-sm-4" for="pt_induk">PT Induk:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="pt_induk" placeholder="Enter PT Induk" name="pt_induk" value="<?php if(!empty($d_ak->pt_induk)){ echo $d_ak->pt_induk;}else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="pt_anak">PT Anak:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="pt_anak" placeholder="Enter PT Anak" name="pt_anak" value="<?php if(!empty($d_ak->pt_anak)){ echo $d_ak->pt_anak;}else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="tgl_akuisisi">Tanggal Akuisisi:</label>
      <div class="col-sm-10">          
        <input type="date" class="form-control" id="tgl_akuisisi" name="tgl_akuisisi" value="<?php if(!empty($d_ak->tgl_akuisisi)){ echo $d_ak->tgl_akuisisi;}else{ echo "-";} ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-4" for="persen_akuisisi">Persentase Akuisisi (%):</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="persen_akuisisi" placeholder="Enter Persentase Akuisisi" name="persen_akuisisi" value="<?php if(!empty($d_ak->persen_akuisisi)){ echo $d_ak->persen_akuisisi;}else{ echo "-";} ?>">
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
          </div>
        </div>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Metode Akuisisi</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Kas (Rp)</th>
                    <th>Lembar Saham</th>
                    <th>Nilai Par/Lembar (Rp)</th>
                    <th>Nilai Pasar/Lembar (Rp)</th>
                    
                  </tr>
                </thead>
                
                <tbody>
                  <tr>
                    <td><?php if(!empty($d_ak->kas_metode)){ echo number_format(abs($d_ak->kas_metode));}else{ echo "-";} ?></td>
                    <td><?php if(!empty($d_ak->lembar_saham)){ echo number_format(abs($d_ak->lembar_saham));}else{ echo "-";} ?></td>
                    <td><?php if(!empty($d_ak->nilai_par)){ echo number_format(abs($d_ak->nilai_par));}else{ echo "-";} ?></td>
                    <td><?php if(!empty($d_ak->nilai_pasar)){ echo number_format(abs($d_ak->nilai_pasar));}else{ echo "-";} ?></td>
                    
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        
            <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-xs col-sm-1" data-toggle="modal" data-target="#editAkuisisi2">Edit</button>

  <!-- Modal -->
  <div class="modal fade" id="editAkuisisi2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?php echo base_url() ?>Input/editAkuisisi2" method="post">

    <div class="form-group">
      <label class="control-label col-sm-4" for="kas_metode">Kas (Rp):</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="kas_metode" placeholder="Enter Kas" name="kas_metode" value="<?php if(!empty($d_ak->kas_metode)){ echo $d_ak->kas_metode;}else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="lembar_saham">Lembar Saham:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="lembar_saham" placeholder="Enter Lembar Saham" name="lembar_saham" value="<?php if(!empty($d_ak->lembar_saham)){ echo $d_ak->lembar_saham;}else{ echo "-";} ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-4" for="nilai_par">Nilai Par/Lembar:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="nilai_par" placeholder="Enter Nilai Par/Lembar" name="nilai_par" value="<?php if(!empty($d_ak->nilai_par)){ echo $d_ak->nilai_par;}else{ echo "-";} ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-4" for="nilai_pasar">Nilai Pasar/Lembar:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="nilai_pasar" placeholder="Enter Nilai Pasar/Lembar" name="nilai_pasar" value="<?php if(!empty($d_ak->nilai_pasar)){ echo $d_ak->nilai_pasar;}else{ echo "-";} ?>">
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
        </div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Nilai Akuisisi</div>
          <div class="card-body">
            <p>Kas : <?php if(!empty($d_ak->kas_metode)){ echo number_format(abs($d_ak->kas_metode));}else{ echo "-";} ?></p> 
            <p>Saham : <?php if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par)){ echo number_format(abs($d_ak->lembar_saham * $d_ak->nilai_par));}else{ echo "-";} ?></p>
            <p>Agio Saham : <?php if(!empty($d_ak->lembar_saham)){ echo number_format(abs($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par)));}else{ echo "-";} ?></p>
            <p>Investasi pada Anak :  <?php 
            $invest_anak = 0;
            if(!empty($d_ak->kas_metode)){
              $invest_anak += $d_ak->kas_metode;
            } 
            if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par)){ 
              $invest_anak += ($d_ak->lembar_saham * $d_ak->nilai_par);
            }
            if(!empty($d_ak->lembar_saham)){ 
              $invest_anak += ($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
            }

              
            if($invest_anak != 0){
              echo number_format(abs($invest_anak));
            }else{ echo "-";} ?></p>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Beban Biaya</div>
          <div class="card-body">
            <p>Biaya Akuisisi yang dibayar Tunai dibebankan ke : </p> 
            <p>Beban Investasi : <?php if(!empty($d_ak->beban_invest)){ echo number_format(abs($d_ak->beban_invest));}else{ echo "-";} ?></p>
            <p>Agio Saham : <?php if(!empty($d_ak->agio_saham)){ echo number_format(abs($d_ak->agio_saham));}else{ echo "-";} ?> </p>
          
            <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#editAkuisisi3">Edit</button>

  <!-- Modal -->
  <div class="modal fade" id="editAkuisisi3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
          <form class="form-horizontal" action="<?php echo base_url() ?>Input/editAkuisisi3" method="post">

    <div class="form-group">
      <label class="control-label col-sm-4" for="beban_invest">Beban Investasi:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="beban_invest" placeholder="Enter Beban Investasi" name="beban_invest" value="<?php if(!empty($d_ak->beban_invest)){ echo $d_ak->beban_invest;}else{ echo "-";} ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="agio_saham">Agio Saham:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" id="agio_saham" placeholder="Enter Agio Saham" name="agio_saham" value="<?php if(!empty($d_ak->agio_saham)){ echo $d_ak->agio_saham;}else{ echo "-";} ?>">
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
          </div>
        </div>
      

      </div>
      <!-- /.container-fluid -->
