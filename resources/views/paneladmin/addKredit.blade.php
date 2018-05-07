@extends('layouts.tes')

@section('content')
  <form method="POST" action="/order">
    {{ csrf_field() }}
    <div class="container">
      <div class="row justify-content-between">

        <div class="col-md-8">
          <br>
            <div class="form-group">
              <label for="id_pembeli">ID Pembeli</label>
              @if ($errors->has('id_pembeli'))
                <br>
                <span style="color:red;">{{$errors->first('id_pembeli')}}</span>
              @endif
                <br>
              <input type="text" name="id_pembeli" class="form-control" id="id_pembeli" placeholder="Masukkan Id Pembeli..." value="{{old('id_pembeli')}}">
            </div>
            <div class="form-group">
              <label for="id_kredit">ID Kredit</label>
              @if ($errors->has('id_kredit'))
                <br>
                <span style="color:red;">{{$errors->first('id_kredit')}}</span>
              @endif
                <br>
              <input type="text" name="id_kredit" class="form-control" id="id_kredit" placeholder="Masukkan Id Kredit..." value="{{old('id_kedit')}}">
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-outline-primary btn-block">SIMPAN DATA</button>
        </div>

      </div>
    </div>
  </form>
@endsection
