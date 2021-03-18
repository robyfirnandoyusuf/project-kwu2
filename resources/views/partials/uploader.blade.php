@php $dropzoneId = isset($dz_id) ? $dz_id : str_random(8);@endphp
<div id="{{$dropzoneId}}" class="dropzone">
    <div class="dz-default dz-message">
        @if (empty($title))
            <h3>Drop files here or click to upload.</h3>
        @else
            <h3>{{ $title }}</h3>
        @endif
        @if (empty($title))
            <p class="text-muted">Any related files you can upload <br>
        @else
            <p class="text-muted"> {{ $desc }}<br>
        @endif
            <small>One file can be max {{ config('media.max_size', 0) / 1000 }} MB</small></p>
    </div>
</div>
<!-- Dropzone {{ $dropzoneId }} -->

@push('js-uploader')
<script>
    // Turn off auto discovery
    Dropzone.autoDiscover = false;

    $(function () {
        var uploadedFiles = [];
        // Attach dropzone on element
        $("#{{ $dropzoneId }}").dropzone({
            url: "{{ route('admin.media.store') }}",
            addRemoveLinks: true,
            maxFilesize: {{ isset($maxFileSize) ? $maxFileSize : config('media.max_size', 1000) / 1000 }},
            acceptedFiles: "{!! isset($acceptedFiles) ? $acceptedFiles : config('media.allowed') !!}",
            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
            params: {!! isset($params) ? json_encode($params) : '{}'  !!},
            init: function () {
                // uploaded files

                @if(isset($uploadedFiles) && count($uploadedFiles))

                // show already uploaded files
                uploadedFiles = {!! json_encode($uploadedFiles) !!};
                var self = this;

                uploadedFiles.forEach(function (file) {
                    // Create a mock uploaded file:
                    var uploadedFile = {
                        name: file.file,
                        //uid: file.uid,
                        /*size: file.size,
                        type: file.mime,*/
                        dataURL: "/storage/upload/"+file.file
                    };

                    // Call the default addedfile event
                    self.emit("addedfile", uploadedFile);
                    self.emit("success", uploadedFile);

                    // Image? lets make thumbnail
                    self.createThumbnailFromUrl(
                        uploadedFile,
                        self.options.thumbnailWidth,
                        self.options.thumbnailHeight,
                        self.options.thumbnailMethod,
                        true, function(thumbnail) {
                            self.emit('thumbnail', uploadedFile, thumbnail);
                    });


                    // fire complete event to get rid of progress bar etc
                    self.emit("complete", uploadedFile);
                })
                @endif
        
                this.on("success", function (file, responseText) {
                    console.log('file on succes', file.upload.uuid);
                    uploadedFiles.push({
                        name: responseText.file,
                        //uid: responseText.uid,
                        uuid: file.upload.uuid,
                        size: file.size,
                        type: file.mime,
                        dataURL: file.url
                    });
                });

                // Handle added file
                this.on('addedfile', function(file) {
                    var thumb = getIconFromFilename(file);
                    $(file.previewElement).find(".dz-image img").attr("src", thumb);
                })

                // handle remove file to delete on server
                this.on("removedfile", function (file) {
                    // try to find in uploadedFiles
                    console.log('removed', file.upload.uuid);
                    console.log('arr', uploadedFiles);
                    var found = uploadedFiles.find(function (item) {
                        // check if filename and size matched
                        return (item.uuid === file.upload.uuid) && (item.size === file.size);
                    })
                    console.log('ok', found);

                    // If got the file lets make a delete request by id
                    if( found != undefined) {
                        $.ajax({
                            url: "/admin/destroy-media/"+found.name,
                            type: 'DELETE',
                            success: function(response) {
                                console.log('deleted');
                            }
                        });
                    }
                });

                // Handle errors
                this.on('error', function(file, response) {
                    var errMsg = response;

                    if( response.message ) errMsg = response.message;
                    if( response.file ) errMsg = response.file[0];

                    $(file.previewElement).find('.dz-error-message').text(errMsg);
                });
            }
        });
    })

// Get Icon for file type
function getIconFromFilename(file) {
    // get the extension
    var ext = file.name.split('.').pop().toLowerCase();

    // if its not an image
    if( file.type.indexOf('image') === -1 ) {

        // handle the alias for extensions
        /*if(ext === 'docx') {
            ext = 'doc'
        } else if (ext === 'xlsx') {
            ext = 'xls'
        }*/

        return "/images/icon/"+ext+".svg";
    }

    // return a placeholder for other files
    return '/images/icon/txt.svg';
}
</script>
@endpush