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
            Data Awal</div>
          <div class="card-body">
            <?php 

             ?>
            <p>Nilai Akuisi : <?php if(!empty($d_ak->persen_akuisisi)){ echo $d_ak->persen_akuisisi.'%';} ?>   (Rp.<?php if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode)){ echo $d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));} ?>)</p> 
            <p>Nilai Akuisi : 100%   (Rp.<?php if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode) && !empty($d_ak->persen_akuisisi)){ echo ($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100;} ?>)</p>
            <p>Nilai Buku Anak : 100%   (Rp.<?php if(!empty($nb_anak->saham_n1) && !empty($nb_anak->agio_saham_n1) && !empty($nb_anak->laba_ditahan_n1)) { echo $nb_anak->saham_n1 + $nb_anak->agio_saham_n1 + $nb_anak->laba_ditahan_n1;} ?>)</p>
            <p>Excess: 100%   (Rp.<?php if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode) && !empty($d_ak->persen_akuisisi) && !empty($nb_anak->saham_n1) && !empty($nb_anak->agio_saham_n1) && !empty($nb_anak->laba_ditahan_n1)){ echo (($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100) - ($nb_anak->saham_n1 + $nb_anak->agio_saham_n1 + $nb_anak->laba_ditahan_n1);} ?>)</p>
          </div>
        </div>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Tabel Distribusi Excess</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Alokasi Nilai Excess</th>
                    <th>Nilai Buku</th>
                    <th>Nilai Pasar</th>
                    <th></th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $total_pengurangan = 0.0; ?>
                  <tr>
                    <td>Piutang - net</td>
                    <td><?php if(!empty($nb_anak->piutang_n1)){ echo $nb_anak->piutang_n1;} ?></td>
                    <td><?php if(!empty($np_anak->piutang_n1)){ echo $np_anak->piutang_n1;} ?></td>
                    <?php if(!empty($np_anak->piutang_n1) && !empty($nb_anak->piutang_n1)){ 
                      $kurang = $np_anak->piutang_n1 - $nb_anak->piutang_n1;
                      if($kurang < 0){
                        echo '<td style="color:red">'.(-1*$kurang).'</td>';
                      } else{
                        echo '<td>'.$kurang.'</td>';
                      }
                        $total_pengurangan += $kurang;
                      
                    } ?>
                    <td>
                      <?php if(!empty($np_anak->piutang_n1) && !empty($nb_anak->piutang_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      } ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Persediaan</td>
                    <td><?php if(!empty($nb_anak->persediaan_n1)){ echo $nb_anak->persediaan_n1;} ?></td>
                    <td><?php if(!empty($np_anak->persediaan_n1)){ echo $np_anak->persediaan_n1;} ?></td>
                    <?php if(!empty($np_anak->persediaan_n1) && !empty($nb_anak->persediaan_n1)){ 
                      $kurang = $np_anak->persediaan_n1 - $nb_anak->persediaan_n1;
                      if($kurang < 0){
                        echo '<td style="color:red">'.(-1*$kurang).'</td>';

                      } else{
                        echo '<td>'.$kurang.'</td>';
                      }
                      $total_pengurangan += $kurang;
                      
                    } ?>
                    <td>
                      <?php if(!empty($np_anak->persediaan_n1) && !empty($nb_anak->persediaan_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      } ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Perlengkapan - net</td>
                    <td><?php if(!empty($nb_anak->perlengkapan_n1)){ echo $nb_anak->perlengkapan_n1;} ?></td>
                    <td><?php if(!empty($np_anak->perlengkapan_n1)){ echo $np_anak->perlengkapan_n1;} ?></td>
                    <?php if(!empty($np_anak->perlengkapan_n1) && !empty($nb_anak->perlengkapan_n1)){ 
                      $kurang = $np_anak->perlengkapan_n1 - $nb_anak->perlengkapan_n1;

                      if($kurang < 0){
                        echo '<td style="color:red">'.(-1*$kurang).'</td>';

                      } else{
                        echo '<td>'.$kurang.'</td>';
                      }
                      $total_pengurangan += $kurang;
                      
                    } ?>
                    <td>
                      <?php if(!empty($np_anak->perlengkapan_n1) && !empty($nb_anak->perlengkapan_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      } ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Bangunan - net</td>
                    <td><?php if(!empty($nb_anak->bangunan_n1)){ echo $nb_anak->bangunan_n1;} ?></td>
                    <td><?php if(!empty($np_anak->bangunan_n1)){ echo $np_anak->bangunan_n1;} ?></td>
                    <?php if(!empty($np_anak->bangunan_n1) && !empty($nb_anak->bangunan_n1)){ 
                      $kurang = $np_anak->bangunan_n1 - $nb_anak->bangunan_n1;

                      if($kurang < 0){
                        echo '<td style="color:red">'.(-1*$kurang).'</td>';

                      } else{
                        echo '<td>'.$kurang.'</td>';
                      }
                      $total_pengurangan += $kurang;
                      
                    } ?>
                    <td>
                      <?php if(!empty($np_anak->bangunan_n1) && !empty($nb_anak->bangunan_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      } ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Tanah</td>
                    <td><?php if(!empty($nb_anak->tanah_n1)){ echo $nb_anak->tanah_n1;} ?></td>
                    <td><?php if(!empty($np_anak->tanah_n1)){ echo $np_anak->tanah_n1;} ?></td>
                    <?php if(!empty($np_anak->tanah_n1) && !empty($nb_anak->tanah_n1)){ 
                      $kurang = $np_anak->tanah_n1 - $nb_anak->tanah_n1;

                      if($kurang < 0){
                        echo '<td style="color:red">'.(-1*$kurang).'</td>';

                      } else{
                        echo '<td>'.$kurang.'</td>';
                      }
                      $total_pengurangan += $kurang;                      
                    } ?>
                    <td>
                      <?php if(!empty($np_anak->tanah_n1) && !empty($nb_anak->tanah_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      } ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Hutang Dagang</td>
                    <td><?php if(!empty($nb_anak->hutang_dagang_n1)){ echo $nb_anak->hutang_dagang_n1;} ?></td>
                    <td><?php if(!empty($np_anak->hutang_dagang_n1)){ echo $np_anak->hutang_dagang_n1;} ?></td>
                    <?php if(!empty($np_anak->hutang_dagang_n1) && !empty($nb_anak->hutang_dagang_n1)){ 
                      $kurang = $np_anak->hutang_dagang_n1 - $nb_anak->hutang_dagang_n1;
                      if($kurang < 0){
                        echo '<td style="color:red">'.(-1*$kurang).'</td>';
                        
                      } else{
                        echo '<td>'.$kurang.'</td>';
                      }
                      $total_pengurangan -= $kurang;
                      
                    } ?>
                    <td>
                      <?php if(!empty($np_anak->hutang_dagang_n1) && !empty($nb_anak->hutang_dagang_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      } ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Hutang Obligasi</td>
                    <td><?php if(!empty($nb_anak->hutang_obligasi_n1)){ echo $nb_anak->hutang_obligasi_n1;} ?></td>
                    <td><?php if(!empty($np_anak->hutang_obligasi_n1)){ echo $np_anak->hutang_obligasi_n1;} ?></td>
                    <?php if(!empty($np_anak->hutang_obligasi_n1) && !empty($nb_anak->hutang_obligasi_n1)){ 
                      $kurang = $np_anak->hutang_obligasi_n1 - $nb_anak->hutang_obligasi_n1;
                      if($kurang < 0){
                        echo '<td style="color:red">'.(-1*$kurang).'</td>';
                        
                      } else{
                        echo '<td>'.$kurang.'</td>';
                        
                      }
                      $total_pengurangan -= $kurang;
                      
                    } ?>
                    <td>
                      <?php if(!empty($np_anak->hutang_obligasi_n1) && !empty($nb_anak->hutang_obligasi_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      } ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer text-muted">
            <?php 
            $conclusion = ((($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100) - ($nb_anak->saham_n1 + $nb_anak->agio_saham_n1 + $nb_anak->laba_ditahan_n1)) - $total_pengurangan;
            
          if($conclusion > 0){
            echo 'Goodwill : '.$conclusion;
          } else if($conclusion < 0){
            echo 'Gain From Bargain Purchase : '.$conclusion;
          } else{
            echo '- : '.$conclusion;
          }
             ?>
</div>
        </div>
       

      </div>
      <!-- /.container-fluid -->
