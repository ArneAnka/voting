@extends('layouts.nesdb')

@section('content')
@if(isset($console))
	<h1>{{ $console }}</h1>
@else
	<h1>All</h1>
@endif

	@if($games->count())
		@foreach($games as $game)
			<div class="game" style="margin-bottom: 10px">
				<a href="{{ route('game', $game->slug)}}">{{ $game->title }}</a> <br>
				<div class="voting">
					<game-voting game-slug="{{ $game->slug }}"></game-voting>
				</div>
			</div>
		@endforeach
	@else
		Inget funnet
	@endif
@endsection