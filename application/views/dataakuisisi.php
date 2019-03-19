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
            <p>Induk : PT INDUK <input type="text" name="induk"></p> 
            <p>Anak : PT ANAK <input type="text" name="anak"></p>
            <p>Tanggal Akusisi : 01-Jan-19 <input type="date" name="tanggal_akusisi"></p>
            <p>Persentase Akusisi (% ): 60% <input type="number" name="persentase_akusisi"></p>
          </div>
        </div>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Metode Akusisi</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Kas (Rp)</th>
                    <th>Lembar Saham</th>
                    <th>Nilai Par/Lembar (Rp)</th>
                    <th>Nilai Pasar/Lembar (Rp)</th>
                    
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Kas (Rp)</th>
                    <th>Lembar Saham</th>
                    <th>Nilai Par/Lembar (Rp)</th>
                    <th>Nilai Pasar/Lembar (Rp)</th>
                    
                  </tr>
                </tfoot>
                <tbody>
                  <tr>
                    <td>5.200.000</td>
                    <td>100.000</td>
                    <td>10</td>
                    <td>50</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Nilai Akusisi</div>
          <div class="card-body">
            <p>Kas : 5.200.000</p> 
            <p>Saham : 1.000.000</p>
            <p>Agio Saham : 4.000.000</p>
            <p>Investasi pada Anak : 10.200.000 </p>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Beban Biaya</div>
          <div class="card-body">
            <p>Biaya Akusisi yang dibayar Tunai dibebankan ke : </p> 
            <p>Beban Investasi : 200.000 <input type="number" name="beban_investasi"></p>
            <p>Agio Saham : 500.000 <input type="number" name="agio_saham"></p>
          </div>
        </div>
        <p class="small text-center text-muted my-5">
          <em>By : Reissa</em>
        </p>

      </div>
      <!-- /.container-fluid -->
