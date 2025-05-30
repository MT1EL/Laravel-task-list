@extends('layouts.app')
<div>
    @section('title', $task->title)


    @section('content')


        <div class="mb-4">
            <a href="{{route('tasks.index')}}" class="link" ><- Go Back to the task list</a>
        </div>

        <p class="mb-4 text-slate-700">{{ $task->description }}</p>

        @if ($task->long_description)
            <p class="mb-4 text-slate-700">{{ $task->long_description }} </p>
        @endif

        <p class="text-sm text-slate-500" >Created: {{ $task->created_at->diffForHumans() }}</p>
        <p class="mb-4 text-sm text-slate-500" >updated: {{ $task->updated_at->diffForHumans() }}</p>

        <p class="mb-4">
            @if ($task->completed)
                <span class="font-medium  text-green-500">completed</span>
            @else
                <span class="text-medium text-red-500">not completed</span>
            @endif
        </p>

        <div class="flex gap-2 justify-stretch flex-col">
            <a href="{{ route('tasks.edit', ['task' => $task]) }}"
                class="btn">
                Edit
            </a>

            <form method="POST" action="{{route('tasks.toggleComplete', ['task' => $task])}}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn w-100">Mark as {{ $task->completed ? 'not completed' : 'completed'  }}</button>
            </form>




        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')


            <button type="submit" class="btn w-100">DELETE</button>
        </form>
    @endsection

</div>
