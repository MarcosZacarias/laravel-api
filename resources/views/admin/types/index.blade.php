@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="container">
    <h1>List types</h1>

    <a href="{{ route('admin.types.create') }}" class="">
        <button class="btn btn-outline-primary mb-3">Create new type</button>
    </a>

    <table class="table w-50">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Color</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @forelse ($types as $type)
            <tr>
                <th scope="row">{{$type->id}}</th>
                <td colspan="">{{$type->label}}</td>
                <td>{!! $type->getBadgeColor() !!}</td>
                <td colspan="4">
                    <div class="d-flex justify-content-around mt-auto">
                    <a href="{{ route('admin.types.show', $type->id) }}" class="mx-1">
                      <i class="fa-solid fa-up-right-from-square"></i>
                    </a>
                    <a href="{{ route('admin.types.edit', $type) }}" class="mx-1">
                      <i class="fa-solid fa-pencil"></i>
                    </a>
                    
                    <!-- Button trigger modal -->
                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$type->id}}" class="mx-1 text-danger">
                      <i class="fa-solid fa-trash"></i>
                    </a>
            
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal-{{$type->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminate type</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to eliminate the type <strong>"{{$type->label}}"</strong>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{route('admin.types.destroy', $type)}}" method="POST" class="mx-1">
                              @csrf
                              @method('DELETE')
                              
                              <button class="btn btn-danger">Eliminate</button>
                              
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div></td>
            </tr>
            @empty
            <tr>
                <td colspan="n">Nessun risultato</td>
            </tr> 
            @endforelse
          
        </tbody>
      </table>
</div>
@endsection
