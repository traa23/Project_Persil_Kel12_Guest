@extends('layouts.guest')

@section('title', 'Tambah Data Persil')

@section('content')
<!-- Banner -->
<section class="banner full" style="height: 300px;">
    <article>
        <img src="{{ asset('guest-tamplate/images/slide03.jpg') }}" alt="" width="1440" height="961">
        <div class="inner">
            <header>
                <p>Tambah Data Baru</p>
                <h2>Persil Pertanahan</h2>
            </header>
        </div>
    </article>
</section>

<!-- Form Content -->
<section id="one" class="wrapper style2">
    <div class="inner">
        <div style="margin-bottom: 2em;">
            <a href="{{ route('guest.persil.index') }}" class="button">Kembali</a>
        </div>

        <!-- Error Messages -->
        @if($errors->any())
        <div style="background: #f44336; color: white; padding: 1em; border-radius: 5px; margin-bottom: 2em;">
            <strong>Terdapat kesalahan:</strong>
            <ul style="margin: 0.5em 0 0 1.5em;">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('error'))
        <div style="background: #f44336; color: white; padding: 1em; border-radius: 5px; margin-bottom: 2em;">
            <strong>Error!</strong> {{ session('error') }}
        </div>
        @endif

        <div class="form-container">
            <form action="{{ route('guest.persil.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="kode_persil">Kode Persil <span style="color: red;">*</span></label>
                    <input type="text" id="kode_persil" name="kode_persil" value="{{ old('kode_persil') }}" required>
                    @error('kode_persil')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="luas_m2">Luas (m²)</label>
                    <input type="number" id="luas_m2" name="luas_m2" step="0.01" min="0" value="{{ old('luas_m2') }}">
                    @error('luas_m2')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="penggunaan">Penggunaan Lahan</label>
                    <input type="text" id="penggunaan" name="penggunaan" value="{{ old('penggunaan') }}" placeholder="Contoh: Pertanian, Perumahan, dll">
                    @error('penggunaan')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat_lahan">Alamat Lahan</label>
                    <textarea id="alamat_lahan" name="alamat_lahan" rows="3">{{ old('alamat_lahan') }}</textarea>
                    @error('alamat_lahan')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <input type="text" id="rt" name="rt" value="{{ old('rt') }}" maxlength="5" placeholder="001">
                        @error('rt')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rw">RW</label>
                        <input type="text" id="rw" name="rw" value="{{ old('rw') }}" maxlength="5" placeholder="001">
                        @error('rw')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="button special">Simpan</button>
                    <a href="{{ route('guest.persil.index') }}" class="button">Batal</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .form-container {
        max-width: 800px;
        margin: 0 auto;
        background: #fff;
        padding: 2em;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 1.5em;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5em;
        font-weight: bold;
        color: #333;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 0.8em;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1em;
        font-family: inherit;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #2ebaae;
        box-shadow: 0 0 5px rgba(46, 186, 174, 0.3);
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1em;
    }

    .form-actions {
        margin-top: 2em;
        text-align: center;
    }

    .form-actions button,
    .form-actions a {
        margin: 0 0.5em;
    }

    small {
        display: block;
        margin-top: 0.3em;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush
