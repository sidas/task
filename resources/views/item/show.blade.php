@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Show Product') }}</div>
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
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            {{__('Name')}}
                                        </td>
                                        <td>
                                           {{$product->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{__('Category')}}
                                        </td>
                                        <td>
                                            {{$product->category->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{__('Price')}}
                                        </td>
                                        <td>
                                            {{$product->price}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{__('Quantity')}}
                                        </td>
                                        <td>
                                            {{$product->quantity}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            {{__('Description')}}
                                        </td>
                                        <td>
                                            {{$product->description}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
