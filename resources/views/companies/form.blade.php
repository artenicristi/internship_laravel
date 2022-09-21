@extends('base')

@section('body')

    @php
        $isUpdate = @isset($company) && \Illuminate\Support\Facades\Request::url() == route('company.edit', ['company' => $company->id]);
    @endphp

    <h2>
        @if($isUpdate)
            Update {{$company->title}}
        @else
            Create new vacancy
        @endif
    </h2>

    <form
        action="{{$isUpdate ? route('company.update', ['company' => $company->id])
                            : route('company.create')}}"
        method="POST">
        @csrf

        <label for="company-name">
            <input type="text" name="name" placeholder="Company name"
                   value="{{$isUpdate ? $company->name : old('name')}}">
            @include('errors', ['errors' => $errors->get('name')])
        </label>

        <label for="company-website">
            <input type="text" name="website" placeholder="Company website"
                   value="{{$isUpdate ? $company->website : old('website')}}">
            @include('errors', ['errors' => $errors->get('website')])
        </label>

        <button type="submit">Submit</button>
    </form>

@endsection
