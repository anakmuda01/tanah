@extends('layouts.tes')

@section('content')
  <form method="POST" action="/tanah">
    {{ csrf_field() }}
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <br>
            <div class="form-group">
              <label for="no_kavling">No Kavling</label>
              @if ($errors->has('no_kavling'))
                <br>
                <span style="color:red;">{{$errors->first('no_kavling')}}</span>
              @endif
                <br>
              <input style="text-transform:uppercase"  type="text" name="no_kavling" class="form-control" id="no_kavling" placeholder="Masukkan No. Kavling.." value="{{old('no_kavling')}}">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-5">
                  <label for="panjang">Panjang (m)</label>
                  @if ($errors->has('panjang'))
                    <br>
                    <span style="color:red;">{{$errors->first('panjang')}}</span>
                  @endif
                  <input name="panjang" type="text" class="form-control" placeholder="panjang tanah..." value="{{old('panjang')}}">
                </div>
                <div class="col-5">
                  <label for="lebar">Lebar (m)</label>
                  @if ($errors->has('lebar'))
                    <br>
                    <span style="color:red;">{{$errors->first('lebar')}}</span>
                  @endif
                  <input name="lebar" type="text" class="form-control" placeholder="lebar tanah..." value="{{old('lebar')}}">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="keterangan">Keterangan</label>
                <br>
              <textarea class="form-control" name="keterangan" id="keterangan" rows="8">{{old('keterangan')}}</textarea>
            </div>
        </div>

        <div class="col-md-4">
          <br>
          <div class="form-group">
            <label for="harga_tanah">Harga</label>
            @if ($errors->has('harga_tanah'))
              <br>
              <span style="color:red;">{{$errors->first('harga_tanah')}}</span>
            @endif
            <input type="number" name="harga_tanah" class="form-control" id="harga_tanah" placeholder="Masukkan Harga..." value="{{old('harga_tanah')}}">
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            @if(session('tag_error'))
              <br>
              <span style="color:red;">{{session('tag_error')}}</span>
            @endif
            <select class="form-control" name="status[]" id="status">
              <option value="0">Pilih Status</option>
              @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->nama_tag}}</option>
              @endforeach
            </select>
          </div>
          <br>
          <button type="submit" name="submit" class="btn btn-outline-primary btn-block">SIMPAN DATA</button>
        </div>

      </div>
    </div>
  </form>
@endsection
