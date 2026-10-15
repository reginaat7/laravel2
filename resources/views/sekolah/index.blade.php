@extends('layouts.app')

@section('title', 'Daftar Sekolah')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-building me-2"></i>Daftar Sekolah</h5>
        <a href="{{ route('sekolah.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
            <i class="bi bi-plus-lg me-1"></i> Tambah Sekolah
        </a>
    </div>
    <div class="card-body p-0">
        
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th class="text-center">Foto</th>
                        <th>NPSN</th>
                        <th>Nama Sekolah</th>
                        <th>Tingkat</th>
                        <th>Alamat Sekolah</th>
                        <th>Dapur SPPG</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sekolahs as $index => $s)
                    <tr>
                        <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                        <td class="text-center">
                            @if($s->foto_sekolah)
                                @if(filter_var($s->foto_sekolah, FILTER_VALIDATE_URL))
                                    <img src="{{ $s->foto_sekolah }}" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('storage/' . $s->foto_sekolah) }}" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                @endif
                            @else
                                <span class="badge bg-secondary-subtle text-dark border">No Photo</span>
                            @endif
                        </td>
                        <td><span class="badge bg-secondary-subtle text-dark border">{{ $s->npsn }}</span></td>
                        <td class="fw-semibold">{{ $s->nama_sekolah }}</td>
                        <td><span class="badge bg-info-subtle text-info-emphasis">{{ $s->tingkat }}</span></td>
                        <td>{{ $s->alamat_sekolah }}</td>
                        <td>
                            @if($s->dapurSppg)
                                <span class="fw-semibold">{{ $s->dapurSppg->nama_dapur }}</span>
                            @else
                                <span class="badge bg-warning-subtle text-warning-emphasis">Belum Ditentukan</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('sekolah.edit', $s->id) }}" class="btn btn-outline-warning btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('sekolah.destroy', $s->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus sekolah ini?')" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">Belum ada data sekolah.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection