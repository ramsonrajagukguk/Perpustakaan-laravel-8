@extends('admin.app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="row">
                        <div class="col-10">
                            <div class="card-header pb-3">
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <h5 class="mb-0">Laporan buku yang dipinjam</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-3 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table id="dataTable" class="table align-items-center p-3 mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ID</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Judul Buku</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Penulis</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Jumlah</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Total Dipinjam</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($history as $data)
                                                <tr>
                                                    <td style="width: 10px">
                                                        <p class="text-xs text-center font-weight-bold mb-0">
                                                            {{ $loop->iteration }}</p>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0 text-sm">{{ $data->judul }}</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0 text-sm">{{ $data->author->name }}</h6>

                                                    </td>

                                                    <td>
                                                        <h6 class="mb-0 text-sm">{{ $data->jumlah }}
                                                        </h6>

                                                    </td>


                                                    <td>

                                                        <h6 class="mb-0 text-sm">{{ $data->borrowed_count }}</h6>

                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- {{ $history->links('pagination::bootstrap-4') }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $("#dataTable").DataTable({
            "responsive": true,
            "autoWidth": true,
        });
    </script>
@endpush
