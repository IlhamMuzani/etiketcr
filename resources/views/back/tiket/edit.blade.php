@extends('back.layout.main')

@section('title', 'Ubah Tiket')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
      <a href="{{ url('tiket') }}">Tiket</a> /</span> Ubah Tiket</h4>
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Ubah Data</h5>
        </div>
        <div class="card-body">
         <form action="{{ url('tiket/' . $tiket->id) }}" method="post">
            @csrf
            @method('put')
              <div class="form-group">
            <label for="user_id">Role</label>
            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
              <option value="">- Pilih -</option>
              @foreach ($users as $k)
                <option value="{{ $k->id }}" {{ old('user_id') == $k->id ? 'selected' : null }}>{{ $k->name}}</option>
              @endforeach
            </select>
            @error('user_id')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div>

             <div class="form-group">
            <label for="product_id">Role</label>
            <select class="form-control @error('product_id') is-invalid @enderror" id="product_id" name="product_id">
              <option value="">- Pilih -</option>
              @foreach ($users as $k)
                <option value="{{ $k->id }}" {{ old('product_id') == $k->id ? 'selected' : null }}>{{ $k->name}}</option>
              @endforeach
            </select>
            @error('product_id')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div>
            <div class="mb-3">
            <label class="form-label" for="deskripsi">Pengaduan</label>
            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi"
              placeholder="Masukan pengaduan" value="{{ old('deskripsi', $tiket->deskripsi) }}" autofocus />
            @error('deskripsi')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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