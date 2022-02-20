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
                                        <h5 class="mb-0">Top User dipinjam Buku</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-3 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table id="dataTable" class="table align-items-center p-3 mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xxs ">No</th>
                                                <th class="text-uppercase text-secondary text-xxs">Nama</th>
                                                <th class="text-uppercase text-secondary text-xxs">Email</th>
                                                <th class="text-uppercase text-secondary text-xxs text-center">Begabung</th>
                                                <th class="text-uppercase text-secondary text-xxs text-center">Total Pinjam
                                                </th>
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
                                                        <h6 class="mb-0 text-sm">{{ $data->name }}</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0 text-sm">{{ $data->email }}</h6>
                                                    </td>
                                                    <td class="text-center">
                                                        <h6 class="mb-0 text-sm">
                                                            {{ $data->created_at->diffForHumans() }}
                                                        </h6>
                                                    </td>
                                                    <td class="text-center">

                                                        <h6 class="mb-0 text-sm">{{ $data->borrow_count }}</h6>

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
