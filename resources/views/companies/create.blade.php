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

        <button type="submit">Submit</button>
    </form>

@endsection
