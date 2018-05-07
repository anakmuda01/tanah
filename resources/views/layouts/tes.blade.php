<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/tanah.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tanah.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Sidebar Holder -->
  <nav id="sidebar">
        <div class="sidebar-header">
             <h3><a href="/">AL-FATIN GROUP</a></h3>
             <strong><a href="/">AFG</a></strong>
         </div>


      <ul class="list-unstyled components">
          <li class="active">
              <a href="/admin"><i class="fa fa-columns"></i> Dashboard</a>
          </li>
          <li>
              <a href="#tanah" data-toggle="collapse" aria-expanded="false">
                <i class="fa fa-road"></i>
                Tanah
              </a>
              <ul class="collapse list-unstyled" id="tanah">
                  <li><a href="/tanah">Data Tanah</a></li>
                  <li><a href="/tanah/create">Tambah Data</a></li>
              </ul>
          </li>
          <li>
              <a href="#pembeli" data-toggle="collapse" aria-expanded="false">
                <i class="fa fa-user-circle"></i>
                Pembeli
              </a>
              <ul class="collapse list-unstyled" id="pembeli">
                  <li><a href="/pembeli">Data Pembeli</a></li>
                  <li><a href="/pembeli/create">Tambah Data</a></li>
              </ul>
          </li>
          <li>
              <a href="#order" data-toggle="collapse" aria-expanded="false">
                <i class="fa fa-shopping-cart"></i>
                Order
              </a>
              <ul class="collapse list-unstyled" id="order">
                  <li><a href="/order">Data Order</a></li>
                  <li><a href="/order/create">Kredit Baru</a></li>
              </ul>
          </li>
          <li>
              <a href="#"><i class="fa fa-cog"></i> Config</a>
          </li>
      </ul>

      <ul class="list-unstyled CTAs">
        <li>
            <a href="#" class="about"><i class="fa fa-cube"></i> About Aplikasi</a>
        </li>
      </ul>
  </nav>

   <!-- Page Content Holder -->
   <div id="content">

     <nav class="navbar navbar-expand">
         <div class="container-fluid">

             <div class="navbar-header">
                 <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                     <i class="fa fa-bars"></i>
                     <span>Toggle Sidebar</span>
                 </button>
             </div>

             <div class="collapse navbar-collapse">
                 <ul class="navbar-nav ml-auto">
                     <li class="nav-item active">
                       <a class="btn btn-success" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                           {{ __('Logout') }}
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           @csrf
                       </form>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>

  @yield('content')
</div>

{{-- <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> --}}
<script src="{{ asset('js/sweetalert.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
        $('.collapse.show').toggleClass('show');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

    $('.hapus-btn').on('click', function(e){
        e.preventDefault();
        var judul = $(this).attr('btn-name');
        var idbtn = $(this).attr('id');
        var gol = $(this).attr('gol');
        swal({
          title: "HAPUS DATA dari <br>"+gol+" <span class='judul-hps'>"+judul+"</span> ?",
          html: '<p class="psn-warning">Data yang telah dihapus tidak bisa dikembalikan lagi ...</p>',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, hapus data!',
          cancelButtonText: 'No, gak jadi!',
          confirmButtonClass: 'btn btn-danger tombol-hps btn-lg',
          cancelButtonClass: 'btn btn-success',
          buttonsStyling: false,
          focusConfirm: false,
          reverseButtons: true
        }).then((result) => {
          if (result.value) {
            swal(
              'Terhapus!',
              'Data dari <span class="judul-hps">'+judul+'</span> telah dihapus.',
              'success'
            ).then((result) => {
              if (result.value){
                $('#form-delete'+idbtn).submit();
              }else{
                $('#form-delete'+idbtn).submit();
              }
            })
          } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
          ) {
            swal(
              'Gak jadi dihapus~',
              '',
              'error'
            )
          }
        })
    });

  });
</script>

</body>
</html>
