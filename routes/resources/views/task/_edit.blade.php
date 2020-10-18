@extends('layouts.app')

@section('content')

	<form method="post" action="{{ route('tasks.update', $task->id) }}">
    <div id="myDIV" class="header">
      <h2>Task Editing</h2>
      @csrf
	    @method('PATCH')

      <input type="text" name="title" placeholder="Title..." value="{{ $task->title }}">
      <button type="submit" class="addBtn">Save</button>
    </div>
  </form>
@endsection