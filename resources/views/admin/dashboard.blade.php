@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')


    <div class="container">
        <row>
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    {{-- <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a> --}}
                                    {{-- <a href="{{ route('admin.users.destroy', $user->id) }}" class="btn btn-danger">Delete</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <!-- /.col-12 -->
        </row>
    </div>
    <!-- /.conttainer -->
@endsection
