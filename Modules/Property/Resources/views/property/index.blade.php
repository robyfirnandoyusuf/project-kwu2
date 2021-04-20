@extends('admin.layouts.app')
@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <a href="{{ route('admin.property.create') }}">
                        <div class="card-header card-header-icon" data-background-color="purple">
                            <i class="material-icons">add_box</i>
                        </div>
                    </a> --}}
                    <div class="card-content">
                        <h4 class="card-title">{{ $title }}</h4>
                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="material-datatables">
                            <table class="table table-striped table-no-bordered table-hover dtable" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Author</th>
                                        <th>Gambar</th>
                                        <th>Jenis</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Terakhir Diubah</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                {{-- <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Author</th>
                                        <th>Gambar</th>
                                        <th>Jenis</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Tanggal buat</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>
<div class="modal fade" id="editPropertyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   
</div>

@endsection

@section('script')
    <script>
        $('.dtable').DataTable({
            processing: true,
            "scrollX": true,
            serverSide: true,
            ajax: '{{route('admin.dt.property')}}',
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false},
                { data:'title',name:'title' },
                { data:'user_name',name:'users.name' },
                { data:'image',name:'image', orderable: false, searchable: false},
                { data:'type',name:'type' },
                { data:'price',name:'basic_price' },
                { data:'active_status',name:'active_status', orderable: false, searchable: false },
                { data:'last_update',name:'updated_at'},
                { data:'action',name:'action', orderable: false, searchable: false},
            ]
        });

        let getDetail = (id) => {
            $.ajax({
                url: '{{ route("admin.popup.property.edit") }}',
                type: 'GET',
                dataType: 'json',
                data: { id },
                complete: function(data){
                    $('#editPropertyModal').html(data.responseText)
                    $('#editPropertyModal').modal('show')
                }
            });
        }

    </script>
@endsection