@extends('back.layout.main')

@section('title', 'Tambah Pengaduan')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
      <a href="{{ url('tiket') }}">Tiket</a> /</span> Tambah Tiket</h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Tambah Data</h5>
        </div>
        <div class="card-body">
          <form action="{{ url('tiket') }}" method="post">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="user_id">Nama Client</label>
              <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
                <option value="">- Pilih -</option>
                @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id')==$user->id ? 'selected' : null }}>{{ $user->name }} -
                  (+62{{ $user->phone }})</option>
                @endforeach
              </select>
              @error('user_id')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
           <div class="mb-3">
              <label class="form-label" for="produk_id">Produk</label>
              <select class="form-select @error('produk_id') is-invalid @enderror" id="produk_id" name="produk_id">
                <option value="">- Pilih -</option>
                @foreach ($produks as $produk)
                <option value="{{ $produk->id }}" {{ old('produk_id')==$produk->id ? 'selected' : null }}>{{ $produk->produk }}
                @endforeach
              </select>
              @error('user_id')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="deskripsi">Pengaduan</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary float-end">
              <span class="tf-icons bx bx-send"></span>&nbsp; Kirim</a>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection