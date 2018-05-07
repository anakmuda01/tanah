@extends('layouts.kasir')

@section('content')
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a href="/kasir" class="nav-link">Cari ID Kredit</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="/kasir/create?cari={{$id}}">Pembayaran</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Histori Pembayaran</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane active" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                          <div class="container">
                            <br>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text span-input">ID KREDIT</span>
                                    </div>
                                    <input name="id_kredit" type="text" class="form-control id-kredit" value="{{$id}}" readonly>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <hr class="garis">
                              </div>
                              <div class="col-md-12">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Tanggal Bayar</th>
                                      <th scope="col">Sisa Angsuran</th>
                                      <th scope="col">Sisa Cicilan</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($histories as $index => $h)
                                    <tr>
                                      <th scope="row">{{$index + $histories->firstItem()}}</th>
                                      <td>{{$h->tanggal_bayar}}</td>
                                      <td>Rp. {{number_format($h->sisa_angsuran,2,',','.')}}</td>
                                      <td>{{$h->sisa_cicilan}}</td>
                                      <td>
                                        <a href="/cetak-kwitansi/{{$h->id}}" target="_blank"><i class="fa fa-print"></i> Cetak Kwitansi</a>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                                {{ $histories->links() }}
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
