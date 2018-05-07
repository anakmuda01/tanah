@extends('layouts.tes')

@section('content')

          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link" href="/pembeli">Data Pembeli</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="/pembeli/create">Tambah Data</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <form method="POST" action="/pembeli/{{$pembeli->id}}">
            {{ csrf_field() }}
            <div class="container">
              <div class="row justify-content-between">

                <div class="col-md-8">
                  <br>
                    <div class="form-group">
                      <label for="id_pembeli">ID Pembeli</label>
                        <br>
                      <input style="text-transform:uppercase"  type="text" name="id_pembeli" class="form-control" id="id_pembeli" value="{{$pembeli->id_pembeli}}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="nama_pembeli">Nama Pembeli</label>
                      @if ($errors->has('nama_pembeli'))
                        <br>
                        <span style="color:red;">{{$errors->first('nama_pembeli')}}</span>
                      @endif
                        <br>
                      <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli" placeholder="Masukkan Nama..." value="{{(old('nama_pembeli')) ? old('nama_pembeli') : $pembeli->nama_pembeli}}">
                    </div>
                    <div class="form-group">
                      <label for="alamat_pembeli">Alamat</label>
                      @if ($errors->has('alamat_pembeli'))
                        <br>
                        <span style="color:red;">{{$errors->first('alamat_pembeli')}}</span>
                      @endif
                        <br>
                      <textarea class="form-control" name="alamat_pembeli" id="alamat_pembeli" rows="17">{{(old('alamat_pembeli')) ? old('alamat_pembeli') : $pembeli->alamat_pembeli}}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                  <br>
                  <div class="form-group">
                    <label for="no_telpon">No Telpon/HP</label>
                    @if ($errors->has('no_telpon'))
                      <br>
                      <span style="color:red;">{{$errors->first('no_telpon')}}</span>
                    @endif
                    <input type="number" name="no_telpon" class="form-control" id="no_telpon" placeholder="Masukkan Nomor..." value="{{(old('no_telpon')) ? old('no_telpon') : $pembeli->no_telpon}}">
                  </div>
                  <div class="form-group">
                    <label for="thumbnail">Foto</label>
                    @if ($errors->has('foto'))
                      <br>
                      <span style="color:red;">{{$errors->first('foto')}}</span>
                    @endif
                    <div class="input-group">
                      <span class="input-group-btn">
                        <a id="lfm1" data-input="thumbnail" data-preview="holder" class="btn btn-outline-primary">
                          <i class="fa fa-picture-o"></i> Choose
                        </a>
                      </span>
                      <input id="thumbnail" class="form-control" type="text" name="foto" value="{{old('foto')}}" readonly>
                    </div>
                  </div>
                  <div class="row justify-content-md-center">
                    <div class="col-md-9">
                      <div class="featured_img_holder">
                        <img alt="{{old('foto')}}" src="{{old('foto')}}" id="holder" style="margin-top:15px;min-height:170px;max-height:170px; max-width:245px">
                      </div>
                    </div>
                  </div>
                  <br>
                  <input type="hidden" name="_method" value="PUT">
                  <button type="submit" name="submit" class="btn btn-outline-primary btn-block">UPDATE DATA</button>
                </div>

              </div>
            </div>
          </form>

@endsection
