@foreach($comments as $comment)
	<div class="comment">
		#{{$comment->id}} <strong>{{ $comment->user->name }}</strong> @if($comment->comment)
			<i>in reply to {{$comment->comment->user->name}}</i> <a href="{{ route('game', [$game->slug]) }}#{{ $comment->id }}">#{{$comment->parent_id}}</a>
		@endif
		&bull; {{ $comment->created_at->diffForHumans() }}
		<p>{{ $comment->body }}</p>

		<form action="{{ route('comment.store', [$game, $comment]) }}" method="post">
		{{ csrf_field() }}
			<textarea name="body" id="{{$comment->id}}" placeholder="please be nice">{{old('body')}}</textarea>
            @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong><br>
                </span>
            @endif
            <br>
			<input type="submit" />
		</form>

		@include('partials._comments', ['comments' => $comment->replies])
	</div>
@endforeach