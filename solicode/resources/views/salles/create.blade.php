@extends('layouts.app')

@section('title', 'Create New Salle')

@section('content')

<form action="{{ route('salles.store') }}" method="POST">
    @csrf

    <h2>{{ __('messages.createBtn') }}</h2>

    <br><div class="form-group">
      <label for="inputAddress">{{ __('messages.salleName') }}</label>
      <input type="text" class="form-control" name="name" placeholder="{{ __('messages.salleName') }}.." required>
    </div>

    <br><div class="form-group">
        <label for="inputAddress">{{ __('messages.salleEspace') }}</label>
        <input type="number" class="form-control" name="espace" placeholder="{{ __('messages.salleEspace') }}.." required>
    </div>
    
    <br><label for="inputAddress">{{ __('messages.salleNature') }}</label>
    <select class="form-select" aria-label="Default select example" name="nature_id">
        @foreach ($allNatures as $nature)
            <option value="{{ $nature->id }}">{{ $nature->name }}</option>
        @endforeach
    </select>

    <br><button type="submit" class="btn btn-primary">{{ __('messages.createBtn') }}</button>
</form>




@endsection
