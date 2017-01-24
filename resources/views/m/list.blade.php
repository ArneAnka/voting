@extends('layouts.nesdb')

@section('content')
@if(isset($console))
	<h1>{{ $console }}</h1>
@else
	<h1>All</h1>
@endif

	@if($games->count())
		<game-list :games-list="{{ $games }}"></game-list>
	@else
		Inget funnet
	@endif
@endsection