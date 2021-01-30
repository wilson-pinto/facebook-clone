@extends('layout.app')
@section('body')

<div class="col-8 mx-auto pb-5">
    <div class="row px-2 py-2 mt-3">
        <div class="col-2 px-1">
            <div class="story-placeholder shadow-sm center">
            </div>
        </div>

        <div class="col-2 px-1">
            <div class="story-placeholder shadow-sm"></div>
        </div>
        <div class="col-2 px-1">
            <div class="story-placeholder shadow-sm"></div>
        </div>
        <div class="col-2 px-1">
            <div class="story-placeholder shadow-sm"></div>
        </div>
        <div class="col-2 px-1">
            <div class="story-placeholder shadow-sm"></div>
        </div>
        <div class="col-2 px-1">
            <div class="story-placeholder shadow-sm"></div>
        </div>
    </div>

    <div class="row justify-content-around bg-white shadow-sm p-3 mx-0 mt-2 rounded-lg">
        <button class="btn-none home-picker">
            <i class="fa fa-video-camera" aria-hidden="true"></i> &nbsp;
            <span class="font-weight-bold">Live</span>
        </button>
        <button class="btn-none home-picker" id="imgPicker">
            <i class="fa fa-camera" aria-hidden="true"></i> &nbsp;
            <span class="font-weight-bold">Photo</span>
        </button>
        <button class="btn-none home-picker">
            <i class="fa fa-smile-o" aria-hidden="true"></i> &nbsp;
            <span class="font-weight-bold"> Feeling/Activity</span>

        </button>
    </div>
</div>

<div class="modal fade" id="createPostModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col px-0">
                    <div class="row center position-relative mx-3 mt-2">
                        <h4>Create Post</h4>
                        <button type="button" class="close modal-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="" class="w-100 px-3">
                        <input id="postImage" type="file" name="postImage"
                            class="d-none form-control @error('profile') is-invalid @enderror">
                        <div class="row w-100 mt-3 mx-0">
                            <div class="form-group w-100">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0"
                                    placeholder="What's on your mind?" name="title">
                            </div>
                        </div>
                        <img id="postImgPlaceHolder" src="/img/no-img.png" class="w-100 mt-2" alt="">
                        <button type="submit" class="btn-primary btn w-100 font-weight-bold mt-3 mb-3">Post</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection



@section('scripts')
<script>
    $("#imgPicker").click(function(e) {
        $("#postImage").click();
    });

    $("#postImage").change(function(){
        $('#createPostModal').modal('show')

        if (this.files && this.files[0]) {
            var imageFile = this.files[0];
            var reader = new FileReader();    
            reader.onload = function (e) {
                $('#postImgPlaceHolder').attr('src', e.target.result);
            }    
            reader.readAsDataURL( imageFile );
         }
    });
</script>
@endsection