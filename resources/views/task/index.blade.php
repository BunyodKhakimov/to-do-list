@extends('layouts.app')

@section('content')


  <form method="post" action="{{ route('tasks.store')}}" >
    <div id="myDIV" class="header">
      @csrf
      <h2>My To Do List</h2>
      <input type="text" name="title" placeholder="Title...">
      <button type="submit" class="addBtn">Add</button>
    </div>
  </form>

  <ul id="myUL">

  @foreach($tasks as $task)

    <li>
      <div class="task">
          {{$task->title}}
      </div>

      <div class="action">
          <form action="{{ route('edit', $task->id)}}" method="get">
            @csrf
            <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-edit"></i></button>
          </form>
      </div>

      <div class="action">
          <form action="{{ route('tasks.destroy', $task->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-trash-alt"></i></button>
          </form>
        
      </div>
    </li>
  @endforeach

  </ul>

@endsection