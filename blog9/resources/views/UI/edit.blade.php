@extends('layouts.main')


@section('main-layout')
    <title>{{ $title = 'Edit Info' }}</title>

    <form method="post" action="/UI/{{ $blog->id }}/update" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input name="name" value="{{ $blog->name }}" type="text" class="form-control text-white bg-black" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Position</label>
            <input name="position" value="{{ $blog->position }}" type="position" class="form-control text-white bg-black" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" value="{{ $blog->email }}" type="email" class="form-control text-white bg-black" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone Number</label>
            <input name="phone" value="{{ $blog->phone }}" type="number" class="form-control text-white bg-black" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Blood Group</label>
            <input name="blood" value="{{ $blog->blood }}" type="string" class="form-control text-white bg-black" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label class="form-label" for="customFile">Change Image</label>
            <input name="image" type="file" class="form-control text-white bg-black" id="image" />
        </div>

        <button type="submit" class="btn btn-info">Update</button>
    </form>
@endsection
