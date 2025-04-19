@extends('layouts.app')
<div>
    @section('title', 'The task list')


    @section('content')
    <nav class="mb-4">
        <a href="{{route('tasks.create')}}" class="link" >Add task!</a>
    </nav>

    @forelse ($tasks as $task)
        <div >
            <a href="{{ route('task.show', ['task' => $task->id])}}" style="color: black"  @class(['line-through' => $task->completed])>
                {{ $task->title }}
            </a>
        </div>

    @empty
        <p>The task list is empty</p>
    @endforelse
        @if($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav >
        @endif
    @endsection
</div>
