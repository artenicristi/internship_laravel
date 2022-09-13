@extends('base')

@section('body')

    <h2>Welcome to vacancies</h2>

    <table>
        <thead>
            <th>ID</th>
            <th>Title</th>
            <th>Content</th>
            <th>Location</th>
            <th>Image</th>
            <th>Type</th>
            <th>Category</th>
            <th>Company</th>
            <th>User</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($vacancies as $vacancy)
                <tr>
                    <td>{{$vacancy->id}}</td>
                    <td>{{$vacancy->title}}</td>
                    <td>{{$vacancy->content}}</td>
                    <td>{{$vacancy->location}}</td>
                    <td>{{$vacancy->image}}</td>
                    <td>{{$vacancy->type}}</td>
                    <td>{{$vacancy->category->name}}</td>
                    <td>{{$vacancy->company->name}}</td>
                    <td>{{$vacancy->user->name}}</td>
                    <td>
                        <a href="{{route('vacancy.edit', ['vacancy' => $vacancy->id])}}">Edit</a>
                        <form method="POST" action="{{route('vacancy.delete', ['vacancy' => $vacancy->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <a href="{{route('vacancy.create')}}">Create</a>

    {{$vacancies->links()}}
@endsection
