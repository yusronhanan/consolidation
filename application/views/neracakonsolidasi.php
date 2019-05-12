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
            Jurnal Eliminasi</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Jurnal Eliminasi</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $tot_d = 0.0;
                  $tot_k = 0.0;

                   ?>
                  <tr>
                    <td>Saham</td>
                    <td><?php
                    $kolom1 = $nb_anak->saham_n1;
                    echo number_format($kolom1);
                    $tot_d += $kolom1;
                     ?></td>
                     <td>-</td>
                  </tr>
                  <tr>
                    <td>Agio Saham</td>
                    <td><?php
                    $kolom1 = $nb_anak->agio_saham_n1;
                    echo number_format($kolom1);
                    $tot_d += $kolom1;
                     ?></td>
                     <td>-</td>
                  </tr>
                  <tr>
                    <td>Laba Ditahan</td>
                    <td><?php
                    $kolom1 = $nb_anak->laba_ditahan_n1;
                    echo number_format($kolom1);
                    $tot_d += $kolom1;
                     ?></td>
                    <td>-</td>
                  </tr>
                  <tr>
                    <td>Excess</td>
                    <?php
                     // if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode) && !empty($d_ak->persen_akuisisi) && !empty($nb_anak->saham_n1) && !empty($nb_anak->agio_saham_n1) && !empty($nb_anak->laba_ditahan_n1)){ 
                    $nilai_akuisisi2 = 0;
              if(!empty($d_ak->kas_metode)){
                $nilai_akuisisi2 += $d_ak->kas_metode;
              }
              if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par)){
                $nilai_akuisisi2 += ($d_ak->lembar_saham * $d_ak->nilai_par);
              }
              if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_pasar)){
                $nilai_akuisisi2 += ($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
              }
              if($nilai_akuisisi2 != 0 && !empty($d_ak->persen_akuisisi)){
                $nilai_akuisisi2 = $nilai_akuisisi2 /  $d_ak->persen_akuisisi * 100;
              }
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
              $excess = $nilai_akuisisi2 - $nilai_anak;
                      // $excess = (($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100) - ($nb_anak->saham_n1 + $nb_anak->agio_saham_n1 + $nb_anak->laba_ditahan_n1);
                      // if($excess == 0){
                      if($excess > 0){
                        echo '<td>'.number_format($excess).'</td> <td>-</td>';
                        $tot_d += $excess;
                      } else{
                        echo ' <td>-</td><td>'.number_format($excess).'</td>';
                        $tot_k += $excess;
                      }
                      // } else{
                      // echo "<td>-</td> <td>-</td>"; 
                        
                      // }

                    // } else {
                    //   echo "-"; 
                    // } ?>
                    
                  </tr>
                  <tr>
                    <td>Investasi pada Anak</td>
                    <td>-</td>
                    <td><?php   
            $invest_anak = 0;
            if(!empty($d_ak->kas_metode)){
              $invest_anak += $d_ak->kas_metode;
            } 
            if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par)){ 
              $invest_anak += ($d_ak->lembar_saham * $d_ak->nilai_par);
            }
            if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_pasar)){ 
              $invest_anak += ($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
            }

              
            if($invest_anak != 0){
              echo number_format($invest_anak);
            }else{ echo "-";} 
                    $tot_k += $invest_anak;
                    
                    ?></td>
                  </tr>
                  <tr>
                    <td>Non Controlling Interest</td>
                    <td>-</td>
                    <td><?php
                      $kolom2 = 0;
                      $kolom2 = (($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100) * (100 - $d_ak->persen_akuisisi) / 100;
                      
                      $tot_k += $kolom2;
                      if($kolom2 != 0){

                      echo number_format($kolom2);

                      } else {
                      echo "-"; 
                    }
                       ?></td>
                  </tr>
                  <tr>
                    <td colspan="3"></td>
                  </tr>
                  <tr>
                    <td>Piutang - net</td>
                    <?php if(!empty($np_anak->piutang_n1) && !empty($nb_anak->piutang_n1)){ 
                      $kurang = $np_anak->piutang_n1 - $nb_anak->piutang_n1;
                      if($kurang < 0){
                        echo '<td>-</td><td>'.number_format((-1*$kurang)).'</td>';
                        $kolom1 = 0.0;
                        $kolom2 = $kurang;
                      $tot_k += -1*$kolom2;

                        
                      } else{
                        echo '<td>'.number_format($kurang).'</td><td>-</td>';
                        $kolom1 = $kurang;
                        $kolom2 = 0.0;
                      
                      $tot_d += $kolom1;
                      }
                      
                    } else {
                      echo "-"; 
                    } ?>
                  </tr>
                  <tr>
                    <td>Persediaan</td>
                    
                    <?php if(!empty($np_anak->persediaan_n1) && !empty($nb_anak->persediaan_n1)){ 
                      $kurang = $np_anak->persediaan_n1 - $nb_anak->persediaan_n1;
                      if($kurang < 0){
                        echo '<td>-</td><td>'.number_format((-1*$kurang)).'</td>';
                        $kolom1 = 0.0;
                        $kolom2 = $kurang;
                       
                      $tot_k+= -1*$kolom2; 
                      } else{
                        echo '<td>'.number_format($kurang).'</td><td>-</td>';
                        $kolom1 = $kurang;
                        $kolom2 = 0.0;
                      $tot_d += $kolom1;

                      }
                      
                    } else {
                      echo "-"; 
                    } ?>
                  </tr>
                  <tr>
                    <td>Perlengkapan - net</td>
                    
                    <?php if(!empty($np_anak->perlengkapan_n1) && !empty($nb_anak->perlengkapan_n1)){ 
                      $kurang = $np_anak->perlengkapan_n1 - $nb_anak->perlengkapan_n1;
                      if($kurang < 0){
                        echo '<td>-</td><td>'.number_format((-1*$kurang)).'</td>';
                        $kolom1 = 0.0;
                        $kolom2 = $kurang;
                       
                      $tot_k+=-1*$kolom2;
                      } else{
                        echo '<td>'.number_format($kurang).'</td><td>-</td>';
                        $kolom1 = $kurang;
                        $kolom2 = 0.0;
                      $tot_d += $kolom1; 
                      }
                      
                    } else {
                      echo "-"; 
                    } ?>
                  </tr><tr>
                    <td>Bangunan - net</td>
                    
                    <?php if(!empty($np_anak->bangunan_n1) && !empty($nb_anak->bangunan_n1)){ 
                      $kurang = $np_anak->bangunan_n1 - $nb_anak->bangunan_n1;
                      if($kurang < 0){
                        echo '<td>-</td><td>'.number_format((-1*$kurang)).'</td>';
                        $kolom1 = 0.0;
                        $kolom2 = $kurang;
                       
                      $tot_k += -1* $kolom2;

                      } else{
                        echo '<td>'.number_format($kurang).'</td><td>-</td>';
                        $kolom1 = $kurang;
                        $kolom2 = 0.0;

                      $tot_d += $kolom1;

                      }
                      
                    } else {
                      echo "-"; 
                    } ?>
                  </tr><tr>
                    <td>Tanah</td>
                    
                    <?php if(!empty($np_anak->tanah_n1) && !empty($nb_anak->tanah_n1)){ 
                      $kurang = $np_anak->tanah_n1 - $nb_anak->tanah_n1;
                      if($kurang < 0){
                        echo '<td>-</td><td>'.number_format((-1*$kurang)).'</td>';
                        $kolom1 = 0.0;
                        $kolom2 = $kurang;
                      $tot_k += -1* $kolom2;
                                               
                      } else{
                        echo '<td>'.number_format($kurang).'</td><td>-</td>';
                        $kolom1 = $kurang;
                        $kolom2 = 0.0;
                        $tot_d += $kolom1;
                      }

                      
                    } else {
                      echo "-"; 
                    } ?>
                  </tr><tr>
                      <?php 
            $total_pengurangan = (($np_anak->piutang_n1 - $nb_anak->piutang_n1)+($np_anak->persediaan_n1 - $nb_anak->persediaan_n1) + ($np_anak->perlengkapan_n1 - $nb_anak->perlengkapan_n1) + ($np_anak->bangunan_n1 - $nb_anak->bangunan_n1) + ($np_anak->tanah_n1 - $nb_anak->tanah_n1) - ($np_anak->hutang_dagang_n1 - $nb_anak->hutang_dagang_n1) - ($np_anak->hutang_obligasi_n1 - $nb_anak->hutang_obligasi_n1));

            $conclusion = ((($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100) - ($nb_anak->saham_n1 + $nb_anak->agio_saham_n1 + $nb_anak->laba_ditahan_n1)) - $total_pengurangan;
            
          if($conclusion > 0){
            echo '<td>Goodwill</td> <td>'.number_format($conclusion).'</td> <td>-</td>'; 
            $tot_d += $conclusion;
          } else{
            echo '<td>Gain From Bargain Purchase</td><td>-</td><td>'.number_format($conclusion).'</td> ';
            $tot_k += $conclusion;
            
          }
             ?>
                  </tr>
                 <tr>
                    <td>Excess</td>
                    <?php 
                    // if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode) && !empty($d_ak->persen_akuisisi) && !empty($nb_anak->saham_n1) && !empty($nb_anak->agio_saham_n1) && !empty($nb_anak->laba_ditahan_n1)){ 
                    
                      $nilai_akuisisi2 = 0;
              if(!empty($d_ak->kas_metode)){
                $nilai_akuisisi2 += $d_ak->kas_metode;
              }
              if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par)){
                $nilai_akuisisi2 += ($d_ak->lembar_saham * $d_ak->nilai_par);
              }
              if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_pasar)){
                $nilai_akuisisi2 += ($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
              }
              if($nilai_akuisisi2 != 0 && !empty($d_ak->persen_akuisisi)){
                $nilai_akuisisi2 = $nilai_akuisisi2 /  $d_ak->persen_akuisisi * 100;
              }
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
              $excess = $nilai_akuisisi2 - $nilai_anak;
                      // if($excess == 0){
                      if($excess < 0){
                        echo '<td>'.number_format($excess).'</td> <td>-</td>';
                        $tot_d += $excess;
                      } else{
                        echo ' <td>-</td><td>'.number_format($excess).'</td>';
                        $tot_k += $excess;

                      }
                      // } else {
                      // echo "<td>-</td> <td>-</td>"; 
                      // }

                    // } else {
                    //   echo "-"; 
                    // } 
                    ?>
                  </tr>
                  <tr>
                    <td>Hutang Dagang</td>

                    <?php if(!empty($np_anak->hutang_dagang_n1) && !empty($nb_anak->hutang_dagang_n1)){ 
                      $kurang = $np_anak->hutang_dagang_n1 - $nb_anak->hutang_dagang_n1;
                      if($kurang < 0){
                        echo '<td>'.number_format((-1*$kurang)).'</td><td>-</td>';
                        $kolom1 = 0.0;
                        $kolom2 = $kurang;
                        
                      $tot_d += -1 * $kolom2;
                      $tot_k += $kolom1;
                      } else{
                        echo '<td>-</td><td>'.number_format($kurang).'</td>';
                        $kolom1 = $kurang;
                        $kolom2 = 0.0;
                    $tot_d +=  $kolom2;
                      $tot_k += $kolom1;                  
                      }
                      
                    } else {
                      echo "-"; 
                    }?>
                  </tr>
                  <tr>
                    <td>Hutang Obligasi</td>

                    <?php if(!empty($np_anak->hutang_obligasi_n1) && !empty($nb_anak->hutang_obligasi_n1)){ 
                      $kurang = $np_anak->hutang_obligasi_n1 - $nb_anak->hutang_obligasi_n1;
                      if($kurang < 0){
                        echo '<td>'.number_format((-1*$kurang)).'</td><td>-</td>';
                        $kolom1 = 0.0;
                        $kolom2 = $kurang;
                    $tot_d +=  -1 * $kolom2;
                      $tot_k += $kolom1;                  

                      } else{
                        echo '<td>-</td><td>'.number_format($kurang).'</td>';
                        $kolom1 = $kurang;
                        $kolom2 = 0.0;

                    $tot_d +=  $kolom2;
                      $tot_k += $kolom1;                  

                      }
                  
                      
                    } else {
                      echo "-"; 
                    } ?>
                  </tr>
                  <tr>
                    <td>Total</td>
                    <td><?php echo number_format($tot_d) ?></td>
                    <td><?php echo number_format($tot_k) ?></td>
                  
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
            <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Jurnal Biaya</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <th>Jurnal Biaya</th>
                  <th>Debet</th>
                  <th>Kredit</th>
                </thead>
                <tbody>
                  <tr>                  
                    <td>Beban Investasi</td>
                    <td><?php if(!empty($d_ak->beban_invest)){ 
                    if($d_ak->beban_invest > 0){
                      echo number_format($d_ak->beban_invest);
                    } else{
                      echo '-';
                    }
                    } else {
                      echo "-"; 
                    } ?></td>
                    <td>-</td>
                  </tr>
                  <tr>                  
                    <td>Agio Saham</td>
                    <td><?php if(!empty($d_ak->agio_saham)){ 
                    if($d_ak->agio_saham > 0){
                      echo number_format($d_ak->agio_saham);
                    } else{
                      echo '-';
                    }
                    } else {
                      echo "-"; 
                    } ?></td>
                    <td>-</td>

                  </tr>
                  <tr>                  
                    <td>Kas</td>
                    <td>-</td>
                    
                    <td><?php if(!empty($d_ak->beban_invest) && !empty($d_ak->agio_saham)){ 
                    if($d_ak->beban_invest > 0 && $d_ak->agio_saham > 0){
                      echo number_format($d_ak->beban_invest + $d_ak->agio_saham);
                    } else{
                      echo '-';
                    }
                    } else {
                      echo "-"; 
                    } ?></td>
                  </tr>


                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Neraca Konsolidasi</div>
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
                    $kolom1 = 0;
                      $kolom1 = $nb_induk->kas_n1 - $d_ak->kas_metode - $d_ak->beban_invest - $d_ak->agio_saham;
                      echo number_format($kolom1);
                      $tot_induk += $kolom1;
                     ?></td>
                    <td><?php if(!empty($nb_anak->kas_n1)){ 
                      $kolom2 = $nb_anak->kas_n1;
                      echo number_format($kolom2);
                      $tot_anak += $kolom2;
                    } ?></td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo number_format($kolom1 + $kolom2); 
                    $tot_ns += $kolom1 + $kolom2; ?></td>
                  </tr>

                  <tr>
                    <td>Piutang - net</td>
                    <td><?php 
                    if(!empty($nb_induk->piutang_n1)) {
                      $kolom1 = $nb_induk->piutang_n1;
                      echo number_format($kolom1);
                      $tot_induk += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->piutang_n1)) {
                      $kolom2 = $nb_anak->piutang_n1;
                      echo number_format($kolom2);
                      $tot_anak += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->piutang_n1) && !empty($nb_anak->piutang_n1)){ 
                      $kurang = $np_anak->piutang_n1 - $nb_anak->piutang_n1;
                      if($kurang < 0){
                        echo '<td>-</td><td>'.number_format((-1*$kurang)).'</td>';
                        $kolom3 = 0.0;
                        $tot_kol3+=$kolom3;
                        $kolom4 = $kurang;
                        
                      } else{
                        echo '<td>'.number_format($kurang).'</td><td>-</td>';
                        $kolom3 = $kurang;
                        $tot_kol3+=$kolom3;
                        $kolom4 = 0.0;
                      }
                      $tot_kol4 += $kolom4;
                      
                    } ?>
                    <td><?php echo number_format($kolom1 + $kolom2 + $kolom3 + $kolom4);
                    $tot_ns += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                  <tr>
                    <td>Persediaan</td>
                    <td><?php 
                    if(!empty($nb_induk->persediaan_n1)) {
                      $kolom1 = $nb_induk->persediaan_n1;
                      echo number_format($kolom1);
                      $tot_induk += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->persediaan_n1)) {
                      $kolom2 = $nb_anak->persediaan_n1;
                      echo number_format($kolom2);
                      $tot_anak += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->persediaan_n1) && !empty($nb_anak->persediaan_n1)){ 
                      $kurang = $np_anak->persediaan_n1 - $nb_anak->persediaan_n1;
                      if($kurang < 0){
                        echo '<td>-</td><td>'.number_format((-1*$kurang)).'</td>';
                        $kolom3 = 0.0;
                        $tot_kol3+=$kolom3;
                        $kolom4 = $kurang;
                        
                      } else{
                        echo '<td>'.number_format($kurang).'</td><td>-</td>';
                        $kolom3 = $kurang;
                        $tot_kol3+=$kolom3;
                        $kolom4 = 0.0;
                      }
                      $tot_kol4 += $kolom4;
                      
                    } ?>
                    <td><?php echo number_format($kolom1 + $kolom2 + $kolom3 + $kolom4);
                    $tot_ns += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                  <tr>
                    <td>Perlengkapan - net</td>
                    <td><?php 
                    if(!empty($nb_induk->perlengkapan_n1)) {
                      $kolom1 = $nb_induk->perlengkapan_n1;
                      echo number_format($kolom1);
                      $tot_induk += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->perlengkapan_n1)) {
                      $kolom2 = $nb_anak->perlengkapan_n1;
                      echo number_format($kolom2);
                      $tot_anak += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->perlengkapan_n1) && !empty($nb_anak->perlengkapan_n1)){ 
                      $kurang = $np_anak->perlengkapan_n1 - $nb_anak->perlengkapan_n1;
                      if($kurang < 0){
                        echo '<td>-</td><td>'.number_format((-1*$kurang)).'</td>';
                        $kolom3 = 0.0;
                        $tot_kol3+=$kolom3;
                        $kolom4 = $kurang;
                       
                        $tot_kol4 += -1* $kolom4; 
                      } else{
                        echo '<td>'.number_format($kurang).'</td><td>-</td>';
                        $kolom3 = $kurang;
                        $tot_kol3+=$kolom3;
                        $kolom4 = 0.0;
                      }
                      
                    } ?>
                    <td><?php echo number_format($kolom1 + $kolom2 + $kolom3 + $kolom4);
                    $tot_ns += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                  <tr>
                    <td>Bangunan - net</td>
                    <td><?php 
                    if(!empty($nb_induk->bangunan_n1)) {
                      $kolom1 = $nb_induk->bangunan_n1;
                      echo number_format($kolom1);
                      $tot_induk += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->bangunan_n1)) {
                      $kolom2 = $nb_anak->bangunan_n1;
                      echo number_format($kolom2);
                      $tot_anak += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->bangunan_n1) && !empty($nb_anak->bangunan_n1)){ 
                      $kurang = $np_anak->bangunan_n1 - $nb_anak->bangunan_n1;
                      if($kurang < 0){
                        echo '<td>-</td><td>'.number_format((-1*$kurang)).'</td>';
                        $kolom3 = 0.0;
                        $tot_kol3+=$kolom3;
                        $kolom4 = $kurang;
                        
                      } else{
                        echo '<td>'.number_format($kurang).'</td><td>-</td>';
                        $kolom3 = $kurang;
                        $tot_kol3+=$kolom3;
                        $kolom4 = 0.0;
                      }
                      $tot_kol4 += $kolom4;
                      
                    } ?>
                    <td><?php echo number_format($kolom1 + $kolom2 + $kolom3 + $kolom4);
                    $tot_ns += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                  <tr>
                    <td>Tanah</td>
                    <td><?php 
                    if(!empty($nb_induk->tanah_n1)) {
                      $kolom1 = $nb_induk->tanah_n1;
                      echo number_format($kolom1);
                      $tot_induk += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->tanah_n1)) {
                      $kolom2 = $nb_anak->tanah_n1;
                      echo number_format($kolom2);
                      $tot_anak += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->tanah_n1) && !empty($nb_anak->tanah_n1)){ 
                      $kurang = $np_anak->tanah_n1 - $nb_anak->tanah_n1;
                      if($kurang < 0){
                        echo '<td>-</td><td>'.number_format((-1*$kurang)).'</td>';
                        $kolom3 = 0.0;
                        $tot_kol3+=$kolom3;
                        $kolom4 = $kurang;
                        
                      } else{
                        echo '<td>'.number_format($kurang).'</td><td>-</td>';
                        $kolom3 = $kurang;
                        $tot_kol3+=$kolom3;
                        $kolom4 = 0.0;
                      }
                      $tot_kol4 += $kolom4;
                      
                    } ?>
                    <td><?php echo number_format($kolom1 + $kolom2 + $kolom3 + $kolom4);
                    $tot_ns += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                  <tr>
                    <td>Investasi pada Anak</td>
                    <td><?php
            $invest_anak = 0;
            if(!empty($d_ak->kas_metode)){
              $invest_anak += $d_ak->kas_metode;
            } 
            if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par)){ 
              $invest_anak += ($d_ak->lembar_saham * $d_ak->nilai_par);
            }
            if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_pasar)){ 
              $invest_anak += ($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
            }

              $tot_induk += $invest_anak;
            if($invest_anak != 0){
              echo number_format($invest_anak);
            }else{ echo "-";} 
                    ?></td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php 
                                $invest_anak = 0;
            if(!empty($d_ak->kas_metode)){
              $invest_anak += $d_ak->kas_metode;
            } 
            if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par)){ 
              $invest_anak += ($d_ak->lembar_saham * $d_ak->nilai_par);
            }
            if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_pasar)){ 
              $invest_anak += ($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
            }

              $tot_kol4 += $invest_anak;
            if($invest_anak != 0){
              echo number_format($invest_anak);
            }else{ echo "-";}  

                    ?></td>
                    <td>-</td>

                  </tr>
                  <tr>
                    
                  <tr>
                    <td>Excess</td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php 
                    // if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par) && !empty($d_ak->nilai_pasar) && !empty($d_ak->kas_metode) && !empty($d_ak->persen_akuisisi) && !empty($nb_anak->saham_n1) && !empty($nb_anak->agio_saham_n1) && !empty($nb_anak->laba_ditahan_n1)){ 
                    
                    //   $excess = (($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100) - ($nb_anak->saham_n1 + $nb_anak->agio_saham_n1 + $nb_anak->laba_ditahan_n1);

                    $nilai_akuisisi2 = 0;
              if(!empty($d_ak->kas_metode)){
                $nilai_akuisisi2 += $d_ak->kas_metode;
              }
              if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_par)){
                $nilai_akuisisi2 += ($d_ak->lembar_saham * $d_ak->nilai_par);
              }
              if(!empty($d_ak->lembar_saham) && !empty($d_ak->nilai_pasar)){
                $nilai_akuisisi2 += ($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par));
              }
              if($nilai_akuisisi2 != 0 && !empty($d_ak->persen_akuisisi)){
                $nilai_akuisisi2 = $nilai_akuisisi2 /  $d_ak->persen_akuisisi * 100;
              }
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
              $excess = $nilai_akuisisi2 - $nilai_anak;
                      if($excess > 0){
                        echo number_format($excess);
                        $tot_kol3 += $excess;
                      } else{
                        echo "-";
                      }
                     ?></td>
                    <td><?php 
                    if($excess > 0){
                        echo number_format($excess);
                        $tot_kol4 += $excess;

                      } else{
                        echo "-";
                      }
                    ?></td>
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
                    <td>-</td>
                    <td>-</td>
                    <td> <?php 
          if($conclusion > 0){
            echo number_format($conclusion);
          } else{
            echo '-';
          }
             ?></td>
                    <td>-</td>
                    <td> <?php 
          if($conclusion > 0){
            echo number_format($conclusion);
            
            $tot_ns += $conclusion;
          } else{
            echo '-';
          }
             ?></td>

                  </tr>
                  <tr style="font-weight: bold">
                    <td>Total Aset</td>
                    <td><?php echo number_format($tot_induk) ?></td>
                    <td><?php echo number_format($tot_anak) ?></td>
                    <td>-</td>
                    <td>-</td>
                    <td><?php echo number_format($tot_ns) ?></td>

                  </tr>
