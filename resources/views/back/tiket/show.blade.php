@extends('back.layout.main')

@section('title', 'Detail Tiket')

@section('content')

           <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <!-- Notifications -->
                    <h5 class="card-header">Detail Tiket</h5>
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
                      <td class="w-25">Kode</td>
                      <td>:</td>
                      <td class="text-break">{{ $tiket->kode }}</td>
                    </tr>

                    <tr>
                      <td class="w-25">Nama Client</td>
                      <td>:</td>
                      <td class="text-break">{{ $tiket->user['name'] }}</td>
                    </tr>
                    
                      <tr>
                        <td class="w-25">Status</td>
                        <td>:</td>
                        <td class="text-break">{{ $tiket->status }}</td>
                      </tr>

                       <tr>
                        <td class="w-25">Deskripsi</td>
                        <td>:</td>
                        <td class="text-break">{{ $tiket->deskripsi }}</td>
                      </tr>

                    </tbody>
                  </table>
                  <div class="row">
                  </div>
                </div>
              </div>
            </div>
            @endsection