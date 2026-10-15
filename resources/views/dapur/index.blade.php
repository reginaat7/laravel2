@extends('layouts.app')

@section('title', 'Daftar Dapur SPPG')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-shop me-2"></i>Daftar Dapur SPPG</h5>
        <a href="{{ route('dapur.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
            <i class="bi bi-plus-lg me-1"></i> Tambah Dapur
        </a>
    </div>
    <div class="card-body p-0">
        
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Nama Dapur</th>
                        <th class="text-center">Foto</th>
                        <th>Alamat</th>
                        <th>Tanggal Berdiri</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dapurs as $index => $d)
                    <tr>
                        <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $d->nama_dapur }}</td>
                        <td class="text-center">
                            @if($d->foto)
                                @if(filter_var($d->foto, FILTER_VALIDATE_URL))
                                    <img src="{{ $d->foto }}" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('storage/' . $d->foto) }}" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                @endif
                            @else
                                <span class="badge bg-secondary-subtle text-dark border">No Photo</span>
                            @endif
                        </td>
                        <td>{{ $d->alamat }}</td>
                        <td>{{ \Carbon\Carbon::parse($d->tgl_berdiri)->format('d M Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('dapur.edit', $d->id) }}" class="btn btn-outline-warning btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('dapur.destroy', $d->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data dapur ini?')" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data Dapur SPPG.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection