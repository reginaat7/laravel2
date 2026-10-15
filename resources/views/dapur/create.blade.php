@extends('layouts.app')

@section('title', 'Tambah Data Dapur SPPG')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Data Dapur SPPG</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('dapur.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <!-- Nama Dapur -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nama Dapur <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama_dapur" 
                                   class="form-control @error('nama_dapur') is-invalid @enderror" 
                                   value="{{ old('nama_dapur') }}" 
                                   placeholder="Contoh: Dapur SPPG Banyuresmi" 
                                   required>
                            @error('nama_dapur')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Tanggal Berdiri -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tanggal Berdiri <span class="text-danger">*</span></label>
                            <input type="date" 
                                   name="tgl_berdiri" 
                                   class="form-control @error('tgl_berdiri') is-invalid @enderror" 
                                   value="{{ old('tgl_berdiri') }}" 
                                   required>
                            @error('tgl_berdiri')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Upload Foto -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Foto Dapur (Opsional)</label>
                        <input type="file" 
                               name="foto" 
                               class="form-control @error('foto') is-invalid @enderror" 
                               accept="image/*">
                        @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Alamat Lengkap <span class="text-danger">*</span></label>
                        <textarea name="alamat" 
                                  class="form-control @error('alamat') is-invalid @enderror" 
                                  rows="3" 
                                  placeholder="Masukkan alamat lokasi dapur..." 
                                  required>{{ old('alamat') }}</textarea>
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="{{ route('dapur.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection