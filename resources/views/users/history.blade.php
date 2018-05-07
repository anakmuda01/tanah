@extends('layouts.front')

@section('content')
  <div class="py-4">
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                  <div class="card-header">
                    <div class="row justify-content-between">
                      <div class="col-md-12">
                        <h2>Cek History Pembayaran Anda</h2>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-warning">
                              {{ session('status') }}
                          </div>
                      @endif
                      @if (session('msg'))
                          <div class="alert alert-success">
                              {{ session('msg') }}
                          </div>
                      @endif

                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane active" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                          <div class="container">
                            <br>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text span-input">ID KREDIT</span>
                                        </div>
                                        <input name="id_kredit" type="text" class="form-control data-user" value="{{$kredit->id_kredit}}" readonly>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text span-input">ID PEMBELI</span>
                                        </div>
                                        <input name="id_pembeli" type="text" class="form-control data-user" value="{{$kredit->pembeli->id_pembeli}}" readonly>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text span-input">Nama Pembeli</span>
                                        </div>
                                        <input name="nama_pembeli" type="text" class="form-control data-user" value="{{$kredit->pembeli->nama_pembeli}}" readonly>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="card">
                                      <div class="card-header">
                                        Tanah Kavling yang dibeli :
                                      </div>
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">No Tanah</th>
                                            <th scope="col">Harga</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($kredit->cart->cartItems as $i)
                                            <tr>
                                              <td>No. {{$i->tanah->no_kavling}}</td>
                                              <td>Rp. {{number_format($i->tanah->harga_kavling,2,',','.')}}</td>
                                            </tr>
                                          @endforeach
                                          <tr>
                                            <td>Total :</td>
                                            <td class="total-tanah">Rp. {{number_format($total,2,',','.')}}</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <hr class="garis">
                              </div>
                              <div class="col-md-12">
                                <table class="table table-striped table-responsive-sm">
                                  <thead>
                                    <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Tanggal Bayar</th>
                                      <th scope="col">Sisa Angsuran</th>
                                      <th scope="col">Sisa Cicilan</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($histories as $index => $h)
                                      <tr>
                                        <th scope="row">{{$index + $histories->firstItem()}}</th>
                                        <td>{{$h->tanggal_bayar}}</td>
                                        <td>Rp. {{number_format($h->sisa_angsuran,2,',','.')}}</td>
                                        <td>{{$h->sisa_cicilan}}</td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                                </table>
                                {{ $histories->appends(Request::except('page'))->links() }}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
  </div>

@endsection
