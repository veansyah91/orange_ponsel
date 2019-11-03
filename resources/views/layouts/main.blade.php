<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Orange Ponsel</title>

  <!-- Custom fonts for this template-->
  <link href="{{url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{url('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>

  <!-- Custom styles for this template-->
  @yield('css')
  <link href="{{url('css/sb-admin.css')}}" rel="stylesheet">

  {{-- TOASTR --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="/">Orange Ponsel</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </div>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0 float-right">
      @guest
          @if (Route::has('login'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fas fa-user-circle fa-fw"></i>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                      <i class="fas fa-sign-out-alt"></i>
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
          @endif
      @endguest
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href=" {{url('/')}} ">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/master')}}">
            <i class="fas fa-th-large"></i>
            <span>Master</span>
            </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-archive"></i>
            <span>Stock</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{url('/stock/input')}}">
              <i class="fas fa-sign-in-alt"></i>
              Input Stock
            </a>
            <a class="dropdown-item" href=" {{url('/stock/tersedia')}} ">
              <i class="far fa-check-circle"></i>
              Stock Tersedia
            </a>
            <a class="dropdown-item" href=" {{url('/stock/detail')}} ">
              <i class="fas fa-bars"></i>
              Detail Stock
            </a>
          </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{url('/kasir')}}">
            <i class="fas fa-cash-register"></i>
            <span>Kasir</span>
            </a>
        </li>
    </ul>

    <div id="content-wrapper">

        <!-- Page Content -->

        @yield('content')

      <!-- /.container-fluid -->

      <br>

      <!-- Sticky Footer -->
      <footer class="sticky-footer mt-3">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span> &copy; Orange Ponsel {{date('Y')}} </span>
          </div>
        </div>
      </footer>

      <!-- Footer -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Datatable for this page-->
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
  <script src="{{url('js/demo/datatables-demo.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('js/sb-admin.min.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    @if(Session::has('status'))
      toastr.success("{{Session::get('status')}}", "Berhasil")
    @endif
  </script>

  <script>
    function deleteData(id,prop,url){
      swal({
        title: "Apakah Anda Yakin Menghapus Data Ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/"+url+"/"+prop+"/"+id+"/delete";
        }
      });
    }
  </script>
  @yield('script')

</body>

</html>
