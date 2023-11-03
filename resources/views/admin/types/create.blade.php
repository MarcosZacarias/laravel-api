@extends('layouts.app')

@section('content')
<div class="container py-2">
    <a href="{{ route('admin.types.index') }}" class="">
        <button class="btn btn-outline-secondary mb-3">Return to the list</button>
    </a>

    @if ($errors->any())
    <div class="alert alert-danger">
        <h4>Correct the errors:</h4>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  
        
    <form action="{{ route('admin.types.store')}}" method="POST" class="row">
        @csrf
    
        <div class="col-6">
            <label for="label" class="form-label"><strong>Name: </strong></label>
            <input
                type="text"
                class="form-control @error('label') is-invalid @enderror"
                id="label"
                name="label"
                value="{{ old('label')}}"
            />
            @error('label')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-6">
            <label for="color" class="form-label"><strong>Color: </strong></label>
            <input
                type="text"
                class="form-control @error('color') is-invalid @enderror"
                id="color"
                name="color"
                value="{{ old('color')}}"
            />
            @error('color')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-3">
            <button type="submit" class="btn btn-primary my-2">Salva</button>
        </div>
        

    </form>
    
</div>
@endsection

