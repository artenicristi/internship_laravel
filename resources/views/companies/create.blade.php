@extends('base')

@section('body')

    <h2>Create new company</h2>

    <form action="{{route('company.create')}}" method="POST">
        @csrf

        <label for="company-name">
            <input type="text" name="name" placeholder="Company name">
        </label>

        <label for="company-website">
            <input type="text" name="website" placeholder="Company website">
        </label>

        <select id="users" name="user">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>

        <button type="submit">Submit</button>
    </form>

@endsection
