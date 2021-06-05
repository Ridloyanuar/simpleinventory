@extends('back_master')


@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Buat User Baru</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="admin/user/store" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Data Akun</h6>
                <div class="pl-lg-4">
                  <div class="row">
               
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Username</label>
                        <input type="text" id="username" name="username" class="form-control form-control-alternative" placeholder="Username" required>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Password</label>
                        <input type="password" id="password" name="password" class="form-control form-control-alternative" placeholder="Password" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" class="form-control form-control-alternative" placeholder="Jabatan" required>
                      </div>
                    </div>
                  </div>

                </div>
                <hr class="my-4" />
                <!-- Description -->
                <div class="row">
                    <div class="col-lg-12" style="text-align:right">
                      <button type="submit" name="submit" class="btn btn-primary my-4">Simpan</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
@endsection