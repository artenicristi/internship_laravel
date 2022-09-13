@extends('base')

@section('body')

    <h2>Welcome to companies</h2>

    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Website</th>
            <th>Author</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{$company->id}}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->website}}</td>
                    <td>{{$company->user->name}}</td>
                    <td>
                        <a href="{{route('company.edit', ['company' => $company->id])}}">Edit</a>
                        <form method="POST" action="{{route('company.delete', ['company' => $company->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <a href="{{route('company.create')}}">Create</a>

    {{$companies->links()}}
@endsection
