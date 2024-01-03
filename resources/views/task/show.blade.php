

@extends('task.layouts.master')

@section('title', $task->title)
@section('content')

  <div class="mb-4">
    <a href="{{ route('task.index') }}" class="link">← Go back to the task list!</a>
  </div>

  <p class="mb-4 text-slate-700">{{ $task->description }}</p>

  @if ($task->long_description)
    <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
  @endif

  <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated
    {{ $task->updated_at->diffForHumans() }}</p>

  <p class="mb-4">
    @if ($task->completed)
      <span class="font-medium text-green-500" style="color:rgba(1, 157, 1, 0.694)">Completed</span>
    @else
      <span class="font-medium text-red-500" style="color:red">Not completed</span>
    @endif
  </p>

  
  <div class="flex gap-2">
        <a href="{{ route('task.edit', ['id' => $task->id]) }}"class="btn">Edit</a>
  <div>
    
    <form method="POST" action="{{ route('task.status', $task->id) }}">
      @csrf
      @method('PUT')
      <button type="submit" class="btn">
        Mark as {{ $task->completed ? 'not completed' : 'completed' }}
      </button>
    </form>
  </div>

  <div>
    


    <form method="POST" action="{{ route('task.destroy', ['id' => $task->id]) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">Delete Task</button>
    </form>
    
  </div>
@endsection

