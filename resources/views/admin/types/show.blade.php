@extends('layouts.app')

@section('content')
<div class="container py-2">
    <a href="{{ route('admin.types.index') }}" class="">
        <button class="btn btn-outline-secondary mb-3">Return to the list</button>
    </a>
    <a href="{{ route('admin.types.edit', $type) }}" class="">
        <button class="btn btn-outline-secondary mb-3">Edit type</button>
    </a>
  
    <div class="row my-3">        
        <div class="col-12"><strong>Name: </strong> {{$type->label}}</div>
        <div class="col-12"><strong>Color: </strong>{!! $type->getBadgeColor() !!}</div>     
    </div>
</div>
@endsection
