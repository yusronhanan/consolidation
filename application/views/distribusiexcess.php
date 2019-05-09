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
            <p>Nilai Akuisi : <?php if(!empty($d_ak->persen_akuisisi)){ echo $d_ak->persen_akuisisi.'%';} else{ echo "-";} ?>   (Rp.<?php 
              $nilai_akuisisi = 0;
              if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par)){
                $nilai_akuisisi += ($d_ak->lembar_saham * $d_ak->nilai_par);
              }
              if(!empty($d_ak->kas_metode)){
                $nilai_akuisisi += $d_ak->kas_metode;
              }
              if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar)){
                $nilai_akuisisi += ($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
              }
              if($nilai_akuisisi != 0){
                echo number_format($nilai_akuisisi);
              } else{ echo "-";} 
              ?>)</p> 
            <p>Nilai Akuisi : 100%   (Rp.<?php 
              $nilai_akuisisi2 = 0;
              if(!empty($d_ak->kas_metode)){
                $nilai_akuisisi2 += $d_ak->kas_metode;
              }
              if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par)){
                $nilai_akuisisi2 += ($d_ak->lembar_saham * $d_ak->nilai_par);
              }
              if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_pasar) && !empty($d_ak->nilai_par)){
                $nilai_akuisisi2 += ($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
              }
              if($nilai_akuisisi2 != 0 && !empty($d_ak->persen_akuisisi)){
                $nilai_akuisisi2 = $nilai_akuisisi2 /  $d_ak->persen_akuisisi * 100;
              }
              // if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode) && !empty($d_ak->persen_akuisisi)){ 
              //   echo number_format(($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100);

              // } 
              if($nilai_akuisisi2 != 0){
                echo number_format($nilai_akuisisi2);
              }
              else{ echo "-";} ?>)</p>
            <p>Nilai Buku Anak : 100%   (Rp.<?php 
              $nilai_anak = 0;

              if(!empty($nb_anak->saham_n1)){
              $nilai_anak += $nb_anak->saham_n1;
              }
              if(!empty($nb_anak->agio_saham_n1)){
              $nilai_anak += $nb_anak->agio_saham_n1;
              }
              if(!empty($nb_anak->laba_ditahan_n1)){
              $nilai_anak += $nb_anak->laba_ditahan_n1;
              }
              // if(!empty($nb_anak->saham_n1) && !empty($nb_anak->agio_saham_n1) && !empty($nb_anak->laba_ditahan_n1)) { echo number_format($nb_anak->saham_n1 + $nb_anak->agio_saham_n1 + $nb_anak->laba_ditahan_n1);} else{ echo "-";} 
              if($nilai_anak != 0) { echo number_format($nilai_anak);} else{ echo "-";} 
              ?>)</p>
            <p>Excess: 100%   (Rp.<?php 
              $nilai_excess = 0;
              $nilai_excess += ($nilai_akuisisi2 - $nilai_anak);
              if($nilai_excess == 0){
                echo "-";
              } else{
                echo number_format($nilai_excess);
              }
              // if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode) && !empty($d_ak->persen_akuisisi) && !empty($nb_anak->saham_n1) && !empty($nb_anak->agio_saham_n1) && !empty($nb_anak->laba_ditahan_n1)){ echo number_format((($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100)               - ($nb_anak->saham_n1 + $nb_anak->agio_saham_n1 + $nb_anak->laba_ditahan_n1));} else{ echo "-";} ?>)</p>
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
                    <td><?php if(!empty($nb_anak->piutang_n1)){ echo number_format($nb_anak->piutang_n1);}else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->piutang_n1)){ echo number_format($np_anak->piutang_n1);}else{ echo "-";} ?></td>
                    <?php if(!empty($np_anak->piutang_n1) && !empty($nb_anak->piutang_n1)){ 
                      $kurang = $np_anak->piutang_n1 - $nb_anak->piutang_n1;
                      if($kurang < 0){
                        echo '<td style="color:red">'.number_format((-1*$kurang)).'</td>';
                      } else{
                        echo '<td>'.number_format($kurang).'</td>';
                      }
                        $total_pengurangan += $kurang;
                      
                    } else{ echo "-";} ?>
                    <td>
                      <?php if(!empty($np_anak->piutang_n1) && !empty($nb_anak->piutang_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      }else{ echo "-";} ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Persediaan</td>
                    <td><?php if(!empty($nb_anak->persediaan_n1)){ echo number_format($nb_anak->persediaan_n1);}else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->persediaan_n1)){ echo number_format($np_anak->persediaan_n1);}else{ echo "-";} ?></td>
                    <?php if(!empty($np_anak->persediaan_n1) && !empty($nb_anak->persediaan_n1)){ 
                      $kurang = $np_anak->persediaan_n1 - $nb_anak->persediaan_n1;
                      if($kurang < 0){
                        echo '<td style="color:red">'.number_format((-1*$kurang)).'</td>';

                      } else{
                        echo '<td>'.number_format($kurang).'</td>';
                      }
                      $total_pengurangan += $kurang;
                      
                    }else{ echo "-";} ?>
                    <td>
                      <?php if(!empty($np_anak->persediaan_n1) && !empty($nb_anak->persediaan_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      }else{ echo "-";} ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Perlengkapan - net</td>
                    <td><?php if(!empty($nb_anak->perlengkapan_n1)){ echo number_format($nb_anak->perlengkapan_n1);}else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->perlengkapan_n1)){ echo number_format($np_anak->perlengkapan_n1);}else{ echo "-";} ?></td>
                    <?php if(!empty($np_anak->perlengkapan_n1) && !empty($nb_anak->perlengkapan_n1)){ 
                      $kurang = $np_anak->perlengkapan_n1 - $nb_anak->perlengkapan_n1;

                      if($kurang < 0){
                        echo '<td style="color:red">'.number_format((-1*$kurang)).'</td>';

                      } else{
                        echo '<td>'.number_format($kurang).'</td>';
                      }
                      $total_pengurangan += $kurang;
                      
                    }else{ echo "-";} ?>
                    <td>
                      <?php if(!empty($np_anak->perlengkapan_n1) && !empty($nb_anak->perlengkapan_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      }else{ echo "-";} ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Bangunan - net</td>
                    <td><?php if(!empty($nb_anak->bangunan_n1)){ echo number_format($nb_anak->bangunan_n1);}else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->bangunan_n1)){ echo number_format($np_anak->bangunan_n1);}else{ echo "-";} ?></td>
                    <?php if(!empty($np_anak->bangunan_n1) && !empty($nb_anak->bangunan_n1)){ 
                      $kurang = $np_anak->bangunan_n1 - $nb_anak->bangunan_n1;

                      if($kurang < 0){
                        echo '<td style="color:red">'.number_format((-1*$kurang)).'</td>';

                      } else{
                        echo '<td>'.number_format($kurang).'</td>';
                      }
                      $total_pengurangan += $kurang;
                      
                    }else{ echo "-";} ?>
                    <td>
                      <?php if(!empty($np_anak->bangunan_n1) && !empty($nb_anak->bangunan_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      }else{ echo "-";} ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Tanah</td>
                    <td><?php if(!empty($nb_anak->tanah_n1)){ echo number_format($nb_anak->tanah_n1);}else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->tanah_n1)){ echo number_format($np_anak->tanah_n1);}else{ echo "-";} ?></td>
                    <?php if(!empty($np_anak->tanah_n1) && !empty($nb_anak->tanah_n1)){ 
                      $kurang = $np_anak->tanah_n1 - $nb_anak->tanah_n1;

                      if($kurang < 0){
                        echo '<td style="color:red">'.number_format((-1*$kurang)).'</td>';

                      } else{
                        echo '<td>'.number_format($kurang).'</td>';
                      }
                      $total_pengurangan += $kurang;                      
                    }else{ echo "-";} ?>
                    <td>
                      <?php if(!empty($np_anak->tanah_n1) && !empty($nb_anak->tanah_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      }else{ echo "-";} ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Hutang Dagang</td>
                    <td><?php if(!empty($nb_anak->hutang_dagang_n1)){ echo number_format($nb_anak->hutang_dagang_n1);}else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->hutang_dagang_n1)){ echo number_format($np_anak->hutang_dagang_n1);}else{ echo "-";} ?></td>
                    <?php if(!empty($np_anak->hutang_dagang_n1) && !empty($nb_anak->hutang_dagang_n1)){ 
                      $kurang = $np_anak->hutang_dagang_n1 - $nb_anak->hutang_dagang_n1;
                      if($kurang < 0){
                        echo '<td style="color:red">'.number_format((-1*$kurang)).'</td>';
                        
                      } else{
                        echo '<td>'.number_format($kurang).'</td>';
                      }
                      $total_pengurangan -= $kurang;
                      
                    }else{ echo "-";} ?>
                    <td>
                      <?php if(!empty($np_anak->hutang_dagang_n1) && !empty($nb_anak->hutang_dagang_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      }else{ echo "-";} ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Hutang Obligasi</td>
                    <td><?php if(!empty($nb_anak->hutang_obligasi_n1)){ echo number_format($nb_anak->hutang_obligasi_n1);}else{ echo "-";} ?></td>
                    <td><?php if(!empty($np_anak->hutang_obligasi_n1)){ echo number_format($np_anak->hutang_obligasi_n1);}else{ echo "-";} ?></td>
                    <?php if(!empty($np_anak->hutang_obligasi_n1) && !empty($nb_anak->hutang_obligasi_n1)){ 
                      $kurang = $np_anak->hutang_obligasi_n1 - $nb_anak->hutang_obligasi_n1;
                      if($kurang < 0){
                        echo '<td style="color:red">'.number_format((-1*$kurang)).'</td>';
                        
                      } else{
                        echo '<td>'.number_format($kurang).'</td>';
                        
                      }
                      $total_pengurangan -= $kurang;
                      
                    } else{ echo "-";}?>
                    <td>
                      <?php if(!empty($np_anak->hutang_obligasi_n1) && !empty($nb_anak->hutang_obligasi_n1)){
                        if($kurang < 0){
                          echo 'Overvalued';
                        } else{
                          echo 'Undervalued';
                        }
                      }else{ echo "-";} ?>
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
            echo 'Goodwill : '.number_format($conclusion);
          } else if($conclusion < 0){
            echo 'Gain From Bargain Purchase : '.number_format($conclusion);
          } else{
            echo '- : '.number_format($conclusion);
          }
             ?>

</div>

        </div>
      
       