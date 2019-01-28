@extends('layouts.app')

@section('content')

 @if(isset($tasks))
  <div id="accordion" class="container">
  @foreach($tasks as $task)
 <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$task->id}}" aria-expanded="true" aria-controls="collapseOne">
          {{$task->title}}
        </button>
      </h5>
    </div>

    <div id="collapse{{$task->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        {{$task->description}}
      </div>
    </div>
  </div>
  @endforeach

    </div>
  @endif
@endsection
