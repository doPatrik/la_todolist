@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="todo_container">
            @include('inc.messages')

            <form action="{{route('todo.update', $todo->id)}}" method="post" class="mb-5">
                @csrf
                <div class="form_container">
                    <div class="form-grou w-50">
                        <label for="todo">Teendő</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name') ? old('name') : $todo->name}}" >
                    </div>
                    <div class="submit_button">
                        <input type="submit" class="btn btn-primary mt-4" value="Mentés">
                    </div>
                </div>
            </form>
    </div>
@endsection
