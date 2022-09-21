@extends('base')

@section('body')

    <h2>Welcome to users</h2>

    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Is_admin</th>
            <th>Roles</th>
            <th>Permissions</th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->is_admin}}</td>
                    <td>
                        <ul>
                            @foreach($user->roles as $role)
                                <li>{{$role->name}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($user->getAllPermissions() as $permission)
                                <li>{{$permission->name}}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{$users->links()}}
@endsection
