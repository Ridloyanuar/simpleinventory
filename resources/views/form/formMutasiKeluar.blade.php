@extends('back_master')
<?php
$i=1;
?>

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
                  <h3 class="mb-0">Filter Laporan Stok</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="/mutasikeluar/new" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <h6 class="heading-small text-muted mb-4">Data Laporan</h6>
                <div class="pl-lg-4">
                  <div class="row">

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Tanggal Awal</label>
                        <input type="date" id="tanggal_awal" name="tanggal_awal" class="form-control form-control-alternative" placeholder="Tanggal Awal" required>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" for="input-username">Tanggal Akhir</label>
                        <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control form-control-alternative" placeholder="Tanggal Akhir" required>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                      <label class="form-control-label" for="input-username">Barang</label>
                      <select class="form-control form-control-alternative" name="kode_barang" id="barang" required>
                        <option>pilih</option>
                          @foreach($barangs as $barang)
                          <option value="{{$barang->kode_barang}}">{{$barang->kode_barang}} ({{$barang->nama_barang}})</option>
                          @endforeach
                        </select>
                    </div>
                    </div>
                
                <hr class="my-4" />
                <!-- Description -->
                <div class="row">
                    <div class="col-lg-12" style="text-align:right">
                      <button type="submit" name="submit" class="btn btn-primary my-4">Preview & Cetak</button>
                    </div>
                </div>
              </form>

              @if($keluar==null)


              @else

              <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Kode Transaksi</th>
                    <th scope="col">Keluar</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                @foreach($keluar as $mutasi)  
                  <tr>
                    <th scope="row">
                      <?php 
                      echo $i;
                      $i++;
                      ?>
                    </th>
                    <td style="max-width:100%; overflow: hidden; white-space: normal;">
                    {{$mutasi->created_at}}   
                    </td>
                    <td>
                    {{$mutasi->kode_penjualan}}
                    </td>
                    <td>
                    {{$mutasi->jumlah}}
                    </td>
                
                  </tr>

                @endforeach     
                @endif               
                </tbody>
              </table>
            </div>
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