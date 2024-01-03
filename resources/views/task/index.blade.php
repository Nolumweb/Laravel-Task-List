@extends('task.layouts.master')

@section('title', 'All Task')

@section('content')



<nav class="mb-4">
    <a href="{{ route('add') }}" class="font-medium text-gray-700 underline decoration-pink-500">Add Task Here!</a>
</nav>

@forelse ($data as $task)
    <div>
        <a href="{{ route('task.show', ['id' => $task->id]) }}" class="{{ $task->completed ? 'line-through' : '' }}">{{ $task->title }}</a>
    </div>
@empty
    <div>There are no tasks!</div>
@endforelse

@if ($data->count())
    <nav class="mt-4">
        {{ $data->links() }}
    </nav>
@endif



@endsection
