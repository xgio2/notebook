@extends('layouts.main')
@section('content')
    <div>
        <div>
            <button>
            <a href="{{ route('notebook.create') }}">CREATE PERSON</a>
            </button>
        </div>
        <div>
            @foreach($persons as $person)
                <div><a href="{{ route('notebook.show', $person->id) }}">{{ $person->id }}. {{ $person->full_name }}</a></div>
            @endforeach
        </div>
    </div>
          {{ $persons->render() }}

@endsection
