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
                  <h3 class="mb-0">Edit Pelanggan</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
            
            @foreach($pelanggans as $pelanggan)
              <form action="/pelanggan/update/{{$pelanggan->id}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="pl-lg-4">
              
                <div class="row">

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Nama Pelanggan</label>
                        <input type="text" id="nama_lengkap" value="{{$pelanggan->nama_pelanggan}}" name="nama_lengkap" class="form-control form-control-alternative" placeholder="masukan nama supplier" required>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label" for="input-username">No Telp</label>
                        <input type="number" id="no_telp" value="{{$pelanggan->no_telp_pelanggan}}" name="no_telp" class="form-control form-control-alternative" placeholder="No Telp" required>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control form-control-alternative" placeholder="Alamat" required>{{$pelanggan->alamat_pelanggan}}</textarea>
                      </div>
                    </div>
                  </div>
                  </div>
             
                <hr class="my-4" />
                <div class="row">
                    <div class="col-lg-6 my-4" style="text-align:left">
                      <a class="my-4" href="#" data-toggle="modal" data-target="#Informasi">
                        informasi*
                      </a>
                    </div>
                    <div class="col-lg-6" style="text-align:right">
                    <input type="submit" name="submit" value="edit" class="btn btn-primary my-1">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="PUT">
                    </div>  
                </div>
              </form>
              @endforeach
            </div>
          </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
    </div>
    
@endsection