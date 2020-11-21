@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Item') }}</div>
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
                            <form action="{{route('items.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">{{__('Name')}}</label>
                                    <input id="name" class="form-control" type="text" name="name" placeholder="{{__('Name')}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">{{__('Category')}}</label>
                                    <select id="category_id" class="form-control" name="category_id">
                                        <option value="0">{{__('Select Category')}}</option>
                                        @forelse($categories as $category)
                                            <option value="{{$category->id}}">{{__($category->name)}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">{{__('Price')}}</label>
                                    <input id="price" class="form-control" type="text" name="price" placeholder="{{__('Name')}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">{{__('Quantity')}}</label>
                                    <input id="quantity" class="form-control" type="number" name="quantity" placeholder="{{__('Name')}}"/>
                                </div>

                                <div class="form-group">
                                    <label for="name">{{__('Description')}}</label>
                                    <textarea class="form-control" name="description" required></textarea>
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
