@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')


    <div class="container">
        <row>
            <div class="row">
                <div class="col-lg-4">
                    <h3>
                        Set avatars
                    </h3>
                    <a href="{{ route('admin.set-avatars') }}" class="btn btn-primary">set Avatars</a>

                </div>
                <div class="col-lg-4"></div>
                <div class="col-lg-4"></div>
            </div>
            <div class="col-12">
                <h3>
                    Users
                </h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Avatar</th>
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
                                <td>
                                    <img src="{{ $user->getFirstMediaUrl('avatars') }}" alt="{{ $user->name }}"
                                        class="thumbnail">
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    {{-- <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a> --}}


                                    {{ html()->form('DELETE', route('admin.users.destroy', $user->id))->open() }}
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    {{ html()->form()->close() }}

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
