@extends('layouts.tes')

@section('content')

             <div class="container-fluid">
               <div class="row">
                 <div class="col-md-12">
                   <h1>Dashboard</h1>
                   <div class="row justify-bettwen">
                     <div class="col-md-6">
                       <form method="GET" action="/admin" class="form-inline d-flex mx-auto caribox">
                         <input name="cari" class="form-control mr-sm-2" type="text" placeholder="Masukkan ID Kredit..." aria-label="Search">
                         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                       </form>
                     </div>
                     <div class="col-md-6">
                       <a href="/cetak-dashboard" target="_blank" class="btn btn-primary"><i class="fa fa-print"> Cetak</i></a>
                     </div>
                   </div>
                 </div>
                 <div class="col-md-12">
                   <br>
                     <table class="table table-responsive-sm-12 table-striped">
                       @if (Session::has('msg'))
                         <div class="alert alert-success">{{ Session::get('msg') }}</div>
                       @endif
                       <thead>
                         <tr class="d-flex header-list">
                           <th class="col-sm-1">ID Kredit</th>
                           <th class="col-sm-1">ID Pembeli</th>
                           <th class="col-sm-2">Nama Pembeli</th>
                           <th class="col-sm-2">Tanah yang dibeli</th>
                           <th class="col-sm-2">Sisa Angsuran</th>
                           <th class="col-sm-2">Angsuran Perbulannya</th>
                           <th class="col-sm-1">Sisa Lama Angsuran</th>
                           <th class="col-sm-1 text-center">Action</th>
                         </tr>
                       </thead>
                     <tbody>
                       @if ($kredits->count() == 0)
                         <tr>
                           <td>Belum ada data ....</td>
                         </tr>
                       @endif
                       @foreach ($kredits as $kredit)
                         <tr class="d-flex">
                           <td class="col-sm-1"> {{$kredit->id_kredit}} </td>
                           <td class="col-sm-1"> {{$kredit->pembeli->id_pembeli}}</td>
                           <td class="col-sm-2"> {{$kredit->pembeli->nama_pembeli}}</td>
                           <th class="col-sm-2 th-list-tanah">
                             @foreach ($kredit->cart->cartItems as $wow)
                              No. {{$wow->tanah->no_kavling}}
                             @endforeach
                           </th>
                           <td class="col-sm-2">
                             Rp. {{number_format($kredit->sisa_angsuran,2,',','.')}}
                           </td>
                           <td class="col-sm-2">Rp. {{number_format($kredit->angsuran_perbulan,2,',','.')}}</td>
                           <td class="col-sm-1">{{$kredit->lama_angsuran}}</td>
                           <td class="col-sm-1">
                             <form id="form-delete{{$kredit->id}}" method="POST" action="/admin/{{$kredit->id}}">
                               {{ csrf_field() }}
                               <input type="hidden" name="_method" value="DELETE">
                               <button gol="Kredit" id="{{$kredit->id}}" btn-name="{{$kredit->id_kredit}} | {{$kredit->pembeli->nama_pembeli}} ({{$kredit->pembeli->id_pembeli}})" class="hapus-btn btn btn-danger">Hapus</button>
                             </form>
                           </td>
                         </tr>
                       @endforeach
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
             <div class="col-md-12">
               {{ $kredits->links() }}
             </div>

@endsection
