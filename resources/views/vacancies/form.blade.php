@extends('base')

@section('body')

    @php
        $isUpdate = @isset($vacancy) && \Illuminate\Support\Facades\Request::url() == route('vacancy.edit', ['vacancy' => $vacancy->id]);
    @endphp

    <h2>
        @if($isUpdate)
            Update {{$vacancy->title}}
        @else
            Create new vacancy
        @endif
    </h2>

    <form
        action="{{$isUpdate ? route('vacancy.update', ['vacancy' => $vacancy->id])
                            : route('vacancy.create')}}"
        method="POST">
        @csrf

        <label>
            <input type="text" name="title" placeholder="Vacancy title"
                   value="{{$isUpdate ? $vacancy->title : old('title')}}"
            >
            @include('errors', ['errors' => $errors->get('title')])
        </label>

        <label>
            <input type="text" name="content" placeholder="Vacancy content"
                   value="{{$isUpdate ? $vacancy->content : old('content')}}"
            >
            @include('errors', ['errors' => $errors->get('content')])
        </label>

        <label>
            <input type="text" name="location" placeholder="Vacancy location"
                   value="{{$isUpdate ? $vacancy->location : old('location')}}"
            >
            @include('errors', ['errors' => $errors->get('location')])
        </label>

        <label>
            <input type="text" name="image" placeholder="Vacancy image"
                   value="{{$isUpdate ? $vacancy->image : old('image')}}"
            >
            @include('errors', ['errors' => $errors->get('image')])
        </label>

        <select id="companies" name="company_id">
            @forelse($companies as $company)
                @if(!old('company_id') && $isUpdate && $company->id == $vacancy->company->id)
                    <option value="{{$company->id}}" selected="selected">if1 . {{$company->name}}</option>
                @elseif(old('company_id') == $company->id)
                    <option value="{{old('company_id')}}" selected="selected">if2 . {{$company->name}}</option>
                @else
                    <option value="{{$company->id}}">if3 . {{$company->name}}</option>
                @endif
            @empty
                <option disabled>Nothing...</option>
            @endforelse
        </select>

        <select id="categories" name="category_id">
            @forelse($categories as $key => $category)
                @if(!old('category_id') && $isUpdate && $category->id == $vacancy->category->id)
                    <option value="{{$category->id}}" selected="selected">if1 . {{$category->name}}</option>
                @elseif(old('category_id') == $category->id)
                    <option value="{{old('category_id')}}" selected="selected">if2 . {{$category->name}}</option>
                @else
                    <option value="{{$category->id}}">if3 . {{$category->name}}</option>
                @endif
            @empty
                <option disabled>Nothing...</option>
            @endforelse
        </select>

        <p>Select type:</p>
        <div>
            <label>
                <input type="radio" id="choice1" name="type" value="full-time"
                       @if($isUpdate && $vacancy->type == 'full-time' || old('type') == 'full-time')
                           checked="checked"
                    @endif
                >
                Full time
            </label>

            <label>
                <input type="radio" id="choice2" name="type" value="part-time"
                       @if($isUpdate && $vacancy->type == 'part-time' || old('type') == 'part-time')
                           checked="checked"
                    @endif
                >
                Part time
            </label>
            @include('errors', ['errors' => $errors->get('type')])
        </div>

        <button type="submit">Submit</button>
    </form>

@endsection
