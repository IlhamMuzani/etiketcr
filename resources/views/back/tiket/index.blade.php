@extends('back.layout.main')

@section('title', 'Tiket')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Data Master /</span>
    Tiket
  </h4>
  @if (session('status'))
  <div class="alert alert-primary alert-dismissible" tiket="alert">
    {{ session('status') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header d-flex align-items-start justify-content-between">
      Tiket Pengaduan
      <a href="{{ url('tiket/create') }}" class="btn btn-sm rounded-pill btn-primary">
        <span class="tf-icons bx bx-plus"></span>&nbsp; Buat Pengaduan</a>
    </h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Client</th>
            <th>Produk</th>
            <th>Deskripsi</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($tikets as $tiket)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $tiket->kode }}</td>
            <td>{{ $tiket->user['name'] }}</td>
            <td>{{ $tiket->kode }}</td>
            <td>{{ $tiket->deskripsi }}</td>
            <td>
              <a href="" data-bs-toggle="modal" data-bs-target="#basicModal{{ $tiket->id }}">
                @if ($tiket->status == "Menunggu")
                <span class="badge bg-label-warning me-1">Menunggu</span>
                @elseif($tiket->status == "Diproses")
                <span class="badge bg-label-primary me-1">Diproses</span>
                @else
                <span class="badge bg-label-success me-1">Selesai</span>
                @endif
              </a>
              <div class="modal fade" id="basicModal{{ $tiket->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Update Status</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('update-status') }}" method="POST">
                      @csrf
                      <div class="modal-body">
                        <div class="row">
                          <div class="col mb-3">
                            <label for="kode" class="form-label">Kode</label>
                            <input type="text" id="kode" name="kode"
                              class="form-control @error('status') is-invalid @enderror" value="{{ $tiket->kode }}"
                              readonly />
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <label for="nameBasic" class="form-label">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                              <option value="">- Pilih -</option>
                              <option value="Menunggu" {{ $tiket->status == "Menunggu" ? 'selected' : null
                                }}>Menunggu
                              </option>
                              <option value="Diproses" {{ $tiket->status == "Diproses" ? 'selected' : null
                                }}>Diproses
                              </option>
                              <option value="Selesai" {{ $tiket->status == "Selesai" ? 'selected' : null }}>Selesai
                              </option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Tutup
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <form method="post" action="{{ url('tiket/' . $tiket->id) }}"
                onsubmit="return confirm('Apakah anda yakin akan menghapus data ini?')">
                @csrf
                @method('delete')
                 <a href="{{ route('tiket.show', $tiket->id)}}" class="btn rounded-pill btn-info btn-sm text-white">
                  <span class="tf-icons bx bx-show"></span>&nbsp; Detail
                </a>
                <a href="{{ url('tiket/' . $tiket->id . '/edit') }}"
                  class="btn rounded-pill btn-warning btn-sm text-white">
                  <span class="tf-icons bx bxs-edit"></span>&nbsp; Ubah
                </a>
                <button type="submit" class="btn rounded-pill btn-danger btn-sm text-white">
                  <span class="tf-icons bx bx-trash-alt"></span>&nbsp; Hapus
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
            {{ $tikets->appends(Request::all())->links('pagination::bootstrap-4') }}
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
</div>
@endsection