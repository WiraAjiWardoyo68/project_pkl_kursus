<div class="col-6 col-lg-3">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$cProg}}</h3>
                  <p>Program Kursus</p>
                </div>
                <div class="icon">
                  <i class="fas fa-book"></i>
                </div>
                <a href="{{route('program.index')}}" class="small-box-footer">
                  Kelola <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$cIns}}</h3>
                  <p>Instruktur</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="{{route('user.index')}}" class="small-box-footer">
                  Kelola <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$cPst}}</h3>
                  <p>Peserta</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-graduate"></i>
                </div>
                <a href="{{route('peserta.index')}}" class="small-box-footer">
                  Kelola <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$cKs}}</h3>
                  <p>Kursus</p>
                </div>
                <div class="icon">
                  <i class="fas fa-book-reader"></i>
                </div>
                <a href="{{route('kursus.index')}}" class="small-box-footer">
                  Kelola <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
          </div>
         
          
          <div class="col-12 col-md-6">
            <!-- Bar chart -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Grafik Peserta Kursus Lulus
                </h3>
              </div>
              <div class="card-body">
                <div id="bar-chart" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-12 col-md-6">
          		<!-- Donut chart -->
            <div class="card card-dark card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  	Grafik Gender Peserta Kursus
                </h3>
              </div>
              <div class="card-body">
                <div id="donut-chart" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
          </div>