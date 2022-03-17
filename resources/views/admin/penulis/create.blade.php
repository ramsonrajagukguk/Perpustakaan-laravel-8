@extends('admin.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row ">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-header pb-3">
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <h5 class="mb-0">Tambahkan Penulis Baru</h5>
                                    </div>
                                    <a href="{{ route('penulis.index') }}"
                                        class="btn bg-gradient-secondary px-3 btn-sm mb-0" type="button"><i
                                            class="fa fa-angle-double-left fs-6" aria-hidden="true"> &nbsp;
                                            Kembali</i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-body px-3 pt-0 pb-2">
                                    <form action="{{ route('penulis.store') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="">Nama Penulis</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" placeholder="Nama Penulis">
                                            <div class="text-danger">
                                                @error('name')
                                                    Nama wajib diisi.
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" id="slug" class="form-control" name="slug"
                                                placeholder="Slug">
                                        </div>
                                        <div class="text-start">
                                            <button type="submit"
                                                class="btn bg-gradient-dark w-25 my-4 mb-2">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
