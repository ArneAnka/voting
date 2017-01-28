@extends('layouts.nesdb')

@section('content')
	<h1>comments on {{ $game->title }}, 
	@if($game->console == 'nes')
		<img src="{{ url('/') }}/images/nes.png" style="height: 24px; width: 50px;">
	@else
		<img src="{{ url('/') }}/images/snes.png" style="height: 24px; width: 50px;">
	@endif
	</h1>

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