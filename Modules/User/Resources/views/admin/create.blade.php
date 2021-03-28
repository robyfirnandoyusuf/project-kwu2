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
                        <form method="POST" action="{{ route('admin.user.store', ['type' => $type]) }}"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header card-header-text" data-background-color="rose">
                                <h4 class="card-title">{{ $title }}</h4>
                            </div>
                            <div class="card-content">
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            <button type="button" aria-hidden="true" class="close">
                                                <i class="material-icons">close</i>
                                            </button>
                                            <span>
                                                <b> Error - </b> {{ $error }} </span>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Nama</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" name="name" placeholder="Nama" value="{{ old('username') }}">
                                            {{-- <span class="help-block">A block of help text that breaks onto a new
                                                line.</span> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Email</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Password</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Telepon</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="number" class="form-control" name="phone" placeholder="Telepon" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <div class="col-sm-5 checkbox-radios">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" value="1"> Laki - Laki
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="gender" value="2"> Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">NIK / NIS / No.SIM (ID Identitas lain)</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="number" class="form-control" name="identity" placeholder="No. Identitas" value="{{ old('identity') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Avatar</label>
                                    <div class="col-sm-10">
                                        <div class="col-md-3 col-sm-4">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-circle">
                                                    <img src="/backend-assets/img/placeholder.jpg" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                <div>
                                                    <span class="btn btn-round btn-rose btn-file">
                                                        <span class="fileinput-new">Add Photo</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="avatar" />
                                                    </span>
                                                    <br />
                                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Status</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <select class="selectpicker" data-style="btn btn-primary btn-round"
                                                    title="Pilih Tipe User" data-size="7" name="active_status">
                                                    <option disabled selected>Pilih Status</option>
                                                    @foreach (['active', 'non-active'] as $status)
                                                        <option value="{{ $status }}" {{ old('type') == $status ? "selected" : ""}}>{{ ucfirst($status) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 label-on-left">Alamat</label>
                                    <div class="col-sm-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <textarea type="text" class="form-control" name="address">{{ old('address') }}</textarea>
                                            </div>
                                        </div>
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
