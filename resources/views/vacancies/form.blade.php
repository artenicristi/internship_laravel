@extends('base')

@section('body')

    <h2>Create new vacancy</h2>

    <form action="{{route('vacancy.edit', ['vacancy' => $vacancy->id])}}" method="POST">
        @csrf

        <label for="vacancy-name">
            <input type="text" name="title" value="{{$vacancy->title}}" placeholder="Vacancy title">
        </label>

        <label for="vacancy-website">
            <input type="text" name="content" value="{{$vacancy->content}}" placeholder="Vacancy content">
        </label>

        <label for="vacancy-website">
            <input type="text" name="location" value="{{$vacancy->location}}" placeholder="Vacancy location">
        </label>

        <label for="vacancy-website">
            <input type="text" name="image" value="{{$vacancy->image}}" placeholder="Vacancy image">
        </label>

        <select id="users" name="user">
            @foreach($users as $user)
                @if($user->id == $vacancy->user->id)
                    <option value="{{$user->id}}" selected="selected">{{$user->name}}</option>
                @else
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endif
            @endforeach
        </select>

        <select id="companies" name="company">
            @foreach($companies as $company)
                @if($company->id == $vacancy->company->id)
                    <option value="{{$company->id}}" selected="selected">{{$company->name}}</option>
                @else
                    <option value="{{$company->id}}">{{$company->name}}</option>
                @endif
            @endforeach
        </select>

        <select id="categories" name="category">
            @foreach($categories as $category)
                @if($category->id == $vacancy->category->id)
                    <option value="{{$category->id}}" selected="selected">{{$category->name}}</option>
                @else
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
            @endforeach
        </select>

        <p>Select type:</p>
        <div>
            <input type="radio" id="choice1"
                   name="type" value="full time"
                   @if($vacancy->type == 'full time')
                       checked
                   @endif
            >
            <label for="choice1">Full time</label>

            <input type="radio" id="choice2"
                   name="type" value="part time"
                   @if($vacancy->type == 'part time')
                       checked
                   @endif
            >
            <label for="choice2">Part time</label>
        </div>

        <button type="submit">Submit</button>
    </form>

@endsection
