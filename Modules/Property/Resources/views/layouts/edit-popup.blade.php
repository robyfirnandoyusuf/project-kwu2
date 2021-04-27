<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="material-icons">clear</i>
            </button>
            <h4 class="modal-title">{{$property->title}}</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills nav-pills-rose">
                        <li class="active">
                            <a href="#pill1" data-toggle="tab" aria-expanded="true">Status</a>
                        </li>
                        <li class="">
                            <a href="#pill2" data-toggle="tab" aria-expanded="false">Images</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="pill1">
                            <form action="{{route('admin.popup.property.update', $property->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <label class="col-sm-4 label-on-left">Status Property</label>
                                <div class="col-sm-8 checkbox-radios">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="1" @if($property->active_status == 1)checked="true" @endif><span class="circle"></span><span class="check"></span> Active
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="2" @if($property->active_status == 2)checked="true" @endif><span class="circle"></span><span class="check"></span> Inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-4 label-on-left">Is Featured</label>
                                <div class="col-sm-8 checkbox-radios">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="is_featured" value="1" @if($property->is_featured == 1)checked="true" @endif><span class="circle"></span><span class="check"></span> Yes
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="is_featured" value="0" @if($property->is_featured == 0)checked="true" @endif><span class="circle"></span><span class="check"></span> No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-footer text-right">
                                        <button type="submit" class="btn btn-fill btn-rose">Simpan<div class="ripple-container"></div></button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="pill2">
                            <div class="row">
                                @foreach ($property->gallery as $gallery)
                                <div class="col-md-4">
                                    {{-- TODO: Move to external CSS --}}
                                    <form action="{{ route('admin.popup.property.delete_image') }}" method="post">
                                    @csrf
                                    <div class="container-gallery" style="position: relative;">
                                        {{-- TODO: Move to external CSS --}}
                                        <input type="hidden" value="{{ $gallery->pivot->id }}" name="gallery_id">
                                        <button type="submit" class="btn btn-danger btn-round btn-fab btn-fab-mini btn-gallery" onclick="return confirm('Anda yakin akan menghapus image ini ?');" style="position: absolute;right: -10px;top: -10px;">
                                                <i class="material-icons">clear</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                        {{-- TODO: Move to external css --}}
                                        <a data-fancybox="gallery" href="/storage/{{ $gallery->file }}">
                                            <img src="/storage/{{ $gallery->file }}" class="img-responsive" style="object-fit: cover;width:230px;height:230px;">
                                        </a>
                                    </div>
                                    </form>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>