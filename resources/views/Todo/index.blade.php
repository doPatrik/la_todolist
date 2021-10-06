@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="todo_container">
            @include('inc.messages')

            <form action="{{route('todo.store')}}" method="post" class="mb-5">
                @csrf
                <div class="form_container">
                    <div class="form-grou w-50">
                        <label for="todo">Teendő</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="submit_button">
                        <input type="submit" class="btn btn-primary mt-4" value="Hozzáad">
                    </div>
                </div>
            </form>

            @foreach($todos as $todo)
                <div class="todo_list @if($todo->is_completed) bg-success @elseif($todo->is_delayed) bg-danger @endif }}">
                    <div class="todo_item">
                        <div class="information">
                            <h3>{{$todo->name}}</h3>
                            <span class="timestamp">{{$todo->created_at->diffForHumans()}}</span>
                        </div>
                        <div class="actions">
                            <div>
                                <form action="{{route('todo.complete', $todo->id)}}" method="post">
                                    @method('PUT')
                                    @csrf

                                    @if($todo->is_completed)
                                        <input type="text" value="0" name="complete" hidden>
                                        <button class=" btn btn-warning">Mégse</button>
                                    @else
                                        <input type="text" value="1" name="complete" hidden>
                                        <button class=" btn btn-success">Kész</button>
                                    @endif
                                </form>
                            </div>
                            <div>
                                @if(!$todo->is_completed)
                                    <form action="{{route('todo.delayed', $todo->id)}}" method="post" id="delayed-form">
                                        @method('PUT')
                                        @csrf
                                        @if($todo->is_delayed)
                                            <input type="text" value="0" name="delayed" hidden>
                                            <button class="icon"><i class='bx bx-left-arrow-circle'></i></button>
                                        @else
                                            <input type="text" value="1" name="delayed" hidden>
                                            <button class="icon"><i class='bx bx-right-arrow-circle'></i></button>
                                        @endif
                                    </form>
                                @endif
                            </div>
                            <div>
                                <form action="{{route('todo.destroy', $todo->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="icon"><i class='bx bx-trash' ></i></button>
                                </form>
                            </div>
                            <div>
                                <form action="{{route('todo.edit', $todo->id)}}" method="get">
                                    @csrf
                                    <button class="icon"><i class='bx bx-edit-alt' ></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
