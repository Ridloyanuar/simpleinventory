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
                  <h3 class="mb-0">Form Pembelian</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
            
              <form action="/pembelian/store" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="pl-lg-4">
                
                  <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Supplier</label>
                        <select class="form-control form-control-alternative" name="supplier" id="supplier" required>
                        <option>pilih</option>
                          @foreach($suppliers as $supplier)
                          <option value="{{$supplier->kode_supplier}}">{{$supplier->kode_supplier}} ({{$supplier->nama_supplier}})</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- table -->
                  <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Kode Barang</th>
                      <th scope="col">Harga Satuan</th>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Sub Total</th>
                      <th scope="col"><a id="add" type="button" class="btn btn-success btn-fab btn-icon btn-round"><i class="fas fa-plus"></i></a></th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- dynamic form -->
                  </tbody>
                  </table>  
                  <!-- end table -->

                
                <hr class="my-4" />

                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Harga Total</label>
                        <input type="text" id="harga_total" name="harga_total" class="form-control form-control-alternative harga" placeholder="Harga Total" readonly required>
                      </div>
                    </div>
                  </div>

                <hr class="my-4" />
                  
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
    </div>

    <script type="text/javascript">

    var i = 0;
    $('#add').click(function(){
      
      i++;
      var html = '';
        html += '<tr>';
        html += '<td><select class="form-control item_barang" name="barang[]" data-sub_barang_id="'+i+'">';
        html += '<option value="0">pilih</option> @foreach($barangs as $barang) <option value="{{$barang->kode_barang}}">{{$barang->kode_barang}} ({{$barang->nama_barang}})</option> @endforeach';
        html += '</select></td>';
        html += '<td><input type="number" name="item_nama_barang[]" id="namaBarang'+i+'" class="form-control item_nama" readonly /></td>'
        html += '<td><input type="number" name="item_jumlah[]" data-sub_jumlah_id="'+i+'"  class="form-control item_jumlah" /></td>'
        html += '<td><input type="text" id="sub_total'+i+'" name="sub_total[]" class="form-control sub_total" readonly/></td>'
        html += '<td><a id="remove" class="btn btn-danger btn-fab btn-icon btn-round remove"><i class="fas fa-trash"></i></a></td>';
        $('tbody').append(html);
    });

    $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
      });

    $(document).on('input','.item_jumlah', function(){
        var sub_total = 0;
        var sub_jumlah_id = $(this).data('sub_jumlah_id');
        var sub_total_id = $(this).data('sub_total_id');
        var harga = $('#namaBarang'+sub_jumlah_id).val();
        var jml = $(this).val();
        sub_total = harga * jml;

        $('#sub_total'+sub_jumlah_id).val(sub_total);
    });  

    $(document).on('input','.item_jumlah', function () {
      var total = 0;
      $('.sub_total').each(function(){
          var subtot = $(this).val();
          if($.isNumeric(subtot)){
            total += parseFloat(subtot);
          }
      });

      $('#harga_total').val(total);
    });

    $(document).on('change','.item_barang', function () {

    var id = $(this).val();
    var sub_barang_id = $(this).data('sub_barang_id');
    // $('#namaBarang'+sub_barang_id).find('option').not(':first').remove();

      $.ajax({

          url:'/getBarang/'+id,
          type:'get',
          dataType:'json',
          data: {
            Type: $("#namaBarang").val(),
          },

          success:function (response) {
            
              var len = 0;

              if (response.data != null) {
                  len = response.data.length;
              }


              if (len>0) {
                  var nama = response.data[0].harga_satuan;
                  $('#namaBarang'+sub_barang_id).val(response.data[0].harga_satuan);
              }

          }
      
      });
    });
    </script>


        
@endsection