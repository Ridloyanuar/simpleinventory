@extends('back_master')
<?php
$i=1;
?>

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Penjualan</h5>
                      <span class="h2 font-weight-bold mb-0">{{$penjualan_count}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Penjualan</h5>
                      <span class="h2 font-weight-bold mb-0">Rp{{$total_jual}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row">
                <div class="col-lg-6"><h3 class="mb-0">Daftar Penjualan</h3></div>
                <div class="col-lg-6" style="text-align:right;">
                    <a class="btn btn-sm btn-primary" href="/penjualan/new">tambah baru</a>
                    <input id="myInput" type="text" placeholder="Search..">
                    </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Penjualan</th>
                    <th scope="col">Tanggal Penjualan</th>
                    <th scope="col">Pelanggan</th>
                    <th scope="col">No. Handphone</th>
                    <th scope="col">Total Biaya</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                @foreach($penjualans as $penjualan)  
                  <tr>
                    <th scope="row">
                      <?php 
                      echo $i;
                      $i++;
                      ?>
                    </th>
                    <td style="max-width:100%; overflow: hidden; white-space: normal;">
                    {{$penjualan->kode_penjualan}}   
                    </td>
                    <td>
                    {{$penjualan->tanggal_penjualan}}
                    </td>
                    <td>
                    {{$penjualan->pelanggan->nama_pelanggan}}
                    </td>
                    <td>
                    {{$penjualan->pelanggan->no_telp_pelanggan}}
                    </td>
                    <td>
                    {{$penjualan->total_biaya}}
                    </td>
                
                    <td>
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-join{{$penjualan->kode_penjualan}}">view</button>

                    <div class="modal fade" id="modal-join{{$penjualan->kode_penjualan}}" tabindex="-1" role="dialog" aria-labelledby="modal-join" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-" role="document" style="max-width: 900px;">
                          <div class="modal-content bg-secondary">
                            <div class="modal-body" style="white-space: normal;">

                              <div class="card row text-left" >
                                <div class="card-horizontal" style="height: 10%;;">
                                    <div class="card-body col-lg-8 row" style="padding-top: 10px;padding-bottom: 15px; padding-right:0px;">
                                      <ul class="col-lg-7" style="padding-right: 0px;">
                                        <li style="list-style:none;font-family: Gotham Pro Bold; font-size: 15pt">
                                          Detail Penjualan
                                        </li>
                                        <li class="row" style="list-style:none;font-family: Gotham Pro Medium; padding-top:20%">
                                            <div class="col-lg-5">Kode Penjualan</div>
                                            <div class="col-lg-7">: {{$penjualan->kode_penjualan}}</div>
                                        </li>
                                        <li class="row" style="list-style:none;font-family: Gotham Pro Medium; margin-top:3%">
                                            <div class="col-lg-5">Tanggal Pembelian</div>
                                            <div class="col-lg-7">: {{$penjualan->tanggal_penjualan}}</div>
                                        </li>
                                        <li class="row" style="list-style:none;font-family: Gotham Pro Medium; margin-top:3%">
                                            <div class="col-lg-5">Total Biaya</div>
                                            <div class="col-lg-7">: {{$penjualan->total_biaya}}</div>
                                        </li>
                                        <li class="row" style="list-style:none;font-family: Gotham Pro Medium; margin-top:3%">
                                            <div class="col-lg-5">Dibuat Oleh</div>
                                            <div class="col-lg-7">: {{$penjualan->dibuat_oleh}}</div>
                                        </li>
                                        
                                        
                                      </ul>
                                      
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                          </div>
                        </div>
                    
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{$penjualan->kode_penjualan}}">delete</button>
                        <div class="modal fade" id="modal-delete{{$penjualan->kode_penjualan}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                          <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                              <div class="modal-content ">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">  
                                      <div class="py-3 text-center">
                                          <i class="ni ni-bell-55 ni-3x"></i>
                                          <h4 class="heading mt-4">apakah anda ingin benar-benar menghapus penjualan ini?</h4>
                                          <p class="mb-0"></p>{{ $penjualan->kode_penjualan }}</p>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <form action="/penjualan/delete/{{$penjualan->kode_penjualan}}" method="post">
                                          <input type="submit" name="submit" value="Delete" class="btn btn-sm btn-danger my-1">
                                            {{ csrf_field() }}
                                          <input  type="hidden" name="_method" value="DELETE">
                                        </form>
                                      <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                  </div>
                              </div>
                          </div>
                        </div>
                        
                      </div>
                    </td>
                    
                  </tr>

                @endforeach                    
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
            <nav aria-label="Page navigation example">
                  <!-- <ul class="pagination justify-content-end">
                    
                  </ul> -->
                </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Dark table -->
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