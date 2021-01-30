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

    @foreach ($posts as $post)
    <div class="row justify-content-around bg-white shadow-sm py-3 mx-0 mt-3 rounded-lg">
        <div class="col px-0">
            <div class="d-flex align-items-center pl-3">
                <img src="/img/profile/{{$post->user->img_url}}" alt="" class="rounded-circle"
                    style="width: 40px; height: 40px;">
                <div class="d-flex justify-content-center flex-column ml-2">
                    <p class="font-weight-bold mb-0" style="line-height: 1;">{{$post->user->name}}</p>
                    <p class="text-secondary mb-0" style="font-size: 12px;">
                        {{ \Carbon\Carbon::parse($post->user->created_at)->diffForhumans() }}</p>
                </div>
            </div>
            <p class="mt-3 mb-0 px-3 text-secondary">
                {{$post->caption}}
            </p>
            <img src="/img/post/{{$post->img_url}}" class="w-100 mt-2" alt="">
            <div class="row mx-0 px-3 mt-3 font-weight-bold">
                <div class="d-flex">
                    <button class="btn-none" value="{{$post->isLiked(Auth::id())  != null ?  1 : 0 }}"
                        onclick="like({{$post->id}}, $(this), $(this).siblings('.count'))">
                        <i class="fa {{$post->isLiked(Auth::id())  != null ?  'fa-heart' : 'fa-heart-o' }} text-danger"
                            aria-hidden="true"></i>
                    </button>
                    <p class="mb-0 pl-3 count">
                        {{$post->likes_count}} Like{{$post->likes_count == 1 ?'' : 's'}}
                    </p>
                </div>
                <p class="mb-0 pl-5">
                    <i class="fa fa-comment-o" aria-hidden="true"></i> &nbsp;
                    {{$post->comments_count}} Comment{{$post->comments_count == 1 ?'' : 's'}}
                </p>
            </div>
        </div>
    </div>
    @endforeach
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

                    <form enctype="multipart/form-data" action="/create-post" method="POST" class="w-100 px-3">
                        @csrf
                        <input id="postImage" type="file" name="postImage"
                            class="d-none form-control @error('profile') is-invalid @enderror">
                        <div class="row w-100 mt-3 mx-0">
                            <div class="form-group w-100">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0"
                                    placeholder="What's on your mind?" name="caption">
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


    function like(postId, btn, p){
        var status = parseInt(btn.val()) ;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
             type: "POST",
             url: "/like",
             dataType: 'json',
             data: {
                 postId: postId,
                 status: status,
             },
             success: function (data) {
                 btn.val(status == 1 ? 0 : 1)
                 var epo =  data.count == 1 ? '' : 's';
                 p.html(data.count + ' Like' + epo)
                 if(parseInt(btn.val()) == 0){
                    btn.children('i').removeClass('fa-heart');
                    btn.children('i').addClass('fa-heart-o');
                 } else{
                    btn.children('i').removeClass('fa-heart-o');
                    btn.children('i').addClass('fa-heart');
                 }
             },
             error: function (data) {
                 console.log(data);
             }
        });
    }
</script>
@endsection