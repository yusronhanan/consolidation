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
            Data Neraca Konsolidasi</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th rowspan="2"></th>
                    <th colspan="2" style="text-align: center;">Neraca</th>
                    <th colspan="2" style="text-align: center;">Penyesuaian dan Eliminasi</th>
                    <th rowspan="2">Neraca Konsolidasi</th>
                  </tr>
                  <tr>
                    <th>PT Induk</th>
                    <th>PT Anak</th>
                    <th>Debet</th>
                    <th>Kredit</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Kas</td>
                    <td><?php 
                    $tot_induk = 0.0;
                    $tot_anak = 0.0;
                    $tot_ns = 0.0;

                    $tot_kol3 = 0.0;
                    $tot_kol4 = 0.0;


                    $kolom1 = 0.0;
                    $kolom2 = 0.0;
                    $kolom3 = 0.0;
                    $kolom4 = 0.0;
                    if(!empty($nb_induk->kas_n1) && !empty($d_ak->kas_metode) && !empty($d_ak->beban_invest) && !empty($d_ak->agio_saham)) {
                      $kolom1 = $nb_induk->kas_n1 - $d_ak->kas_metode - $d_ak->beban_invest - $d_ak->agio_saham;
                      echo $kolom1;
                      $tot_induk += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->kas_n1)){ 
                      $kolom2 = $nb_anak->kas_n1;
                      echo $kolom2;
                      $tot_anak += $kolom2;
                    } ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $kolom1 + $kolom2; 
                    $tot_ns += $kolom1 + $kolom2; ?></td>
                  </tr>

                  <tr>
                    <td>Piutang - net</td>
                    <td><?php 
                    if(!empty($nb_induk->piutang_n1)) {
                      $kolom1 = $nb_induk->piutang_n1;
                      echo $kolom1;
                      $tot_induk += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->piutang_n1)) {
                      $kolom2 = $nb_anak->piutang_n1;
                      echo $kolom2;
                      $tot_anak += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->piutang_n1) && !empty($nb_anak->piutang_n1)){ 
                      $kurang = $np_anak->piutang_n1 - $nb_anak->piutang_n1;
                      if($kurang < 0){
                        echo '<td>0</td><td>'.(-1*$kurang).'</td>';
                        $kolom3 = 0.0;
                        $tot_kol3+=$kolom3;
                        $kolom4 = $kurang;
                        
                      } else{
                        echo '<td>'.$kurang.'</td><td>0</td>';
                        $kolom3 = $kurang;
                        $tot_kol3+=$kolom3;
                        $kolom4 = 0.0;
                      }
                      $tot_kol4 += $kolom4;
                      
                    } ?>
                    <td><?php echo $kolom1 + $kolom2 + $kolom3 + $kolom4;
                    $tot_ns += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                  <tr>
                    <td>Persediaan</td>
                    <td><?php 
                    if(!empty($nb_induk->persediaan_n1)) {
                      $kolom1 = $nb_induk->persediaan_n1;
                      echo $kolom1;
                      $tot_induk += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->persediaan_n1)) {
                      $kolom2 = $nb_anak->persediaan_n1;
                      echo $kolom2;
                      $tot_anak += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->persediaan_n1) && !empty($nb_anak->persediaan_n1)){ 
                      $kurang = $np_anak->persediaan_n1 - $nb_anak->persediaan_n1;
                      if($kurang < 0){
                        echo '<td>0</td><td>'.(-1*$kurang).'</td>';
                        $kolom3 = 0.0;
                        $tot_kol3+=$kolom3;
                        $kolom4 = $kurang;
                        
                      } else{
                        echo '<td>'.$kurang.'</td><td>0</td>';
                        $kolom3 = $kurang;
                        $tot_kol3+=$kolom3;
                        $kolom4 = 0.0;
                      }
                      $tot_kol4 += $kolom4;
                      
                    } ?>
                    <td><?php echo $kolom1 + $kolom2 + $kolom3 + $kolom4;
                    $tot_ns += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                  <tr>
                    <td>Perlengkapan - net</td>
                    <td><?php 
                    if(!empty($nb_induk->perlengkapan_n1)) {
                      $kolom1 = $nb_induk->perlengkapan_n1;
                      echo $kolom1;
                      $tot_induk += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->perlengkapan_n1)) {
                      $kolom2 = $nb_anak->perlengkapan_n1;
                      echo $kolom2;
                      $tot_anak += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->perlengkapan_n1) && !empty($nb_anak->perlengkapan_n1)){ 
                      $kurang = $np_anak->perlengkapan_n1 - $nb_anak->perlengkapan_n1;
                      if($kurang < 0){
                        echo '<td>0</td><td>'.(-1*$kurang).'</td>';
                        $kolom3 = 0.0;
                        $tot_kol3+=$kolom3;
                        $kolom4 = $kurang;
                       
                        $tot_kol4 += -1* $kolom4; 
                      } else{
                        echo '<td>'.$kurang.'</td><td>0</td>';
                        $kolom3 = $kurang;
                        $tot_kol3+=$kolom3;
                        $kolom4 = 0.0;
                      }
                      
                    } ?>
                    <td><?php echo $kolom1 + $kolom2 + $kolom3 + $kolom4;
                    $tot_ns += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                  <tr>
                    <td>Bangunan - net</td>
                    <td><?php 
                    if(!empty($nb_induk->bangunan_n1)) {
                      $kolom1 = $nb_induk->bangunan_n1;
                      echo $kolom1;
                      $tot_induk += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->bangunan_n1)) {
                      $kolom2 = $nb_anak->bangunan_n1;
                      echo $kolom2;
                      $tot_anak += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->bangunan_n1) && !empty($nb_anak->bangunan_n1)){ 
                      $kurang = $np_anak->bangunan_n1 - $nb_anak->bangunan_n1;
                      if($kurang < 0){
                        echo '<td>0</td><td>'.(-1*$kurang).'</td>';
                        $kolom3 = 0.0;
                        $tot_kol3+=$kolom3;
                        $kolom4 = $kurang;
                        
                      } else{
                        echo '<td>'.$kurang.'</td><td>0</td>';
                        $kolom3 = $kurang;
                        $tot_kol3+=$kolom3;
                        $kolom4 = 0.0;
                      }
                      $tot_kol4 += $kolom4;
                      
                    } ?>
                    <td><?php echo $kolom1 + $kolom2 + $kolom3 + $kolom4;
                    $tot_ns += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                  <tr>
                    <td>Tanah</td>
                    <td><?php 
                    if(!empty($nb_induk->tanah_n1)) {
                      $kolom1 = $nb_induk->tanah_n1;
                      echo $kolom1;
                      $tot_induk += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->tanah_n1)) {
                      $kolom2 = $nb_anak->tanah_n1;
                      echo $kolom2;
                      $tot_anak += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->tanah_n1) && !empty($nb_anak->tanah_n1)){ 
                      $kurang = $np_anak->tanah_n1 - $nb_anak->tanah_n1;
                      if($kurang < 0){
                        echo '<td>0</td><td>'.(-1*$kurang).'</td>';
                        $kolom3 = 0.0;
                        $tot_kol3+=$kolom3;
                        $kolom4 = $kurang;
                        
                      } else{
                        echo '<td>'.$kurang.'</td><td>0</td>';
                        $kolom3 = $kurang;
                        $tot_kol3+=$kolom3;
                        $kolom4 = 0.0;
                      }
                      $tot_kol4 += $kolom4;
                      
                    } ?>
                    <td><?php echo $kolom1 + $kolom2 + $kolom3 + $kolom4;
                    $tot_ns += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                  <tr>
                    <td>Investasi pada Anak</td>
                    <td><?php  if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode)){ echo $d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
                      $tot_induk += $d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
                    } ?></td>
                    <td></td>
                    <td></td>
                    <td><?php  if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode)){ echo $d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
                      $tot_kol4 += $d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
                    } 

                    ?></td>
                    <td>-</td>

                  </tr>
                  <tr>
                    
                  <tr>
                    <td>Excess</td>
                    <td></td>
                    <td></td>
                    <td><?php if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode) && !empty($d_ak->persen_akuisisi) && !empty($nb_anak->saham_n1) && !empty($nb_anak->agio_saham_n1) && !empty($nb_anak->laba_ditahan_n1)){ 
                    
                      $excess = (($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100) - ($nb_anak->saham_n1 + $nb_anak->agio_saham_n1 + $nb_anak->laba_ditahan_n1);
                      if($excess > 0){
                        echo $excess;
                        $tot_kol3 += $excess;
                      } else{
                        echo "-";
                      }
                    } ?></td>
                    <td><?php if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode) && !empty($d_ak->persen_akuisisi) && !empty($nb_anak->saham_n1) && !empty($nb_anak->agio_saham_n1) && !empty($nb_anak->laba_ditahan_n1)){ 
                    if($excess > 0){
                        echo $excess;
                        $tot_kol4 += $excess;

                      } else{
                        echo "-";
                      }
                    } ?></td>
                    <td>-</td>

                  </tr>
                <tr>
                    <td>
                       <?php 
            $total_pengurangan = (($np_anak->piutang_n1 - $nb_anak->piutang_n1)+($np_anak->persediaan_n1 - $nb_anak->persediaan_n1) + ($np_anak->perlengkapan_n1 - $nb_anak->perlengkapan_n1) + ($np_anak->bangunan_n1 - $nb_anak->bangunan_n1) + ($np_anak->tanah_n1 - $nb_anak->tanah_n1) - ($np_anak->hutang_dagang_n1 - $nb_anak->hutang_dagang_n1) - ($np_anak->hutang_obligasi_n1 - $nb_anak->hutang_obligasi_n1));

            $conclusion = ((($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100) - ($nb_anak->saham_n1 + $nb_anak->agio_saham_n1 + $nb_anak->laba_ditahan_n1)) - $total_pengurangan;
            
          if($conclusion > 0){
            echo 'Goodwill';
            $tot_kol3 += $conclusion;
          }
             ?>
                    </td>
                    <td></td>
                    <td></td>
                    <td> <?php 
          if($conclusion > 0){
            echo $conclusion;
          } else{
            echo '0';
          }
             ?></td>
                    <td></td>
                    <td> <?php 
          if($conclusion > 0){
            echo $conclusion;
            $tot_ns += $conclusion;
          } else{
            echo '0';
          }
             ?></td>

                  </tr>
                  <tr style="font-weight: bold">
                    <td>Total Aset</td>
                    <td><?php echo $tot_induk ?></td>
                    <td><?php echo $tot_anak ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $tot_ns ?></td>

                  </tr>
<tr>
                    <td>Hutang Dagang</td>
                    <td><?php 
                    $tot_induk2 = 0.0;
                    $tot_anak2 = 0.0;
                    $tot_ns2 = 0.0;                
                    if(!empty($nb_induk->hutang_dagang_n1)) {
                      $kolom1 = $nb_induk->hutang_dagang_n1;
                      echo $kolom1;
                      $tot_induk2 += $kolom1;
                    }

                     ?></td>
                    <td><?php if(!empty($nb_anak->hutang_dagang_n1)) {
                      $kolom2 = $nb_anak->hutang_dagang_n1;
                      echo $kolom2;
                      $tot_anak2 += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->hutang_dagang_n1) && !empty($nb_anak->hutang_dagang_n1)){ 
                      $kurang = $np_anak->hutang_dagang_n1 - $nb_anak->hutang_dagang_n1;
                      if($kurang > 0){
                        echo '<td>0</td><td>'.($kurang).'</td>';
                        $kolom3 = 0.0;
                        $kolom4 = $kurang;
                        
                      } else{
                        echo '<td>'.(-1*$kurang).'</td><td>0</td>';
                        $kolom3 = $kurang;
                        $kolom4 = 0.0;
                      }

                      $tot_kol3+=$kolom3;
                      $tot_kol4 += $kolom4;
                    } ?>
                    <td><?php echo $kolom1 + $kolom2 + $kolom3 + $kolom4;
                    $tot_ns2 += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                <tr>
                    <td>Hutang Obligasi</td>
                    <td><?php                 
                    if(!empty($nb_induk->hutang_obligasi_n1)) {
                      $kolom1 = $nb_induk->hutang_obligasi_n1;
                      echo $kolom1;
                      $tot_induk2 += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->hutang_obligasi_n1)) {
                      $kolom2 = $nb_anak->hutang_obligasi_n1;
                      echo $kolom2;
                      $tot_anak2 += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->hutang_obligasi_n1) && !empty($nb_anak->hutang_obligasi_n1)){ 
                      $kurang = $np_anak->hutang_obligasi_n1 - $nb_anak->hutang_obligasi_n1;
                      if($kurang > 0){
                        echo '<td>0</td><td>'.($kurang).'</td>';
                        $kolom3 = 0.0;
                        $kolom4 = $kurang;
                        
                      } else{
                        echo '<td>'.(-1*$kurang).'</td><td>0</td>';
                        $kolom3 = $kurang;
                        $kolom4 = 0.0;
                      }
                      
                      $tot_kol4 += $kolom4;
                      $tot_kol3+=$kolom3;
                      
                    } ?>
                    <td><?php echo $kolom1 + $kolom2 + $kolom3 + $kolom4;
                    $tot_ns2 += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                  <tr>
                    <td>Saham</td>
                    <td><?php
                    $kolom1 = $nb_induk->saham_n1 + ( $d_ak->lembar_saham * $d_ak->nilai_par);
                    echo $kolom1;
                    $tot_induk2 += $kolom1;
                     ?></td>
                    <td><?php
                    $kolom2 = $nb_anak->saham_n1;
                    echo $kolom2;
                    $tot_anak2 += $kolom2;
                     ?></td>
                     <td><?php
                    $kolom3 = $nb_anak->saham_n1;
                    echo $kolom3;
                    $tot_kol3 += $kolom3;
                     ?></td>
                    <td></td>
                    <td>
                      <?php
                      $tot_ns2 += $kolom1 + $kolom2 - $kolom3;
                      echo $kolom1 + $kolom2 - $kolom3;
                       ?>
                    </td>

                  </tr>
                                    <tr>
                    <td>Agio Saham</td>
                    <td><?php
                    $kolom1 = $nb_induk->agio_saham_n1 + ($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par)) - $d_ak->agio_saham;
                    echo $kolom1;
                    $tot_induk2 += $kolom1;
                     ?></td>
                    <td><?php
                    $kolom2 = $nb_anak->agio_saham_n1;
                    echo $kolom2;
                    $tot_anak2 += $kolom2;
                     ?></td>
                     <td><?php
                    $kolom3 = $nb_anak->agio_saham_n1;
                    echo $kolom3;
                    $tot_kol3 += $kolom3;
                     ?></td>
                    <td></td>
                    <td>
                      <?php
                      $tot_ns2 += $kolom1 + $kolom2 - $kolom3;
                      echo $kolom1 + $kolom2 - $kolom3;
                       ?>
                    </td>

                  </tr>
                                  <tr>
                    <td>Laba Ditahan</td>
                    <td><?php
                    $kolom1 = $nb_induk->laba_ditahan_n1 - $d_ak->beban_invest;
                    echo $kolom1;
                    $tot_induk2 += $kolom1;
                     ?></td>
                    <td><?php
                    $kolom2 = $nb_anak->laba_ditahan_n1;
                    echo $kolom2;
                    $tot_anak2 += $kolom2;
                     ?></td>
                     <td><?php
                    $kolom3 = $nb_anak->laba_ditahan_n1;
                    echo $kolom3;
                    $tot_kol3 += $kolom3;
                     ?></td>
                    <td>
                      <?php 
                      if($conclusion < 0){
                        $kolom4 = $conclusion;
                      } else{
                        $kolom4 = 0;
                      }
                      echo $kolom4;
                       ?>
                      
                    </td>
                    <td>
                      <?php
                      $tot_ns2 += $kolom1 + $kolom2 - $kolom3 + $kolom4;
                      echo $kolom1 + $kolom2 - $kolom3 + $kolom4;
                       ?>
                    </td>

                  </tr>
                  <tr>
                    <td>Non Controlling Interest</td>
                    <td></td>
                    <td></td>
                    <td></td>
                      <?php
                       if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode) && !empty($d_ak->persen_akuisisi)){
                      $kolom4 = (($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100) * (100 - $d_ak->persen_akuisisi) / 100;
                      echo '<td>'.$kolom4.'</td>';
                      echo '<td>'.$kolom4.'</td>';

                      $tot_kol4 += $kolom4;
                      $tot_ns2 += $kolom4;
                      }
                       ?>                  
                  </tr>
                  <tr style="font-weight: bold">
                    <td>Total Hutang dan Ekuitas</td>
                    <td><?php echo $tot_induk2 ?></td>
                    <td><?php echo $tot_anak2 ?></td>
                    <td><?php echo $tot_kol3 ?></td>
                    <td><?php echo $tot_kol4 ?></td>
                    
                    <td><?php echo $tot_ns2 ?></td>

                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- <div class="card-footer small text-muted">text</div> -->
        </div>
        <p class="small text-center text-muted my-5">
          <em>By : Reissa</em>
        </p>

      </div>
      <!-- /.container-fluid -->
