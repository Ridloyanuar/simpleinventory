<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    SayurSembalun - Panel Admin
  </title>
  <!-- Favicon -->
  <link href="/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



  <!-- Icons -->
  <link href="/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="/css/style.css" rel="stylesheet" />
  
  <link href="/css/gotham-pro.css" rel="stylesheet" />
  <link href="/css/argon-dashboard.css?v=1.1.1" rel="stylesheet" />
  
  <style>
  h1{
    color: #0C0C0C;
  }
  .card-horizontal {
  display: flex;
  flex: 1 1 auto;
  }

    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

</style>
</head>
<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href=" ">
        <img src="/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{url('img/theme/team-4-800x800.jpg')  }}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="">
                <img src="{{url('/img/brand/blue.png')  }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="">
              <i class="ni ni-tv-2 text-primary"></i> Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./examples/icons.html">
              <i class="ni ni-planet text-blue"></i> Form Master
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="/user/new" style="padding-left:15%;">
            <i class="fas fa-user" class="ni text-blue"></i> User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="/pelanggan/new" style="padding-left:15%;">
            <i class="fas fa-user" class="ni text-blue"></i> Pelanggan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="/supplier/new" style="padding-left:15%;">
            <i class="fas fa-user" class="ni text-blue"></i> Supplier
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link  " href="/barang/new" style="padding-left:15%;">
            <i class="fas fa-tags" class="ni text-blue"></i> Barang
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link " href="./examples/icons.html">
              <i class="ni ni-planet text-blue"></i> Data
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="/user/all" style="padding-left:15%;">
            <i class="fas fa-user" class="ni text-blue"></i> User
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="/pelanggan/all" style="padding-left:15%;">
            <i class="fas fa-user" class="ni text-blue"></i> Pelanggan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="/supplier/all" style="padding-left:15%;">
            <i class="fas fa-user" class="ni text-blue"></i> Supplier
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link  " href="/barang/all" style="padding-left:15%;">
            <i class="fas fa-tags" class="ni text-blue"></i> Barang
            </a>
          </li>  
          <li class="nav-item">
            <a class="nav-link " href="./examples/icons.html">
              <i class="ni ni-planet text-blue"></i> Transaksi
            </a>
          </li>    
          <li class="nav-item">
            <a class="nav-link  " href="/pembelian/all" style="padding-left:15%;">
            <i class="fas fa-shopping-cart" class="ni text-blue"></i> Pembelian
            </a>
          </li>     
          <li class="nav-item">
            <a class="nav-link  " href="/penjualan/all" style="padding-left:15%;">
            <i class="fas fa-shopping-cart" class="ni text-blue"></i> Penjualan
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link " href="./examples/icons.html">
              <i class="ni ni-planet text-blue"></i> Laporan
            </a>
          </li>    
          <li class="nav-item">
            <a class="nav-link  " href="/mutasi/new" style="padding-left:15%;">
            <i class="fas fa-history" class="ni text-blue"></i> Laporan Mutasi Stok Masuk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  " href="/mutasikeluar/new" style="padding-left:15%;">
            <i class="fas fa-history" class="ni text-blue"></i> Laporan Mutasi Stok Keluar
            </a>
          </li>    
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Dashboard (Admin)</a>
        
        <!-- Form -->

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
              <div class="media align-items-center">
                
                <div class="media-body ml-2 d-none d-lg-block">
                  <a href="/logout" class="mb-0 text-white d-none d-lg-inline-block">Logout</a>
                </div>
              </div>            
        </ul>
      </div>
    </nav>


    <!-- End Navbar -->
    <!-- Header -->
    @yield('content')

  </div>
 

  <!--   Core   -->
  <script src="/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="/js/argon-dashboard.min.js?v=1.1.1"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  
  <script>
    
     window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });

    var msg = '{{Session::get('+alert+')}}';
    var exist = '{{Session::has('+alert+')}}';
    if(exist){
      alert(msg);
    }
      
  $("#nameid").select2({
            placeholder: "masukan nama pemilik",
            allowClear: true
        });
        
        $("#sel_user").select2({
            placeholder: "masukan nama user",
            allowClear: true
        });

    function scrollToDownload() {

    if ($('.section-download').length != 0) {
      $("html, body").animate({
        scrollTop: $('.section-download').offset().top
      }, 1000);
    }
    }
      
      $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
  



</body>

</html>