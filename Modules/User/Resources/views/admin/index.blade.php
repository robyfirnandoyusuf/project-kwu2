@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <a href="{{ route('admin.user.create', ['type' => $type]) }}">
                        <div class="card-header card-header-icon" data-background-color="purple">
                            <i class="material-icons">add_box</i>
                        </div>
                    </a>
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
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Tanggal buat</th>
                                        <th class="disabled-sorting text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Tanggal buat</th>
                                        <th class="text-right">Actions</th>
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
@endsection

@section('script')
    <script>
        $('.dtable').DataTable({
            processing: true,
            "scrollX": true,
            serverSide: true,
            "type" : 'GET',
            ajax: {
                "url" : '{{route('admin.dt.user')}}',
                "type" : 'GET',
                "data" : {
                    "type": '{{ $type }}'
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data:'name',name:'name' },
                { data:'email',name:'email' },
                { data:'phone',name:'phone' },
                { data:'date',name:'date' },
                { data:'action',name:'action'},
            ]
        });
    </script>
@endsection