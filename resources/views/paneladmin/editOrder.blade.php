@extends('layouts.tes')
@section('content')
    <div class="col-md-8">
      <div class="form-group">
        <label for="id_kredit">ID Kredit</label>
          <br>
        <input readonly type="text" name="id_kredit" class="form-control" id="id_kredit" value="{{$kredit->id_kredit}}">
      </div>
    </div>

    <div class="col-sm-8">
      @if (Session::has('msg'))
        <div class="alert alert-success">{{ Session::get('msg') }}</div>
      @endif
      <table class="table table-responsive-sm-8 table-striped">
        <thead>
          <tr class="d-flex">
            <th class="col">No Kavling</th>
            <th class="col">Harga</th>
            <th class="col text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kredit->cart->cartItems as $item)
            <tr class="d-flex">
              <td class="col"> {{$item->tanah->no_kavling}} </td>
              <td class="col"> {{$item->tanah->harga_kavling}} </td>
              <td class="col text-center">
                <form id="form-delete" method="POST" action="/hapus-kavling/{{$kredit->id}}/{{$item->tanah->no_kavling}}/{{$item->id}}">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                  <button id="" btn-name="" class="hapus-btn btn btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection
