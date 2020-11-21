@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Items') }}
                    </div>
                    <table class="table">
                        <thead>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Quantity') }}</th>
                        <th>{{ __('Price') }}</th>
                        <th>{{ __('Actions') }}</th>
                        </thead>
                        <tbbody>
                            @forelse($items as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>
                                        <a href="{{route('items.show', $item->id)}}" class="btn btn-info">{{ __('Show') }}</a>
                                        <a href="{{route('items.edit', $item->id)}}" class="btn btn-secondary">{{ __('Edit') }}</a>
                                        <form action="{{route('items.destroy', $item->id)}}" method="POST" class="d-inline">
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
