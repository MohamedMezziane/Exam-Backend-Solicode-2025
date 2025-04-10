@extends('layouts.app')

@section('title', 'Salle Details')

@section('content')

    {{-- Show Exact Data Part --}}
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            {{ __('messages.salleId') }} : {{ $exactSalle->id }}
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">{{ __('messages.salleName') }} : {{ $exactSalle->name }}</li>
        <li class="list-group-item">{{ __('messages.salleEspace') }} : {{ $exactSalle->espace }}</li>
        <li class="list-group-item">{{ __('messages.salleNature') }} : {{ $exactSalle->Nature->name }}</li>
        </ul>
    </div>





@endsection
