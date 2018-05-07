@extends('layouts.kasir')

@section('content')
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" href="/kasir">Cari ID Kredit</a>
                        </li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                          <form method="GET" action="/kasir/create" class="form-inline d-flex mx-auto caribox">
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

@endsection
