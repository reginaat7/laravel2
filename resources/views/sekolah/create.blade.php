@extends('layouts.app')

@section('title', 'Tambah Data Sekolah')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Data Sekolah</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('sekolah.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <!-- NPSN -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">NPSN <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="npsn" 
                                   class="form-control @error('npsn') is-invalid @enderror" 
                                   value="{{ old('npsn') }}" 
                                   placeholder="Contoh: 20209569" 
                                   required>
                            @error('npsn')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Nama Sekolah -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nama Sekolah <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama_sekolah" 
                                   class="form-control @error('nama_sekolah') is-invalid @enderror" 
                                   value="{{ old('nama_sekolah') }}" 
                                   placeholder="Contoh: SDN 1 Pakuwon" 
                                   required>
                            @error('nama_sekolah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Tingkat -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tingkat Sekolah <span class="text-danger">*</span></label>
                            <select name="tingkat" class="form-select @error('tingkat') is-invalid @enderror" required>
                                <option value="">-- Pilih Tingkat --</option>
                                <option value="SD" {{ old('tingkat') == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('tingkat') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('tingkat') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="SMK" {{ old('tingkat') == 'SMK' ? 'selected' : '' }}>SMK</option>
                            </select>
                            @error('tingkat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Dapur SPPG -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Dapur SPPG Penanggung Jawab</label>
                            <select name="dapur_sppg_id" class="form-select @error('dapur_sppg_id') is-invalid @enderror">
                                <option value="">-- Pilih Dapur SPPG --</option>
                                @foreach($dapurs as $dapur)
                                    <option value="{{ $dapur->id }}" {{ old('dapur_sppg_id') == $dapur->id ? 'selected' : '' }}>
                                        {{ $dapur->nama_dapur }}
                                    </option>
                                @endforeach
                            </select>
                            @error('dapur_sppg_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Upload Foto Sekolah -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Foto Sekolah (Opsional)</label>
                        <input type="file" 
                               name="foto_sekolah" 
                               class="form-control @error('foto_sekolah') is-invalid @enderror" 
                               accept="image/*">
                        @error('foto_sekolah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Alamat Sekolah -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Alamat Sekolah <span class="text-danger">*</span></label>
                        <textarea name="alamat_sekolah" 
                                  class="form-control @error('alamat_sekolah') is-invalid @enderror" 
                                  rows="3" 
                                  placeholder="Masukkan alamat lengkap sekolah..." 
                                  required>{{ old('alamat_sekolah') }}</textarea>
                        @error('alamat_sekolah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="{{ route('sekolah.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection