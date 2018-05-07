@extends('layouts.tes')

@section('content')

  <div class="col-md-12">
    @if (Session::has('msg'))
      <div class="alert alert-success">{{ Session::get('msg') }}</div>
    @endif
    <table class="table table-responsive-sm-12 table-striped">
      <thead>
        <tr class="d-flex">
          <th class="col-sm-2">No Kavling</th>
          <th class="col-sm-2">Ukuran</th>
          <th class="col-sm-3">Harga</th>
          <th class="col-sm-2">Status</th>
          <th class="col-sm-3 text-center">Action</th>
        </tr>
      </thead>
    <tbody>
      @foreach ($tanahs as $tanah)
        <tr class="d-flex">
          <td class="col-sm-2"> {{$tanah->no_kavling}} </td>
          <td class="col-sm-2"> {{$tanah->panjang.'m x '.$tanah->lebar.'m'}} </td>
          <td class="col-sm-3"> Rp. {{number_format($tanah->harga_kavling,2,',','.')}}</td>
          <td class="col-sm-2">
            @foreach ($tanah->tags as $tag)
              @if ($tag->nama_tag == "Terjual")
                <span style="color:red;"><strong>{{$tag->nama_tag}}</strong></span>
              @else
                <span style="color:green;"><strong>{{$tag->nama_tag}}</strong></span>
              @endif
            @endforeach
          </td>
          <td class="col-sm-1"><a href="/tanah/{{$tanah->id}}"class="btn btn-primary btn-block" role="button" aria-pressed="true">Lihat</a></td>
          <td class="col-sm-1"><a href="/tanah/{{$tanah->id}}/edit" class="btn btn-warning btn-block" role="button" aria-pressed="true">Edit</a></td>
          <td class="col-sm-1">
            <form id="form-delete{{$tanah->id}}" method="POST" action="/tanah/{{$tanah->id}}">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="DELETE">
              <button gol="Tanah no Kavling" id="{{$tanah->id}}" btn-name="{{$tanah->no_kavling}}" class="hapus-btn btn btn-danger hapus-btn">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
  <div class="col-md-12">
    {{ $tanahs->links() }}
  </div>
@endsection
