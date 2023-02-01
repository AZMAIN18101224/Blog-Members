@extends('layouts.main')


@section('main-layout')
    <title>{{ $title = 'Home' }}</title>
    <style>
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
    <div class="container">
        <h1>Member List</h1>
    </div>
    <div class="container">
        <table class="table table-bordered border-dark border-round text-white bg-black">
            <thead>
                <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role/Department</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $i => $member)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $member->name }}</td>
                        <td>
                            <div class="col-md-4">
                                <img class="card-img-top" src="/storage/{{ $member->image }}" alt="..."
                                    style="max-width: 90px;">
                            </div>
                        </td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->position }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="/UI/{{ $member->id }}" type="submit" class="btn btn-success btn-lr .pr-4"><i
                                        class="bi bi-info-circle" style="color: rgb(255, 255, 255)"></i></a>
                                <a href="/UI/{{ $member->id }}/edit" type="submit" class="btn btn-success btn-lr"><i
                                        class="bi bi-pencil-square" style="color: rgb(255, 255, 255)"></i></a>
                                <form method="post" action="{{ $member->id }}" class="btn-group">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" />
                                    <button class="btn btn-success btn-lr"><i class="bi bi-trash3"
                                            style="color: rgb(255, 0, 0)"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <div>
                        <tr>
                            <td scope="col">No result found!</td>
                        </tr>
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- for styling go to app/Provides/AppServiceProvider.php--}}
    <div class="pagination justify-content-center" id="pagination">
        {{ $blogs->links() }}
    </div>
@endsection

{{-- @foreach ($blogs as $member)
                <tr>
                    <td>{{$member['id']}}</td>
                    <td>{{$member['name']}}</td>
                    <td>{{$member['image']}}</td>
                    <td>{{$member['email']}}</td>
                    <td>{{$member['phone']}}</td>
                    <td>{{$member['position']}}</td>
                    <td>{{$member['blood']}}</td>
                </tr>
                @endforeach --}}





