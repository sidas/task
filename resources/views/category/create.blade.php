@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Category') }}</div>
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
                            <form action="{{route('categories.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">{{__('Name')}}</label>
                                    <input id="name" class="form-control" name="name" type="text" required placeholder="{{__('Name')}}"/>
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
