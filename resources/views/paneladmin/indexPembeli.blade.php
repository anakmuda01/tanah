@extends('layouts.tes')

@section('content')

  <div class="col-md-12">
    <table class="table table-responsive-sm-12 table-striped">
      @if (Session::has('msg'))
        <div class="alert alert-success">{{ Session::get('msg') }}</div>
      @endif
      <thead>
        <tr class="d-flex">
          <th class="col-sm-2">ID Pembeli</th>
          <th class="col-sm-4">Nama Pemebeli</th>
          <th class="col-sm-3">No Telpon/HP</th>
          <th class="col-sm-3 text-center">Action</th>
        </tr>
      </thead>
    <tbody>
      @foreach ($pembelis as $p)

        <tr class="d-flex">
          <td class="col-sm-2"> {{$p->id_pembeli}}</td>
          <td class="col-sm-4"> {{$p->nama_pembeli}} </td>
          <td class="col-sm-3"> {{$p->no_telpon}} </td>
          <td class="col-sm-1"><a href="#" target="_blank" class="btn btn-primary btn-block" role="button" aria-pressed="true">Lihat</a></td>
          <td class="col-sm-1"><a href="/pembeli/{{$p->id}}/edit" class="btn btn-warning btn-block" role="button" aria-pressed="true">Edit</a></td>
          <td class="col-sm-1">
            <form id="form-delete{{$p->id}}" method="POST" action="/pembeli/{{$p->id}}">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="DELETE">
              <button gol="Pembeli ID" id="{{$p->id}}" btn-name="{{$p->id_pembeli}} {{$p->nama_pembeli}}" class="hapus-btn btn btn-danger hapus-btn">Hapus</button>
            </form>
          </td>
        </tr>

      @endforeach
    </tbody>
  </table>
  </div>
  <div class="col-md-12">
    {{ $pembelis->links() }}
  </div>

@endsection
