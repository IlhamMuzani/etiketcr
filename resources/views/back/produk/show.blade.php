@extends('back.layout.main')

@section('title', 'Detail Produk')

@section('content')

           <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <!-- Notifications -->
                    <h5 class="card-header">Detail Produk</h5>
                    <div class="card-body">
                      <div class="error"></div>
                    </div>
                    <div class="table-responsive">
                     <section class="content">
                  <div class="container-fluid">
                  <div class="card">
                    <div class="card-body">
                      <table class="table">
                      {{-- <thead>
                          <th colspan="3" class="border-top-0">
                            <h3>{{ $level->level }}</h3>
                          </th>
                        </thead> --}}
                        <tbody>

                    <tr>
                      <td class="w-25">Produk</td>
                      <td>:</td>
                      <td class="text-break">{{ $produk->produk }}</td>
                    </tr>

                    <tr>
                      <td class="w-25">User</td>
                      <td>:</td>
                      <td class="text-break">{{ $produk->user['name'] }}</td>
                    </tr>
                    
                      <tr>
                      <td class="w-25">Layanan</td>
                      <td>:</td>
                      <td class="text-break">{{ $produk->layanan['layanan'] }}</td>
                      </tr>

                      <tr>
                      <td class="w-25">Url</td>
                      <td>:</td>
                      <td class="text-break">{{ $produk->url}}</td>
                      </tr>

                    </tbody>
                  </table>
                  <div class="row">
                  </div>
                </div>
              </div>
            </div>
            @endsection