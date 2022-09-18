@extends('base')

@section('body')

    {{dump(\Illuminate\Support\Facades\Request::url())}}

    <h2>Create new vacancy</h2>

    <form action="{{route('vacancy.create')}}" method="POST">
        @csrf

        <label>
            <input type="text" name="title" placeholder="Vacancy title">
            @include('errors', ['errors' => $errors->get('title')])
        </label>

        <label>
            <input type="text" name="content" placeholder="Vacancy content">
            @include('errors', ['errors' => $errors->get('content')])
        </label>

        <label>
            <input type="text" name="location" placeholder="Vacancy location">
            @include('errors', ['errors' => $errors->get('location')])
        </label>

        <label>
            <p>here</p>
            <input type="text" name="image" placeholder="Vacancy image">
            @include('errors', ['errors' => $errors->get('image')])
        </label>

        <select id="companies" name="company_id">
            @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>

        <select id="categories" name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

        <p>Select type:</p>
        <div>
            <label>
                <input type="radio" name="type" value="full-time" checked>
                Full time
            </label>

            <label>
                <input type="radio" name="type" value="part-time">
                Part time
            </label>
            @include('errors', ['errors' => $errors->get('type')])
        </div>

        <button type="submit">Submit</button>
    </form>

@endsection
