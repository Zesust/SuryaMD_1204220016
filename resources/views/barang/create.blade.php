@extends('layout.app')
@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('barangs.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Create barang</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kodeBarang" class="form-label">First
                                Name</label>
                            <input class="form-control @error('kodeBarang') isinvalid @enderror" type="text"
                                name="kodeBarang" id="kodeBarang" value="{{ old('kodeBarang') }}"
                                placeholder="Enter First Name">
                            @error('kodeBarang')
                                <div class="textdanger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="namaBarang" class="form-label">Last
                                Name</label>
                            <input class="form-control @error('namaBarang') isinvalid @enderror" type="text"
                                name="namaBarang" id="namaBarang" value="{{ old('namaBarang') }}"
                                placeholder="Enter Last Name">
                            @error('namaBarang')
                                <div class="textdanger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deskripsiBarang" class="form-label">deskripsiBarang</label><input
                                class="form-control @error('deskripsiBarang') is-invalid@enderror" type="text"
                                name="deskripsiBarang" id="deskripsiBarang"
                                value="{{ old('deskripsiBarang') }}"placeholder="Enter deskripsiBarang">
                            @error('deskripsiBarang')
                                <div class="textdanger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="hargaBarang" class="form-label">hargaBarang</label>
                            <input class="form-control @error('hargaBarang') is-invalid@enderror" type="text"
                                name="hargaBarang" id="hargaBarang" value="{{ old('hargaBarang') }}"
                                placeholder="Enter hargaBarang">
                            @error('hargaBarang')
                                <div class="textdanger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="satuan" class="formlabel">satuan</label>
                            <select name="satuan" id="satuan" class="formselect">
                                @foreach ($satuans as $satuan)
                                    <option value="{{ $satuan->id }}"
                                        {{ old('satuan') == $satuan->id ? 'selected' : '' }}>
                                        {{ $satuan->code . ' - ' . $satuan->name }}</option>
                                @endforeach
                            </select>
                            @error('satuan')
                                <div class="textdanger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('barangs.index') }}" class="btnbtn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i>
                                Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt3"><i class="bi-check-circle me-2"></i>
                                Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
