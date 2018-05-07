@extends('layouts.tes')

@section('content')
  <form method="POST" action="/order/additems">
    {{ csrf_field() }}
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-md-8">
          <br>
            <div class="form-group">
              <label for="id_kredit">ID Kredit</label>
              @if ($errors->has('id_kredit'))
                <br>
                <span style="color:red;">{{$errors->first('id_kredit')}}</span>
              @endif
                <br>
              <input readonly type="text" name="id_kredit" class="form-control" id="id_kredit" value="{{$kredit->id_kredit}}">
            </div>
            <div class="form-group">
              <label for="no_kavling">Pilih Tanah Kavling</label>
              @if(session('tag_error'))
                <br>
                <span style="color:red;">{{session('tag_error')}}</span>
              @endif
              <select class="form-control" name="kavling[]" id="status">
                <option value="0">Pilih Tanah Kavling yang akan dibeli</option>
                @foreach ($tanahs as $tanah)
                  <option value="{{$tanah->no_kavling}}">No Kavling : {{$tanah->no_kavling}} Harga : Rp. {{number_format($tanah->harga_kavling,2,",",".")}}</option>
                @endforeach
              </select>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-outline-primary btn-block">Masukkan Ke Keranjang</button>
        </div>

      </div>
    </div>
  </form>
@endsection
