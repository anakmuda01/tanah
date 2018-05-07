<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Kwitansi</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <style>
      @media print{
        @page {
          size: landscape;
          margin: 3%;
        }
      }
      .tb1, .tb2 {
        border: 1px solid black;
      }
      #afg1-box{
        width: 18em;
      }
      #afg3-box{
        width: 25em;
      }
      #afg1 {
        font-size: 3em !important;
        font-family: 'Poppins' !important;
        color: green;
        text-decoration: underline;
      }
      #afg2 {
        font-size: 0.8em !important;
        font-family: 'Poppins', sans-serif;
        color: red;
      }
      #afg3{
        font-size: 1.2em !important;
        font-family: 'Poppins', sans-serif;
        color : red;
        font-weight: bold;
      }
      td{
        font-family: 'Poppins', sans-serif;
      }
      .tb1 th{
        padding-left: 3em;
        padding-right: 3em;
      }
      #email {
        color : red;
      }
      #web {
        color : blue;
      }
      .jumlah{
        border: 1px solid black;
        padding: 0.2em;
      }
      .tb2 {
        padding-left: 2.9425em;
        padding-right: 2.9425em;
      }
      #terbilang{
        font-style: italic;
        text-transform: uppercase;
        text-decoration: underline;
      }
      #notanah{
        padding-left:0.6em;
      }
      #kwitansi{
        font-size: 1.6em !important;
        text-decoration: underline;
      }
      .tb1, .tb2{
        font-size: 0.9em;
      }
      #tgl{
        padding-left: 1.6em;
      }
      #no-bayar{
        width: 15em;
      }
      .tb2{
        width: 800px;
      }
      .tb2{
        width: 800px;
        height: 370px;
      }
    </style>
  </head>
  <body>
    <table class="tb1">
      <tr>
        <th id="afg1-box" rowspan="8">
          <strong id="afg1">AFG</strong><br>
          <p id="afg2">Al-Fatin Group</p>
        </th>
        <th id="afg3-box" colspan="2"></th>
        <th id="no-bayar" rowspan="8">No : {{$kasir->id}}</th>
      </tr>
      <tr>
        <td colspan="2" id="afg3">Al-FATIN GROUP</td>
      </tr>
      <tr>
        <td colspan="2">Cash/Kredit Tanah Kavling</td>
      </tr>
      <tr>
        <td colspan="2">Jl. Cindai Alus Rt.08</td>
      </tr>
      <tr>
        <td>Telp</td>
        <td> : 0821 5337 3448 / 0812 5153 6100</td>
      </tr>
      <tr>
        <td>FAX</td>
        <td> : 0511 70612</td>
      </tr>
      <tr>
        <td>Email</td>
        <td id="email"> : alfathin288@yahoo.co.id</td>
      </tr>
      <tr>
        <td>Website</td>
        <td id="web"> : www.alfathin.com</td>
      </tr>
    </table>
    <table class="tb2">
      <tr>
        <th id="kwitansi" colspan="8">KWITANSI</th>
      </tr>
      <tr>
        <td colspan="2">Sudah Terima Dari</td>
        <td colspan="4">: {{$kredit->pembeli->nama_pembeli}}</td>
      </tr>
      <tr>
        <td colspan="2">Untuk Pembayaran</td>
        <td colspan="4">: Angsuran Pembayaran ke-{{$kasir->angsuran_ke}} Tanah Kavling AFG
        </td>
      </tr>
      <tr>
        <td colspan="2"></td>
        <td id="notanah" colspan="6">
          @foreach ($kredit->cart->cartItems as $wow)
            No. {{$wow->tanah->no_kavling}}
          @endforeach
        </td>
      </tr>
      <tr>
        <td colspan="2">Banyaknya Uang</td>
        <td colspan="4">: <span id="terbilang">{{$angka}} RUPIAH</span> </td>
      </tr>
      <tr>
        <td colspan="6">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="6">Pembayaran langsung ke Kantor AFG</td>
      </tr>
      <tr>
        <td colspan="5">Atau transfer ke rekening berikut :</td>
        <td></td>
        <td id="tgl" colspan="3">Cindai Alus, {{$kasir->tanggal_bayar}}</td>
      </tr>
      <tr>
        <td>BNI</td>
        <td colspan="5">: 0333 106 453</td>
      </tr>
      <tr>
        <td>BCA</td>
        <td colspan="3">: 789 5287 121</td>
        <td></td>
        <td>Yang Membayar,</td>
        <td style="width:8em;"></td>
        <td colspan="3">Yang Menerima,</td>
      </tr>
      <tr>
        <td>BRI</td>
        <td colspan="5">: 0242 01 044698 50 8</td>
      </tr>
      <tr>
        <td>Mandiri</td>
        <td colspan="3">: 900 00 3136 0549</td>
        <td></td>
        <td>( {{$kredit->pembeli->nama_pembeli}} )</td>
        <td></td>
        <td>(.........................)</td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td colspan="2">&nbsp; <strong>AN. A. MALIKI ABDUH</strong> </td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td></td>
        <td colspan="2"></td>
        <td></td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td></td>
        <td class="jumlah">JUMLAH</td>
        <td class="jumlah">Rp. {{number_format($kredit->angsuran_perbulan,2,',','.')}}</td>
      </tr>
    </table>
  </body>
</html>
