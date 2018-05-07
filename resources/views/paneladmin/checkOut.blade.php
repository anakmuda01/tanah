@extends('layouts.tes')

@section('content')
  <form method="POST" action="/simpan-checkout">
    {{ csrf_field() }}
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-md-6">
          <br>
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label for="id_kredit">ID Kredit</label>
                <input readonly type="text" name="id_kredit" class="form-control" id="id_kredit" value="{{$kredit->id_kredit}}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-3">
                <label for="id_pembeli">ID Pembeli</label>
                  <br>
                <input readonly type="text" name="id_pembeli" class="form-control" id="id_pembeli" value="{{$kredit->pembeli->id_pembeli}}">
              </div>
              <div class="col">
                <label for="nama_pembeli">Nama Pembeli</label>
                  <br>
                <input readonly type="text" name="nama_pembeli" class="form-control" id="nama_pembeli" value="{{$kredit->pembeli->nama_pembeli}}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="kavling_dibeli">No Tanah Kavling yang akan dibeli :</label>
            @if ($items == '')
              <br>
              <span style="color:red;">Silahkan Beli Tanah Terlebih dahulu</span>
            @endif
            <input readonly type="text" name="kavling_dibeli" class="form-control" id="kavling_dibeli"
            value="{{$items}}">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-6">
                <label for="total_harga">Total Harga</label>
                <input hidden name="total_harga" id="total_harga" type="number" class="form-control" value="{{$jumlah}}">
                <p class="duit" id="total">Rp. {{number_format($jumlah,2,",",".")}}</p>
              </div>
              <div class="col-6">
                <label for="uang_muka">Uang Muka</label>
                @if ($errors->has('uang_muka'))
                  <br>
                  <span style="color:red;">{{$errors->first('uang_muka')}}</span>
                @endif
                <input required name="uang_muka" id="uang_muka" type="number" class="form-control" placeholder="Masukkan uang muka..." value="{{old('uang_muka')}}">
              </div>
            </div>
          </div>
          <br>
        </div>
        <div class="col-md-6">
          <br>
          <div class="form-group">
            <label for="sisa_angsuran">Sisa Angsuran</label>
            <input hidden name="sisa_angsuran" id="sisa_angsuran" type="number" class="form-control" value="{{old('sisa_angsuran')}}">
            <p class="duit" id="sisa">Rp. 0</p>
          </div>
          <div class="form-group">
            <label for="lama_angsuran">Lama Angsuran</label>
            @if ($errors->has('lama_angsuran'))
              <br>
              <span style="color:red;">{{$errors->first('lama_angsuran')}}</span>
            @endif
            <input required name="lama_angsuran" id="lama_angsuran" type="number" class="form-control" value="{{old('lama_angsuran')}}">
          </div>
          <div class="form-group">
            <label for="angsuran_perbulan">Angsuran Perbulan</label>
            <input hidden name="angsuran_perbulan" id="angsuran_perbulan" type="text" class="form-control" value="">
            <p class="duit" id="angsuran">Rp. 0</p>
          </div>
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-outline-primary btn-block">SIMPAN DATA</button>
    </div>
  </form>
@endsection
