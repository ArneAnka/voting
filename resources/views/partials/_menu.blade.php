<a href="{{ route('all') }}"><img src="{{ url('/') }}/images/nintendo.png" style="height: 24px; width: 28px;"></a>
<a href="{{ route('nes') }}"><img src="{{ url('/') }}/images/nes.png" style="height: 24px; width: 40px;"></a>
<a href="{{ route('snes') }}"><img src="{{ url('/') }}/images/snes.png" style="height: 24px; width: 50px;"></a>

@php($searchRoutes = ['all', 'nes', 'snes'])
@if(in_array(request()->route()->getName(), $searchRoutes))
   @include('partials._search')
@endif