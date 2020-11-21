@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Category') }}</div>
                    <br/>
                    <div class="row">
                        @if ($errors->any())
                            <div class="col-md-10 offset-md-1">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-10 offset-md-1">
                            <form action="{{route('categories.update', $category->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="name">{{__('Name')}}</label>
                                    <input id="name" class="form-control" name="name" type="text" value="{{$category->name}}" required placeholder="{{__('Name')}}"/>
                                </div>

                                <button class="btn btn-primary">{{__('Submit')}}</button>
                                <div class="clearfix"></div>
                                <br/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
