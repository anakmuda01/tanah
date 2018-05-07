@extends('layouts.front')

@section('content')
  <div class="py-4">
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-8 offset-md-2">
                <div class="card hispem-wrapper">
                  <div class="card-header">
                    <div class="row justify-content-between">
                      <div class="col-md-12">
                        <h2>Cek History Pembayaran Anda</h2>
                      </div>
                    </div>
                  </div>
                  <br>
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
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" href="/cek-history">Masukkan ID Kredit Anda</a>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                          <form method="GET" action="/cek-history/show" class="form-inline d-flex mx-auto caribox">
                            <input required name="cari" class="form-control mr-sm-2" type="text" placeholder="Masukkan ID Kredit..." aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                          </form>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection
