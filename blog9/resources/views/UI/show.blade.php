@extends('layouts.main')

@section('main-layout')
<style>

</style>
    <title>{{ $title = 'Show Information' }}</title>
    <h1>Member Details</h1>
    <div>
        <div class="d-flex justify-content-center mt-5 ">
            <div class="card mb-3" style="max-width: 740px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="card-img-top" src="/storage/{{ $blog->image }}" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body text-white bg-black">
                            <div scope="row">Serial: {{ $blog->id }}</div><br>
                            <div>Name: {{ $blog->name }}</div><br>
                            <div>Position: {{ $blog->position }}</div><br>
                            <div>Email: {{ $blog->email }}</div><br>
                            <div>Phone: {{ $blog->phone }}</div><br>
                            <div>Blood Group: {{ $blog->blood }}</td><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-relative">
                <div class="position-absolute top-0 end-0">
                    <a href="/UI/{{ $blog->id }}/edit" type="submit" class="btn btn-light btn-lr"><i
                            class="bi bi-pencil-square"></i></a>
                </div>
                <div class="position-absolute top-100 end-0">
                    <a href="/UI/index" type="submit" class="btn btn-dark .btn-lg"><i class="bi bi-arrow-left p-2"></i></a>
                </div>
            </div>
    </div>
    @endsection
