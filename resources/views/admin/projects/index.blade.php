@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
  integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
  <section class="container mt-3">
    <h1>List Projects</h1>

    <a href="{{ route('admin.projects.create') }}" class="">
        <button class="btn btn-outline-primary mb-3">Create new project</button>
    </a>

    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-4">
      @forelse ($projects as $project)
      <div class="col">
        <div class="card h-100">
          <div class="card-header" style={{$project->getTypeColor()}}>              
            <div>
              <strong>Type: </strong>
              @if ($project->type)
              {{$project->type?->label}}                  
              @else
              Untyped
              @endif
            </div>
            <div>
              {!!$project->getTechnologyBadges()!!}
            </div>        
          </div>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">
              <strong>Project Name: </strong> {{$project->name}}
            </h5>
            <p>
              <strong>Description: </strong> {{$project->getDescriptionIndex(100)}}
            </p>             
            <div class="d-flex justify-content-around mt-auto">
              <a href="{{ route('admin.projects.show', $project->id) }}" class="mx-1 btn btn-outline-primary">
                <i class="fa-solid fa-up-right-from-square"></i> <span>Info</span>
              </a>
              <a href="{{ route('admin.projects.edit', $project) }}" class="mx-1 btn btn-outline-primary">
                <i class="fa-solid fa-pencil"></i> <span>Edit</span>
              </a>
              
              <!-- Button trigger modal -->
              <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$project->id}}" class="mx-1 btn btn-outline-danger">
                <i class="fa-solid fa-trash"></i> <span>Delete</span>
              </a>
      
              <!-- Modal -->
              <div class="modal fade" id="deleteModal-{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminate project</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Are you sure you want to eliminate the project <strong>"{{$project->name}}"</strong>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <form action="{{route('admin.projects.destroy', $project)}}" method="POST" class="mx-1">
                        @csrf
                        @method('DELETE')
                        
                        <button class="btn btn-danger">Eliminate</button>
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>          
      </div>
      @empty
      <h2>Non ci sono risultati</h2>
      @endforelse
    </div>       

    <div class="my-2">
        {{$projects->links('pagination::bootstrap-5')}}
    </div>
  </section>
@endsection
