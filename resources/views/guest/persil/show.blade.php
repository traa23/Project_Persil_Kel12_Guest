@extends('layouts.guest')

@section('title', 'Detail Persil - ' . $persil->kode_persil)

@section('content')
<!-- Banner -->
<section class="banner full" style="height: 300px;">
    <article>
        <img src="{{ asset('guest-tamplate/images/slide02.jpg') }}" alt="" width="1440" height="961">
        <div class="inner">
            <header>
                <p>Detail Informasi</p>
                <h2>{{ $persil->kode_persil }}</h2>
            </header>
        </div>
    </article>
</section>

<!-- Alert Messages -->
@if(session('success'))
<section class="wrapper style2" style="padding: 2em 0;">
    <div class="inner">
        <div style="background: #4CAF50; color: white; padding: 1em; border-radius: 5px; margin-bottom: 1em;">
            <strong>Berhasil!</strong> {{ session('success') }}
        </div>
    </div>
</section>
@endif

<!-- Detail Content -->
<section id="one" class="wrapper style2">
    <div class="inner">
        <div style="margin-bottom: 2em;">
            <a href="{{ route('guest.persil.index') }}" class="button">Kembali</a>
            <a href="{{ route('guest.persil.edit', $persil->persil_id) }}" class="button special">Edit</a>
            <button onclick="confirmDelete()" class="button" style="background: #f44336;">Hapus</button>
        </div>

        <div class="grid-style-detail">
            <!-- Main Info -->
            <div class="detail-card">
                <h3 style="color: #2ebaae; border-bottom: 2px solid #2ebaae; padding-bottom: 0.5em; margin-bottom: 1em;">
                    Informasi Utama
                </h3>
                <table class="detail-table">
                    <tr>
                        <td><strong>Kode Persil</strong></td>
                        <td>{{ $persil->kode_persil }}</td>
                    </tr>
                    <tr>
                        <td><strong>Luas (m²)</strong></td>
                        <td>{{ $persil->luas_m2 ? number_format($persil->luas_m2, 2) : '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Penggunaan</strong></td>
                        <td>{{ $persil->penggunaan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Alamat Lahan</strong></td>
                        <td>{{ $persil->alamat_lahan ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td><strong>RT / RW</strong></td>
                        <td>{{ $persil->rt ?? '-' }} / {{ $persil->rw ?? '-' }}</td>
                    </tr>
                    @if($persil->pemilik)
                    <tr>
                        <td><strong>Pemilik</strong></td>
                        <td>{{ $persil->pemilik->name }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td><strong>Dibuat</strong></td>
                        <td>{{ $persil->created_at->format('d M Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Terakhir Diupdate</strong></td>
                        <td>{{ $persil->updated_at->format('d M Y H:i') }}</td>
                    </tr>
                </table>
            </div>

            <!-- Dokumen -->
            @if($persil->dokumen->count() > 0)
            <div class="detail-card">
                <h3 style="color: #2ebaae; border-bottom: 2px solid #2ebaae; padding-bottom: 0.5em; margin-bottom: 1em;">
                    Dokumen Terkait
                </h3>
                <ul style="list-style: none; padding: 0;">
                    @foreach($persil->dokumen as $dokumen)
                    <li style="padding: 0.8em; background: #f5f5f5; margin-bottom: 0.5em; border-radius: 5px;">
                        <strong>{{ $dokumen->jenis_dokumen }}</strong><br>
                        <small>{{ $dokumen->nomor_dokumen }} - {{ $dokumen->tanggal_dokumen->format('d M Y') }}</small>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Peta -->
            @if($persil->peta->count() > 0)
            <div class="detail-card">
                <h3 style="color: #2ebaae; border-bottom: 2px solid #2ebaae; padding-bottom: 0.5em; margin-bottom: 1em;">
                    Peta Persil
                </h3>
                <p>Tersedia {{ $persil->peta->count() }} data peta</p>
            </div>
            @endif

            <!-- Sengketa -->
            @if($persil->sengketa->count() > 0)
            <div class="detail-card">
                <h3 style="color: #2ebaae; border-bottom: 2px solid #2ebaae; padding-bottom: 0.5em; margin-bottom: 1em;">
                    Riwayat Sengketa
                </h3>
                <ul style="list-style: none; padding: 0;">
                    @foreach($persil->sengketa as $sengketa)
                    <li style="padding: 0.8em; background: #fff3cd; margin-bottom: 0.5em; border-radius: 5px; border-left: 4px solid #ffc107;">
                        <strong>{{ $sengketa->tanggal_sengketa->format('d M Y') }}</strong><br>
                        <small>Status: {{ $sengketa->status }}</small><br>
                        <small>{{ Str::limit($sengketa->deskripsi, 100) }}</small>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Delete Form -->
<form id="delete-form" action="{{ route('guest.persil.destroy', $persil->persil_id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('styles')
<style>
    .grid-style-detail {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2em;
        margin-top: 2em;
    }

    .detail-card {
        background: #fff;
        padding: 2em;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .detail-table {
        width: 100%;
        border-collapse: collapse;
    }

    .detail-table td {
        padding: 0.8em 0;
        border-bottom: 1px solid #eee;
    }

    .detail-table td:first-child {
        width: 40%;
        color: #666;
    }

    .detail-table tr:last-child td {
        border-bottom: none;
    }
</style>
@endpush

@push('scripts')
<script>
    function confirmDelete() {
        if (confirm('Apakah Anda yakin ingin menghapus data persil ini?')) {
            document.getElementById('delete-form').submit();
        }
    }
</script>
@endpush
