@extends('layouts.nesdb')

@section('content')
<style>
	.game{
		margin-bottom: 10px;
	}
</style>
@if(isset($console))
	<h1>{{ $console }}</h1>
@else
	<h1>All</h1>
@endif

	@if($games->count())
		@foreach($games as $game)
			<div class="game">
				<a href="{{ route('game', $game->slug)}}">{{ $game->title }}</a> <br>
				<div>
					@include('partials._voting')
				</div>
			</div>
		@endforeach
	@else
		Inget funnet
	@endif
@endsection