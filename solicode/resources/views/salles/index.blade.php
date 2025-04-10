@extends('layouts.app')

@section('title', 'All Salles')

@section('content')

  {{-- Alert Message if Success --}}
  @if( session('success') )
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
  @endif
  <br>

  {{-- Create New Salle Button --}}
  <a href="{{ route('salles.create') }}"><button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> {{ __('messages.createBtn') }}</button></a><br><br>

  {{-- Search Form --}}
  <div class="d-flex justify-content-between">

    <form action="{{ route('salles.index') }}" method="GET" class="d-flex" style="width: 49%">
        @csrf
        <div class="input-group" >
            <input type="text" name="search" placeholder="{{ __('messages.searchPlaceholder') }}" class="form-control">
        </div>
          
        <button type="submit" class="btn btn-primary">{{ __('messages.searchbtn') }}</button>
    </form><br>

    {{-- Filter By Natures --}}
    <form action="{{ route('salles.index') }}" method="GET" class="d-flex" style="width: 49%">
        @csrf   
        <select class="form-select"  aria-label="Default select example" name="nature_id">
          @foreach ($allNatures as $nature)
            <option value="{{ $nature->id }}">{{ $nature->name }}</option>
          @endforeach
        </select>

        <button type="submit" class="btn btn-primary">{{ __('messages.filterByCategory') }}</button>
    </form>
  </div>
  

  {{-- Table Part --}}
  <br><table class="table">
      <thead class="thead-dark" style="text-align: center">
        <tr>
          <th scope="col">#</th>
          <th scope="col">{{ __('messages.salleName') }}</th>
          <th scope="col">{{ __('messages.salleEspace') }}</th>
          <th scope="col">{{ __('messages.salleNature') }}</th>
          <th scope="col" style="width: 150px">{{ __('messages.actions') }}</th>
        </tr>
      </thead>

      <tbody style="text-align: center">

        @foreach ($allSalles as $salle)
        <tr>
          <th scope="row">{{ $salle->id }}</th>
          <td>{{ $salle->name }}</td>
          <td>{{ $salle->espace }}</td>
          <td>{{ $salle->Nature->name }}</td>
          <td class="d-flex justify-content-around" >
            <a href="{{ route('salles.show', $salle->id) }}" style="text-align: center; border-radius: 7px; width: 31px; height: 31px; background-color: #16d173da; color: white; padding-top: 2px;"><i class="fa-solid fa-eye"></i></a>
            <a href="{{ route('salles.edit', $salle->id) }}" style="text-align: center; border-radius: 7px; width: 31px; height: 31px; background-color: rgb(248, 188, 75); color: white; padding-top: 2px;"> <i class="fa-solid fa-pen-to-square"></i></a>

            <form action="{{ route('salles.destroy', $salle->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" style="text-align: center; border-radius: 7px; width: 31px; height: 31px; background-color: rgb(235, 80, 80); color: white; border: none;"><i class="fa-solid fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach

      </tbody>
  </table>
    

  {{-- Pagination Part --}}
  <div>
    {{ $allSalles->links('pagination::bootstrap-5') }}
  </div>



@endsection
