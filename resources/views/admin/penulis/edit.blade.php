@extends('admin.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row ">
            <div class="col-xl-4 col-lg-5 col-md-7">
                <div class="card-body">
                    <form action="{{ route('penulis.update', $penuli->slug) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <input type="text" value="{{ $penuli->name }}"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Nama Penulis">
                            <div class="text-danger">
                                @error('judul')
                                    Nama wajib diisi.
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
