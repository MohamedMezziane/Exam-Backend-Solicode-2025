@extends('layouts.app')

@section('title', 'Edit This Salle')

@section('content')

<form action="{{ route('salles.update', $exactSalle->id) }}" method="POST">
    @csrf
    @method('PUT')

    <h2>{{ __('messages.updateTitle') }}</h2>
    
    <br><div class="form-group">
      <label for="inputAddress">{{ __('messages.salleName') }}</label>
      <input type="text" class="form-control" name="name" value="{{ $exactSalle->name }}" required>
    </div>

    <br><div class="form-group">
        <label for="inputAddress">{{ __('messages.salleEspace') }}</label>
        <input type="number" class="form-control" name="espace" value="{{ $exactSalle->espace }}" required>
    </div>
    
    <br><label for="inputAddress">{{ __('messages.salleNature') }}</label>
    <select class="form-select" aria-label="Default select example" name="nature_id">
        @foreach ($allNatures as $nature)
            <option value="{{ $nature->id }}">{{ $nature->name }}</option>
        @endforeach
    </select>

    <br><button type="submit" class="btn btn-primary">{{ __('messages.updateTitle') }}</button>
</form>




@endsection
