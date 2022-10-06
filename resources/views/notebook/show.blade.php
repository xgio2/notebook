@extends('layouts.main')
@section('content')
    <div>
        <div>
            <div>ФИО -  {{ $person->full_name }}</div>
        </div>
        <div>
            <div>Компания -  {{ $person->company }}</div>
        </div>
        <div>
            <div>Телефон -  {{ $person->number }}</div>
        </div>
        <div>
            <div>Email -  {{ $person->email }}</div>
        </div>
        <div>
            <div>День рождения -  {{ $person->date_birthday }}</div>
        </div>
        <div>
            <div>Фото -</div>
            <div><img width="300px" height="300px" class="img-fluid" src="{{ 'http://127.0.0.1:8876/storage/' . $person->image }}"></div>
        </div>
        <div>
           <button> <a href="{{ route('notebook.index') }}">BACK</a> </button>
        </div>
        <div>
            <button> <a href="{{ route('notebook.edit', $person->id) }}">Edit</a> </button>
        </div>
        <div>
            <form action="{{ route('notebook.delete', $person->id) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="Delete">
            </form>
        </div>
    </div>
@endsection
