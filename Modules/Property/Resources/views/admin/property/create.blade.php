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
                        <form method="POST" action="{{ route('admin.property.store') }}" class="form-horizontal">
                            @csrf
                            <div class="card-header card-header-text" data-background-color="rose">
                                <h4 class="card-title">{{ $title }}</h4>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Judul</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" name="title" placeholder="Judul">
                                            {{-- <span class="help-block">A block of help text that breaks onto a new
                                                line.</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Harga (Rp. )</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="number" class="form-control" placeholder="Harga" name="price">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Luas Tanah (m<sup>2</sup>)</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="number" class="form-control" placeholder="Luas Tanah" name="square_meter">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Jumlah Tempat Tidur</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="number" class="form-control" placeholder="Jumlah Tempat Tidur" name="fac[bedroom]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Jumlah Kamar Mandi</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="number" class="form-control" placeholder="Jumlah Kamar Mandi" name="fac[bathroom]">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Provinsi</label>
                                    <div class="col-lg-5 col-md-6 col-sm-3">
                                        <select class="select2" id="select_prov" data-style="btn btn-primary btn-round" title="Single Select"
                                            data-size="7" style="width: 90%; height:200px;" name="province_id">
                                            <option></option>
                                            @foreach ($provs as $prov)
                                                <option value="{{ $prov->id }}">{{ ucfirst($prov->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Kota</label>
                                    <div class="col-lg-5 col-md-6 col-sm-3">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <select class="select2" id="select_city" data-style="btn btn-primary btn-round"
                                                title="Single Select" data-size="7" style="width: 90%; height:200px;" disabled name="city_id">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Alamat</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <textarea type="text" class="form-control" name="address"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Kode Pos</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" placeholder="Kode Pos" name="postal_code">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Thumbnail</label>
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <select class="selectpicker" data-style="btn btn-primary btn-round"
                                            title="Pilih thumbnail" data-size="7" name="thumbnail" id="sel_thumb">
                                            </select>
                                        </div>
                                        <img id="img_thumb" src="http://www.qbcsolutions.eu/wp-content/uploads/2013/11/default_image_01.png" style="height:auto;width:200px;">
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" rows="10" name="desc"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-fill btn-rose">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(this).siblings('.select2-container').find('.select2-selection__placeholder').css('color', 'white');
        $('.select2').select2({
             placeholder: "Pilih salah satu"
        });

        $(select_prov).change(function(e){
            $.ajax({
                url: '{{ route("select.city") }}',
                type: 'POST',
                dataType: 'json',
                data: { province_id: $(this).val() },
                success:function(data){
                    var data = data.data;
                    var newOptions = '';
                    for (var x in data) {
                        console.log('s', data[x]);
                        newOptions += '<option value="' + data[x].id + '">' + data[x].name + '</option>';
                    }
                    $(select_city).select2('destroy').html(newOptions).prop('disabled', false).select2();
                },
                onerror:function(XMLHttpRequest, textStatus, errorThrown) {
            
                }
            });
        });

        $("#sel_thumb").change(function(e){
            let val = $(this).val();
            $(img_thumb).attr('src', '/storage/upload/'+val);
        });
    </script>
@endsection
