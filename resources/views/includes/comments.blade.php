@foreach ($comments as $comment)
<div class="row position-relative mx-2 mt-3 w-100">
    <div class="d-flex">
        <img src="/img/profile/{{$comment->user->img_url}}" alt="" class="rounded-circle"
            style="width: 40px; height: 40px;">
        <div class="d-flex justify-content-center flex-column ml-2">
            <p class="font-weight-bold mb-0" style="line-height: 1.2;">
                {{ $comment->user_id == Auth::id() ? 'You' : $comment->user->name}}
            </p>
            <p class="text-secondary mb-0" style="line-height: 1.2;" style="font-size: 13px;">
                {{$comment->comment}}</p>
            <p class="text-secondary mb-0" style="font-size: 12px;">
                {{ \Carbon\Carbon::parse($comment->created_at)->diffForhumans() }}</p>
        </div>
    </div>
</div>
@endforeach