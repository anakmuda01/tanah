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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-datepicker.id.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/kasir.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

</head>
<body>
    <div id="app">
        <main class="py-4">
          <div class="container">
              <div class="row mt-2">
                  <div class="col-md-8 offset-md-2">
                      <div class="card">
                        <div class="card-header">
                          <div class="row justify-content-between">
                            <div class="col-md-4">
                              <h2>KASIR</h2>
                            </div>
                            <div class="col-md-2">
                              <a class="btn btn-success" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                            </div>
                          </div>
                        </div>

                          <div class="card-body">
                              @if (session('status'))
                                  <div class="alert alert-warning">
                                      {{ session('status') }}
                                  </div>
                              @endif
                              @if (session('msg'))
                                  <div class="alert alert-success">
                                      {{ session('msg') }}
                                  </div>
                              @endif
            @yield('content')
        </main>
    </div>

<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function () {
     $('.datepicker').datepicker({
         format: 'd MM yyyy',
         language: 'id'
     })

     $('#sidebarCollapse').on('click', function () {
         $('#sidebar').toggleClass('active');
         $('#content').toggleClass('active');
         $('.collapse.show').toggleClass('show');
         $('a[aria-expanded=true]').attr('aria-expanded', 'false');
     });

     $('.bayar-btn').on('click', function(e){
         e.preventDefault();
         var tanggal = $('.datepicker').val();
         if(tanggal == ''){
           alert("Masukkan Tanggal Pembayaranya~");
         }else{
           var idk = $(this).attr('idk');
           var idp = $(this).attr('idp');
           var np = $(this).attr('np');
           var tgl = tanggal;
           swal({
             title: "Anda yakin ingin melanjutkan proses pembayaran dari <br> ID <span class='judul-bayar'>"+idk+"</span> atas nama <span class='judul-bayar'>"+np+" ("+idp+")</span> untuk pembayaran pada tanggal <br> <span class='judul-bayar'>"+tgl+"</span>   ?",
             html: '<p class="psn-warning">Proses yang sudah dilakukan tidak dapat dikembalikan lagi...</p>',
             type: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes, Saya Yakin!',
             cancelButtonText: 'No, gak jadi!',
             confirmButtonClass: 'btn btn-danger tombol-hps btn-lg',
             cancelButtonClass: 'btn btn-success',
             buttonsStyling: false,
             focusConfirm: false,
             reverseButtons: true
           }).then((result) => {
             if (result.value) {
               swal(
                 'Sukses!',
                 'Proses pembayaran dari ID <span class="judul-bayar">'+idk+'</span> telah berhasil diproses.',
                 'success'
               ).then((result) => {
                 if (result.value){
                   $('#form-bayar').submit();
                 }else{
                   $('#form-bayar').submit();
                 }
               })
             } else if (
               // Read more about handling dismissals
               result.dismiss === swal.DismissReason.cancel
             ) {
               swal(
                 'Oke Cek Lagi Datanya ya~',
                 '',
                 'error'
               )
             }
           })
         }
     });
  });
</script>
</body>
</html>
