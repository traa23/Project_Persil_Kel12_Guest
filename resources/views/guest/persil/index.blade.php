@extends('layouts.guest')

@section('title', 'Daftar Persil - Sistem Informasi Persil')

@section('content')
<!-- Banner -->
<section class="banner full" style="height: 400px;">
    <article>
        <img src="{{ asset('guest-tamplate/images/slide01.jpg') }}" alt="" width="1440" height="961">
        <div class="inner">
            <header>
                <p>Sistem Informasi Pengelolaan</p>
                <h2>Data Persil Pertanahan</h2>
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

@if(session('error'))
<section class="wrapper style2" style="padding: 2em 0;">
    <div class="inner">
        <div style="background: #f44336; color: white; padding: 1em; border-radius: 5px; margin-bottom: 1em;">
            <strong>Error!</strong> {{ session('error') }}
        </div>
    </div>
</section>
@endif

<!-- Main Content -->
<section id="one" class="wrapper style2">
    <div class="inner">
        <header class="align-center">
            <p>Daftar Lengkap Data Persil</p>
            <h2>Data Persil Terdaftar</h2>
        </header>

        <div style="text-align: center; margin-top: 1.5em; margin-bottom: 2em;">
            <a href="{{ route('guest.persil.create') }}" class="button special">Tambah Data Persil</a>
        </div>

        @if($persils->count() > 0)
        <div class="grid-style">
            @foreach($persils as $persil)
            <div>
                <div class="box">
                    <div class="content">
                        <header class="align-center">
                            <h3 style="color: #2ebaae; margin-bottom: 0.5em;">{{ $persil->kode_persil }}</h3>
                        </header>

                        <div style="margin-bottom: 1em;">
                            @if($persil->luas_m2)
                            <p style="margin: 0.3em 0;"><strong>Luas:</strong> {{ number_format($persil->luas_m2, 2) }} m²</p>
                            @endif

                            @if($persil->penggunaan)
                            <p style="margin: 0.3em 0;"><strong>Penggunaan:</strong> {{ $persil->penggunaan }}</p>
                            @endif

                            @if($persil->alamat_lahan)
                            <p style="margin: 0.3em 0;"><strong>Alamat:</strong> {{ Str::limit($persil->alamat_lahan, 60) }}</p>
                            @endif

                            @if($persil->rt || $persil->rw)
                            <p style="margin: 0.3em 0;"><strong>RT/RW:</strong>
                                {{ $persil->rt ?? '-' }} / {{ $persil->rw ?? '-' }}
                            </p>
                            @endif

                            @if($persil->pemilik)
                            <p style="margin: 0.3em 0;"><strong>Pemilik:</strong> {{ $persil->pemilik->name }}</p>
                            @endif
                        </div>

                        <footer class="align-center">
                            <a href="{{ route('guest.persil.show', $persil->persil_id) }}" class="button alt">Detail</a>
                            <a href="{{ route('guest.persil.edit', $persil->persil_id) }}" class="button alt">Edit</a>
                        </footer>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div style="margin-top: 2em; text-align: center;">
            {{ $persils->links() }}
        </div>
        @else
        <div class="align-center" style="padding: 3em 0;">
            <p style="font-size: 1.2em; color: #999;">Belum ada data persil yang terdaftar.</p>
            <a href="{{ route('guest.persil.create') }}" class="button special">Tambah Data Pertama</a>
        </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
    .grid-style {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2em;
        margin-top: 2em;
    }

    .box {
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .box:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }

    .button {
        margin: 0.2em;
    }
</style>
@endpush
