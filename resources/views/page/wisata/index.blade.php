@extends('layouts.app')

@section('title', 'Wisata')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables/media/css/jquery.dataTables.select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Wisata</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-end">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalWisata" onclick="addWisata()"><i
                                        class="fa-solid fa-plus"></i> Add Wisata</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table w-100" id="table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>Nama</th>
                                                <th>Kategori</th>
                                                <th>Alamat</th>
                                                <th>Kontak</th>
                                                <th>latitude</th>
                                                <th>longitude</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" tabindex="-1" role="dialog" id="modalWisata">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title">Add Wisata</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form" class="needs-validation" novalidate="">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nama" placeholder="Nama Wisata" name="nama" required>
                                    <div class="invalid-feedback">
                                        Please fill nama
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <div class="input-group">
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="deskripsi" required></textarea>
                                    <div class="invalid-feedback">
                                        Please fill deskripsi
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <div class="input-group">
                                    <select name="kategori_id" id="kategori" class="form-control" required>
                                        @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please fill kategori
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <div class="input-group">
                                    <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" required></textarea>
                                    <div class="invalid-feedback">
                                        Please fill Alamat
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Kontak</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="kontak" placeholder="08xxxxx" name="kontak" required>
                                    <div class="invalid-feedback">
                                        Please fill kontak
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="latitude" placeholder="latitude" name="latitude" required>
                                    <div class="invalid-feedback">
                                        Please fill latitude
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="longitude" placeholder="longitude" name="longitude" required>
                                    <div class="invalid-feedback">
                                        Please fill longitude
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        $(document).ready(function(){
            form.on('submit', function(e) {
                if (this.checkValidity()) {
                    e.preventDefault();
                    $.ajax({
                        url: url,
                        type: "post",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function(res) {
                            $("#modalWisata").modal("hide")
                            table.ajax.reload()
                            swal('Good Job', res.message, 'success');
                        }
                    });
                }
            })
        });

        var table = $('#table').DataTable({
            responsive: true,
            ajax: {
                'url': '/panel/wisata/get-data',
                'type': 'GET',
                'dataSrc': ''
            },
            fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                $('td:eq(0)', nRow).html(iDisplayIndexFull + 1);
            },
            columns: [{
                    data: null
                },
                {
                    data: 'nama'
                },
                {
                    data: 'kategori.kategori'
                },
                {
                    data: 'alamat'
                },
                {
                    data: 'kontak'
                },
                {
                    data: 'latitude'
                },
                {
                    data: 'longitude'
                },
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return `<a href="/panel/wisata/${row.id}/detail" class="btn btn-info"><i class="fa fa-info"></i> Detail</a> <button class="btn btn-warning text-white" data-toggle="modal" data-target="#modalWisata" onclick="editWisata(${row.id})"><i class="fa fa-edit"></i> Edit</button> <button class="btn btn-danger text-white" onclick="deleteWisata(${row.id})"><i class="fa fa-trash"></i> Delete</button>`;
                    }
                }
            ],
            dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        });

        var url = "";
        var form = $("#form");
        function addWisata() {
            $("#title").text("Add Wisata")
            url = "/panel/wisata/store"
            form.trigger("reset")
            form.removeClass('was-validated')
        }

        function editWisata(id) {
            $("#title").text("Edit Wisata")
            url = `/panel/wisata/${id}/update`
            form.trigger("reset")
            form.removeClass('was-validated')
            $.ajax({
                url: `/panel/wisata/${id}`,
                type: "get",
                success: function(res) {
                    $("#nama").val(res.nama)
                    $("#deskripsi").val(res.deskripsi)
                    $("#kategori").val(res.kategori_id)
                    $("#alamat").val(res.alamat)
                    $("#kontak").val(res.kontak)
                    $("#latitude").val(res.latitude)
                    $("#longitude").val(res.longitude)
                }
            })
        }

        function deleteWisata(id) {
            swal({
                title: 'Are you sure?',
                text: 'Once deleted, you will not be able to recover this data!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: `/panel/wisata/${id}/delete`,
                        type: "post",
                        success: function(res) {
                            table.ajax.reload();
                            swal('Good Job', res.message, 'success');
                        }
                    })
                }
            });
        }
    </script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
