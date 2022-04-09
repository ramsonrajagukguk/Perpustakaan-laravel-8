@extends('admin.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="mb-2 ">Tambah Buku</h5>
                            <a href="{{ route('buku.index') }}" class="btn btn-outline-secondary btn-sm mb-0"
                                type="button"><i class="fa fa-angle-double-left text-sm">&nbsp;Kembali</i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('attendance') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Longitute') }}</label>
                                        <input type="text" class="form-control @error('long') is-invalid @enderror"
                                            name="long" placeholder="Masukkan long" value="{{ old('long') }}">
                                        @error('long')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Latitude') }}</label>
                                            <input type="text" class="form-control @error('lat') is-invalid @enderror"
                                                name="lat" placeholder="Masukkan lat" value="{{ old('lat') }}">
                                            @error('lat')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('address') }}</label>
                                        <textarea name="address" cols="30" rows="2" class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Tambahkan Alamat">{{ old('address') }}</textarea>
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Type') }}</label>
                                        <select class="form-select @error('type') is-invalid @enderror" name="type">
                                            <option value="">-- Pilih Type --</option>
                                            <option value="in">Check IN</option>
                                            <option value="out">Check Out</option>
                                        </select>
                                        @error('type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">{{ __('Cover') }}</label>
                                        <input type="file" class="form-control @error('cover') is-invalid @enderror"
                                            name="cover" placeholder="Gambar">
                                        @error('cover')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <button type="submit"
                                    class="btn bg-gradient-primary btn-md mt-4 mb-4">{{ 'Simpan' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
