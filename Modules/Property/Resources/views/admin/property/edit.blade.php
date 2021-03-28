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
                        <form method="POST" action="{{ route('admin.property.update', $single->id) }}" class="form-horizontal">
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
                                            <input type="text" class="form-control" name="title" placeholder="Judul" value="{{ $single->title }}">
                                            {{-- <span class="help-block">A block of help text that breaks onto a new
                                                line.</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @php
                                    @endphp
                                    <label class="col-sm-2 label-on-left">Tag</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" value="{{ $tags }}" class="tagsinput" data-role="tagsinput" data-color="rose" name="tags"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Jenis</label>
                                    <div class="col-lg-5 col-md-6 col-sm-3">
                                        <select class="selectpicker" data-style="btn btn-primary btn-round"
                                            title="Pilih Jenis" data-size="7" name="type">
                                            <option disabled selected>Pilih Jenis</option>
                                            @foreach ($cats as $cat)
                                                <option value="{{ $cat->id }}" {{ $single->category_id == $cat->id ? "selected" : "" }}>{{ ucfirst($cat->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Harga (Rp. )</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="number" class="form-control" placeholder="Harga" name="price" value="{{ $single->price }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Luas Tanah (m<sup>2</sup>)</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="number" class="form-control" placeholder="Luas Tanah" name="square_meter" value="{{ $single->square_meter }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Jumlah Tempat Tidur</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            @php
                                                $resBedroom = "";
                                                $bedroom = $single->facs->where('name', 'bedroom')->first();
                                                if (!empty($bedroom))
                                                    $resBedroom = $bedroom->value;
                                            @endphp
                                            <input type="number" class="form-control" placeholder="Jumlah Tempat Tidur" name="fac[bedroom]"
                                                value="{{ $resBedroom }}"
                                            >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Jumlah Kamar Mandi</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            @php
                                                $resBathroom = "";
                                                $bathroom = $single->facs->where('name', 'bathroom')->first();
                                                if (!empty($bathroom))
                                                    $resBathroom = $bathroom->value;
                                            @endphp
                                            <input type="number" class="form-control" placeholder="Jumlah Kamar Mandi" name="fac[bathroom]"
                                                value="{{ $resBathroom }}"
                                            >
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
                                                <option value="{{ $prov->id }}" {{ $single->city->province_id == $prov->id ? "selected" : "" }}>{{ ucfirst($prov->name) }}</option>
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
                                                title="Single Select" data-size="7" style="width: 90%; height:200px;" name="city_id">
                                                <option></option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}" {{ $single->city_id == $city->id ? "selected" : ""}}>{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Alamat</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <textarea type="text" class="form-control" name="address">{{ $single->address }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Kode Pos</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" placeholder="Kode Pos" name="postal_code" value="{{ $single->postal_code }}">
                                        </div>
                                    </div>
                                </div>

                                @component('partials.uploader', [
                                    'title' => 'Drop Images',
                                    'desc' => '.jpg,.png only',
                                    'thumb' => $thumb,
                                    'params' => [
                                        'parent_id' => $single->id,
                                        'sid' => !empty($img = $single->images->first()) ? $img->sid : $dzSess
                                    ],
                                    'acceptedFiles' => '.jpg,.png',
                                    'uploadedFiles' => $single->images->toArray()
                                ])
                                @endcomponent

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Thumbnail</label>
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <select class="selectpicker" data-style="btn btn-primary btn-round"
                                            title="Pilih thumbnail" data-size="7" name="thumbnail" id="sel_thumb">
                                                {{-- @foreach ($single->images as $img)
                                                    <option value="{{ $img->file }}">{{ $img->file }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <img id="img_thumb" src="http://www.qbcsolutions.eu/wp-content/uploads/2013/11/default_image_01.png" style="height:auto;width:200px;">
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" rows="10" name="desc">{{ $single->desc }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Usia Bangunan</label>
                                    <div class="col-sm-5">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <select class="selectpicker" data-style="btn btn-primary btn-round"
                                            title="Single Select" data-size="7" name="building_age">
                                                <option disabled selected>Pilih Usia Bangunan</option>
                                                <option value="0-5 Tahun" {{ $single->building_age == '0-5 Tahun' ? "selected" : "" }}>0 - 5 Tahun</option>
                                                <option value="0-10 Tahun" {{ $single->building_age == '0-10 Tahun' ? "selected" : "" }}>0 - 10 Tahun</option>
                                                <option value="0-15 Tahun" {{ $single->building_age == '0-15 Tahun' ? "selected" : "" }}>0 - 15 Tahun</option>
                                                <option value="0-20 Tahun" {{ $single->building_age == '0-20 Tahun' ? "selected" : "" }}>0 - 20 Tahun</option>
                                                <option value="0-25 Tahun" {{ $single->building_age == '0-25 Tahun' ? "selected" : "" }}>0 - 25 Tahun</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Fasilitas</label>
                                    @php
                                    @endphp
                                    <div class="col-sm-4 col-sm-offset-1 checkbox-radios">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fac[ac]" {{ !empty($single->facs->where('name', 'ac')->first()) ? "checked" : "" }}> AC
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fac[parking_lot]" {{ !empty($single->facs->where('name', 'ac')->first()) ? "checked" : "" }}> Tempat Parkir
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fac[swimming_pool]" {{ !empty($single->facs->where('name', 'swimming_pool')->first()) ? "checked" : "" }}> Kolam Renang
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fac[laundry_room]" {{ !empty($single->facs->where('name', 'laundry_room')->first()) ? "checked" : "" }}> Ruang Laundry
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="fac[rest_room]" {{ !empty($single->facs->where('name', 'rest_room')->first()) ? "checked" : "" }}> Tempat Santai
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Nama author</label>
                                    <div class="col-lg-5 col-md-6 col-sm-3">
                                        <input type="text" class="form-control" placeholder="Nama author" name="contact_name" value="{{ $single->contact_name }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Email yang bisa dihubungi</label>
                                    <div class="col-lg-5 col-md-6 col-sm-3">
                                        <input type="email" class="form-control" placeholder="Email yang bisa dihubungi" name="contact_email" value="{{ $single->contact_email }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Telepon yang bisa dihubungi</label>
                                    <div class="col-lg-5 col-md-6 col-sm-3">
                                        <input type="text" class="form-control" placeholder="Telepon yang bisa dihubungi" name="contact_phone" value="{{ $single->contact_phone }}">
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