<tr>
                    <td>Hutang Dagang</td>
                    <td><?php 
                    $tot_induk2 = 0.0;
                    $tot_anak2 = 0.0;
                    $tot_ns2 = 0.0;                
                    if(!empty($nb_induk->hutang_dagang_n1)) {
                      $kolom1 = $nb_induk->hutang_dagang_n1;
                      echo number_format($kolom1);
                      $tot_induk2 += $kolom1;
                    }

                     ?></td>
                    <td><?php if(!empty($nb_anak->hutang_dagang_n1)) {
                      $kolom2 = $nb_anak->hutang_dagang_n1;
                      echo number_format($kolom2);
                      $tot_anak2 += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->hutang_dagang_n1) && !empty($nb_anak->hutang_dagang_n1)){ 
                      $kurang = $np_anak->hutang_dagang_n1 - $nb_anak->hutang_dagang_n1;
                      if($kurang > 0){
                        echo '<td>-</td><td>'.number_format($kurang).'</td>';
                        $kolom3 = 0.0;
                        $kolom4 = $kurang;
                        
                      } else{
                        echo '<td>'.number_format((-1*$kurang)).'</td><td>-</td>';
                        $kolom3 = $kurang;
                        $kolom4 = 0.0;
                      }

                      $tot_kol3+=$kolom3;
                      $tot_kol4 += $kolom4;
                    } ?>
                    <td><?php echo number_format($kolom1 + $kolom2 + $kolom3 + $kolom4);
                    $tot_ns2 += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                <tr>
                    <td>Hutang Obligasi</td>
                    <td><?php                 
                    if(!empty($nb_induk->hutang_obligasi_n1)) {
                      $kolom1 = $nb_induk->hutang_obligasi_n1;
                      echo number_format($kolom1);
                      $tot_induk2 += $kolom1;
                    } ?></td>
                    <td><?php if(!empty($nb_anak->hutang_obligasi_n1)) {
                      $kolom2 = $nb_anak->hutang_obligasi_n1;
                      echo number_format($kolom2);
                      $tot_anak2 += $kolom2;
                    } ?></td>
                    <?php if(!empty($np_anak->hutang_obligasi_n1) && !empty($nb_anak->hutang_obligasi_n1)){ 
                      $kurang = $np_anak->hutang_obligasi_n1 - $nb_anak->hutang_obligasi_n1;
                      if($kurang > 0){
                        echo '<td>-</td><td>'.number_format($kurang).'</td>';
                        $kolom3 = 0.0;
                        $kolom4 = $kurang;
                        
                      } else{
                        echo '<td>'.number_format((-1*$kurang)).'</td><td>-</td>';
                        $kolom3 = $kurang;
                        $kolom4 = 0.0;
                      }
                      
                      $tot_kol4 += $kolom4;
                      $tot_kol3+=$kolom3;
                      
                    } ?>
                    <td><?php echo number_format($kolom1 + $kolom2 + $kolom3 + $kolom4);
                    $tot_ns2 += $kolom1+$kolom2+$kolom3+$kolom4; ?></td>
                  </tr>
                  <tr>
                    <td>Saham</td>
                    <td><?php
                    $kolom1 = $nb_induk->saham_n1 + ( $d_ak->lembar_saham * $d_ak->nilai_par);
                    echo number_format($kolom1);
                    $tot_induk2 += $kolom1;
                     ?></td>
                    <td><?php
                    $kolom2 = $nb_anak->saham_n1;
                    echo number_format($kolom2);
                    $tot_anak2 += $kolom2;
                     ?></td>
                     <td><?php
                    $kolom3 = $nb_anak->saham_n1;
                    echo number_format($kolom3);
                    $tot_kol3 += $kolom3;
                     ?></td>
                    <td>-</td>
                    <td>
                      <?php
                      $tot_ns2 += $kolom1 + $kolom2 - $kolom3;
                      echo number_format($kolom1 + $kolom2 - $kolom3);
                       ?>
                    </td>

                  </tr>
                                    <tr>
                    <td>Agio Saham</td>
                    <td><?php
                    $kolom1 = $nb_induk->agio_saham_n1 + ($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par)) - $d_ak->agio_saham;
                    echo number_format($kolom1);
                    $tot_induk2 += $kolom1;
                     ?></td>
                    <td><?php
                    $kolom2 = $nb_anak->agio_saham_n1;
                    echo number_format($kolom2);
                    $tot_anak2 += $kolom2;
                     ?></td>
                     <td><?php
                    $kolom3 = $nb_anak->agio_saham_n1;
                    echo number_format($kolom3);
                    $tot_kol3 += $kolom3;
                     ?></td>
                    <td>-</td>
                    <td>
                      <?php
                      $tot_ns2 += $kolom1 + $kolom2 - $kolom3;
                      echo number_format($kolom1 + $kolom2 - $kolom3);
                       ?>
                    </td>

                  </tr>
                                  <tr>
                    <td>Laba Ditahan</td>
                    <td><?php
                    $kolom1 = $nb_induk->laba_ditahan_n1 - $d_ak->beban_invest;
                    echo number_format($kolom1);
                    $tot_induk2 += $kolom1;
                     ?></td>
                    <td><?php
                    $kolom2 = $nb_anak->laba_ditahan_n1;
                    echo number_format($kolom2);
                    $tot_anak2 += $kolom2;
                     ?></td>
                     <td><?php
                    $kolom3 = $nb_anak->laba_ditahan_n1;
                    echo number_format($kolom3);
                    $tot_kol3 += $kolom3;
                     ?></td>
                    <td>
                      <?php 
                      if($conclusion < 0){
                        $kolom4 = $conclusion;
                      echo number_format($kolom4);

                      } else{
                        $kolom4 = 0;
                        echo "-";
                      }
                       ?>
                      
                    </td>
                    <td>
                      <?php
                      $tot_ns2 += $kolom1 + $kolom2 - $kolom3 + $kolom4;
                      echo number_format($kolom1 + $kolom2 - $kolom3 + $kolom4);
                       ?>
                    </td>

                  </tr>
                  <tr>
                    <td>Non Controlling Interest</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                      <?php
                      $kolom4 = 0;
                       
                      $kolom4 = (($d_ak->kas_metode+($d_ak->lembar_saham * $d_ak->nilai_par)+($d_ak->lembar_saham * ($d_ak->nilai_pasar - $d_ak->nilai_par))) /  $d_ak->persen_akuisisi * 100) * (100 - $d_ak->persen_akuisisi) / 100;
                      if($kolom4 == 0){
                        echo '<td>-</td><td>-</td>';
                      } else{
                      echo '<td>'.number_format($kolom4).'</td>';
                      echo '<td>'.number_format($kolom4).'</td>';
                      }
                      $tot_kol4 += $kolom4;
                      $tot_ns2 += $kolom4;
                      
                       ?>                  
                  </tr>
                  <tr style="font-weight: bold">
                    <td>Total Hutang dan Ekuitas</td>
                    <td><?php echo number_format($tot_induk2) ?></td>
                    <td><?php echo number_format($tot_anak2) ?></td>
                    <td><?php echo number_format($tot_kol3) ?></td>
                    <td><?php echo number_format($tot_kol4) ?></td>
                    
                    <td><?php echo number_format($tot_ns2) ?></td>

                  </tr>
                </tbody>
              </table>
            
          </div>
          <!-- <div class="card-footer small text-muted">text</div> -->
        </div>
        
      </div>
      <!-- /.container-fluid -->
