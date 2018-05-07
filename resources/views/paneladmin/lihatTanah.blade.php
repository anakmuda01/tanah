@extends('layouts.tes')

@section('content')
  <div class="card" style="width: 50rem;">
    <div class="card-header">
      Data dari Tanah No Kavling : <span class="data-tanah">{{$tanah->no_kavling}}</span>
    </div>
    <ul class="list-group list-group-flush">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Ukuran</th>
            <th scope="col">Harga</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$tanah->panjang}}m x {{$tanah->lebar}}m</td>
            <td>Rp. {{number_format($tanah->harga_kavling,2,',','.')}}</td>
          </tr>
        </tbody>
      </table>
    </ul>
    <div class="card-header">
      Keterangan
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        {{$tanah->keterangan}}
      </li>
    </ul>
</div>
@endsection
