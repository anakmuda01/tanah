<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <style>
      body {
          font-family: 'Poppins', sans-serif;
          padding: 0;
          margin: 0;
      }
      table, th, td {
          border: 1px solid black;
          font-size: 1em;
      }
      th {
        color:red;
      }
      @page {
          margin-top: 2.54cm;
          margin-bottom: 2.54cm;
          margin-left: 1.5cm;
          margin-right: 1.5cm;
          header: page-header;
          footer: page-footer;
      }
      .total{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <htmlpageheader name="page-header">
    	<span>Tanggal Cetak : {DATE d/m/Y}</span>
    </htmlpageheader>
    <div class="title">
      <h3>DAFTAR DATA KREDIT AL-FATIN GRUP</h3>
    </div>
    <table>
      <thead>
        <tr>
          <th width="5%" align="center">No.</th>
          <th width="8%" align="center">ID Kredit</th>
          <th width="8%" align="center">ID Pembeli</th>
          <th width="20%" align="center">Nama Pembeli</th>
          <th width="20%" align="center">Tanah yang dibeli</th>
          <th width="20%" align="center">Sisa Angsuran</th>
          <th width="14%" align="center">Angsuran Perbulannya</th>
          <th width="5%" align="center">Sisa Cicilan</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kredits as $index => $kredit)
          <tr>
            <td align="center"> {{$index+1}} </td>
            <td align="center"> {{$kredit->id_kredit}} </td>
            <td align="center"> {{$kredit->pembeli->id_pembeli}}</td>
            <td align="center"> {{$kredit->pembeli->nama_pembeli}}</td>
            <td align="center">
              @foreach ($kredit->cart->cartItems as $wow)
               No. {{$wow->tanah->no_kavling}}
              @endforeach
            </td>
            <td align="center">
              Rp. {{number_format($kredit->sisa_angsuran,2,',','.')}}
            </td>
            <td align="center">Rp. {{number_format($kredit->angsuran_perbulan,2,',','.')}}</td>
            <td align="center">{{$kredit->lama_angsuran}}</td>
          </tr>
        @endforeach
      </tbody>
      </table>
      <htmlpagefooter name="page-footer">
        <div class="total">
          Total data keseluruhan : {{count($kredits)}}
        </div>
      	<span>hal. {PAGENO}</span>
      </htmlpagefooter>
  </body>
</html>
