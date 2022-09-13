@extends('base')

@section('body')

    <h2>Welcome to categories</h2>

    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('category.edit', ['category' => $category->id])}}">Edit</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{$categories->links()}}
@endsection
