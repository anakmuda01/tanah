@extends('layouts.tes')

@section('content')
  <div class="col-md-12">
    @if (Session::has('msg'))
      <div class="alert alert-success">{{ Session::get('msg') }}</div>
    @endif
    <table class="table table-responsive-sm-12 table-striped">
      <thead>
        <tr class="d-flex">
          <th class="col-sm-1">ID Kredit</th>
          <th class="col-sm-1">ID Pembeli</th>
          <th class="col-sm-2">Nama Pembeli</th>
          <th class="col-sm-2">Tanah yang dibeli</th>
          <th class="col-sm-6 text-center">Action</th>
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
          <td class="col-sm-1"> {{$kredit->pembeli->id_pembeli}} </td>
          <td class="col-sm-2"> {{$kredit->pembeli->nama_pembeli}}</td>
          <th class="col-sm-2">
            {{-- {{dd($kredit->cart->cartItems)}} --}}
            @foreach ($kredit->cart->cartItems as $wow)
              No. {{$wow->tanah->no_kavling}} <br>
            @endforeach
          </th>
          <td class="col-sm-2">
            <a href="/check-out/{{$kredit->id}}" class="btn btn-success btn-block" role="button" aria-pressed="true">Check Out</a>
          </td>
          <td class="col-sm-2"><a href="/beli-tanah/{{$kredit->id}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">Beli Tanah</a></td>
          <td class="col-sm-1"><a href="/order/{{$kredit->id}}/edit" class="btn btn-warning btn-block" role="button" aria-pressed="true">Edit</a></td>
          <td class="col-sm-1">
            <form id="form-delete{{$kredit->id}}" method="POST" action="/order/{{$kredit->id}}">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="DELETE">
              <button gol="Order ID" id="{{$kredit->id}}" btn-name="{{$kredit->id_kredit}} | {{$kredit->pembeli->id_pembeli}} {{$kredit->pembeli->nama_pembeli}}" class="hapus-btn btn btn-danger">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  <div class="col-md-12">
    {{ $kredits->links() }}
  </div>
@endsection
