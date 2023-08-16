@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-light accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div ><img class="img-fluid px-5 px-sm-0 mt-3 mb-3" style="width: 50rem;"
                                            src="img/logo.png" alt="...">
                </div>
                <div class="sidebar-brand-text mx-3">Kantin IT DEL </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{asset('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="{{asset('makanan')}}">
                    <i class=""></i>
                    <span>Makanan dan Minuman</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{asset('minuman')}}">
                    <i class=""></i>
                    <span>Barang</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{asset('snack')}}">
                    <i class=""></i>
                    <span>Snack</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{asset('pulsa')}}">
                    <i class=""></i>
                    <span>Pulsa</span></a>
            </li>
           
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{asset('pemesanan')}}">
                    <i class=""></i>
                    <span>Daftar Pesanan </span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                
                    
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Pesanan</h1>
                    </div>
                    <div class="container mt-2">
        <div class="row">
        <div class="col-lg-12 margin-tb">
        <div class="pull-right">
                <a class="btn btn-primary" href="{{ asset('pemesanan') }}" enctype="multipart/form-data"> Back</a>
            </div>
            <div class="pull-left">
                
            </div>
            <div class="pull-right mb-2">
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Tanggal</th>
            <th>Banyak Barang</th>
            <th>Total Pembayaran</th>
            <th>Status</th>
            <th>Id_User</th>
            <th>Nama Pembeli</th>
            <th>NO HP</th>
            <th>Catatan</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pesanpulsa as $pesanpulsas)
        <tr>
        <td>{{ $pesanpulsas->id_pesananpulsa }}</td>
            <td>{{ $pesanpulsas->kode_transaksi }}</td>
            <td>{{ $pesanpulsas->tanggal_pemesanan_pulsa }}</td>
            <td>{{ $pesanpulsas->total_item }}</td>
            <td>{{ $pesanpulsas->total_pembayaran }}</td>
            <td>{{ $pesanpulsas->status }}</td>
            <td>{{ $pesanpulsas->id_user }}</td>
            <td>{{ $pesanpulsas->nama_penerima }}</td>
            <td>{{ $pesanpulsas->nomor_hp }}</td>
            <td>{{ $pesanpulsas->catatan }}</td>
            <td>
            <a href="/pesan/Hapus/{{$pesanpulsas->id_pesananpulsa}}" class="btn btn-danger" >Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $pesanpulsa->links() !!}

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>
@endsection
