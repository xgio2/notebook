@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('notebook.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="full_name">FIO</label>
                <input type="text" name="full_name" class="form-control" id="full_name" placeholder="full_name">
            </div>
            <div class="form-group">
                <label for="company">company</label>
                <textarea name="company" class="form-control" id="company" placeholder="Company"></textarea>
            </div>
            <div class="form-group">
                <label for="number">number</label>
                <input type="text" name="number" class="form-control" id="number" placeholder="Number">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="date_birthday">date_birthday</label>
                <input type="text" name="date_birthday" class="form-control" id="date_birthday" placeholder="Date_birthday">
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" name="image" size="10" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
