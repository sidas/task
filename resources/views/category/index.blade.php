@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Categories') }}
                        <div class="float-right">
                            <a href="{{route('categories.create')}}" class="btn btn-primary">{{ __('Create') }}</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <th width="60%">{{ __('Name') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </thead>
                        <tbbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <a href="{{route('categories.show', $category->id)}}" class="btn btn-info">{{ __('View products') }}</a>
                                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-secondary">{{ __('Edit') }}</a>
                                        <form action="{{route('categories.destroy', $category->id)}}" class="d-inline" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">{{ __('There are no records to be displayed.') }}</td>
                                </tr>
                            @endforelse
                        </tbbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
