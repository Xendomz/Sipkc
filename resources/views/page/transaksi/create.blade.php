@extends('layouts.app')

@section('title', 'Barang')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Barang</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="">
                                    <div class="form-group">
                                        <label>Kode Transaksi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="name" placeholder="Name"
                                                name="name" value="{{ $kode_transaksi }}" readonly>
                                            <div class="invalid-feedback">
                                                Please fill name
                                            </div>
                                        </div>
                                    </div>
                                    <div class="def-theme">
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <label for="theme">Theme</label>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-outline-primary btn-sm float-right" id="btn-add-theme"
                                                    type="button" data-repeater-create><i class="fas fa-plus mr-2"></i> Add Theme</button>
                                            </div>
                                        </div>

                                        <div data-repeater-list="themes">
                                            <div data-repeater-item>
                                                <div class="row mb-4">
                                                    <div class="col-md-11">
                                                        <input type="text"
                                                        class="form-control theme"
                                                        name="name" placeholder="Masukan Tema...">
                                                    </div>
                                                    <div class="col-md-1 d-flex align-items-end">
                                                        <button class="btn btn-danger btn-block" data-repeater-delete type="button"><i
                                                            class="fas fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/page/jquery.repeater.min.js') }}"></script>
    <script>
        $('.def-theme').repeater({
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            },
        });
    </script>
@endpush
