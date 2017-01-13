@extends('layouts.nesdb')

@section('content')
	<style>
		.comment .comment {
			margin-left: 20px;
			border-left: solid 1px;
			padding-left: 5px;
		}
	</style>

	<h1>comments on {{ $game->title }}, {{$game->console }}</h1>

	<form action="{{ route('top.level', $game) }}" method="post">
	{{ csrf_field() }}
		<textarea name="body" placeholder="please be nice" cols="50" rows="6">{{old('body')}}</textarea>
	    @if ($errors->has('body'))
	        <span class="help-block">
	            <strong>{{ $errors->first('body') }}</strong><br>
	        </span>
	    @endif
	    <br>
		<input type="submit" />
	</form>

	<hr style="border-top:px dotted;">

	@if($game->comments->count())
		@include('partials._comments', ['comments' => $game->comments])
	@else
		No comments, be the first to comment!
	@endif
@endsection