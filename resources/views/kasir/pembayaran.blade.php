@extends('layouts.kasir')

@section('content')
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a href="/kasir" class="nav-link">Cari ID Kredit</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="#">Pembayaran</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="/histori/{{$kredit->id}}">Histori Pembayaran</a>
                        </li>
                      </ul>

                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                          <form id="form-bayar" method="POST" action="/kasir">
                            {{ csrf_field() }}
                            <div class="container">
                              <br>
                              <div class="row justify-content-between">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text span-input">ID KREDIT</span>
                                      </div>
                                      <input name="id_kredit" type="text" class="form-control id-kredit" value="{{$kredit->id_kredit}}" readonly>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group"> <!-- Date input -->
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                      </div>
                                      <input required type="text" class="form-control datepicker" name="tanggal" placeholder="DD MM YYYY">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row justify-content-between">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text span-input">ID PEMBELI</span>
                                      </div>
                                      <input name="id_pembeli" type="text" class="form-control id-kredit" value="{{$kredit->pembeli->id_pembeli}}" readonly>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text span-input">Nama</span>
                                      </div>
                                      <input type="text" class="form-control" value="{{$kredit->pembeli->nama_pembeli}}">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <hr class="garis">
                                </div>
                                <div class="col-md-12">
                                  <div class="row justify-content-between">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text span-input">Sisa Angsuran</span>
                                          </div>
                                          <input name="sisa_angsuran" type="text" class="form-control" value="Rp. {{number_format($kredit->sisa_angsuran,2,',','.')}}">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <button idk="{{$kredit->id_kredit}}" idp="{{$kredit->pembeli->id_pembeli}}" np="{{$kredit->pembeli->nama_pembeli}}" type="submit" class="btn btn-outline-primary btn-block bayar-btn">Bayar Sekarang</button>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text span-input">Perbulan</span>
                                          </div>
                                          <input name="bayar" type="text" class="form-control" value="Rp. {{number_format($kredit->angsuran_perbulan,2,',','.')}}">
                                        </div>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text span-input">Sisa Cicilan</span>
                                          </div>
                                          <input name="sisa_cicilan" type="text" class="form-control" value="{{$kredit->lama_angsuran}} kali">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

              </div>
          </div>
      </div>
  </div>

@endsection
