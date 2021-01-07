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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Supplier</h5>
                      <span class="h2 font-weight-bold mb-0">{{$supplier_count}}</span>
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
                <div class="col-lg-6"><h3 class="mb-0">Daftar Supplier</h3></div>
                <div class="col-lg-6" style="text-align:right;">
                    <input id="myInput" type="text" placeholder="Search..">
                    </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Supplier</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No. Telp</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="myTable">
                @foreach($suppliers as $supplier)  
                  <tr>
                    <th scope="row">
                      <?php 
                      echo $i;
                      $i++;
                      ?>
                    </th>
                    <td style="max-width:100%; overflow: hidden; white-space: normal;">
                    {{$supplier->kode_supplier}}   
                    </td>
                    <td>
                    {{$supplier->nama_supplier}}
                    </td>
                    <td>
                    {{$supplier->no_telp_supplier}}
                    </td>
                    <td>
                    {{$supplier->alamat_supplier}}
                    </td>
                
                    <td>
                    
                         <a class="btn btn-sm btn-warning" href="/supplier/edit/{{$supplier->id}}">edit</a>

                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete{{$supplier->id}}">delete</button>
                        <div class="modal fade" id="modal-delete{{$supplier->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
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
                                          <h4 class="heading mt-4">apakah anda ingin benar-benar menghapus supplier ini?</h4>
                                          <p class="mb-0"></p>{{ $supplier->nama_supplier }}</p>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <form action="/supplier/delete/{{$supplier->id}}" method="post">
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