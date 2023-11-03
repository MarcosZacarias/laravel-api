@extends('layouts.app')

@section('content')
  <section class="container mt-3">
    <a href="{{ route('admin.projects.index') }}" class="">
      <button class="btn btn-outline-secondary mb-3">Return to the list</button>
  </a>
  <a href="{{ route('admin.projects.edit', $project) }}" class="">
      <button class="btn btn-outline-secondary mb-3">Edit project</button>
  </a>

  <div class="row">
      <div class="col-4">
          <img src="{{asset('/storage/'. $project->cover_img)}}" alt="">
      </div>
      <div class="col-8">
          <div class="row g-4">
              <div class="col-4"><strong>Name: </strong> {{$project->name}}</div>
              <div class="col-4"><strong>Type: </strong> {!! $project->getTypeBadge() !!} </div>
              @if ($project->technologies->toArray())
              <div class="col-4"><strong>Technologies: </strong>{!! $project->getTechnologyBadges() !!}</div>                                
              @endif
              <div class="col-12"><strong>Description: </strong> {{$project->description}}</div>
              <div class="col-12"><strong>Link repository: </strong><a href="{{$project->repo_path}}">{{$project->repo_path}}</a></div>
              <div class="col-4"><strong>Created at: </strong>{{$project->created_at}}</div>
              <div class="col-4"><strong>Updated at: </strong>{{$project->updated_at}}</div>
          </div>
      </div>
  </div>
  </section>
@endsection
