@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
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
                                        <th>Nama</th>
                                        <th>Nominal</th>
                                        <th>Status</th>
                                        <th>Tanggal buat</th>
                                        <th>Disetujui oleh</th>
                                        <th class="disabled-sorting">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Nominal</th>
                                        <th>Status</th>
                                        <th>Tanggal buat</th>
                                        <th>Disetujui oleh</th>
                                        <th class="disabled-sorting">Actions</th>
                                    </tr>
                                </tfoot>
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

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   
</div>

@endsection
@section('script')
    <script>
        $('.dtable').DataTable({
            processing: true,
            "scrollX": true,
            serverSide: true,
            ajax: '{{route('admin.dt.withdraw')}}',
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false},
                { data:'nama',name:'nama' },
                { data:'nominal',name:'nominal' },
                { data:'status',name:'status', orderable: false, searchable: false},
                { data:'created_at',name:'created_at', orderable: false, searchable: false},
                { data:'approve_by',name:'approve_by', orderable: false, searchable: false},
                { data:'action',name:'action', orderable: false, searchable: false},
            ],
             "drawCallback": function( settings ) {
                 $('.selectpicker').selectpicker()
            }
        });

        $(document).on('change', '.select-status', function(e) {
            e.preventDefault()
            let v = $(this).val()
            let id = $(this).attr('id')
            window.location.replace('/admin/withdraw/' + id + '/' + v);
        })
    </script>
@endsection