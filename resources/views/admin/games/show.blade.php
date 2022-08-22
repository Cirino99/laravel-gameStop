@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>{{$game->title}}</h1>
                    <h3>{{$game->price}}€</h3>
                    <img src="{{$game->image}}" alt="{{$game->title}}">
                    <br>
                    <a href="{{ route('admin.games.edit', ['game' => $game]) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.games.destroy', ['game' => $game]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection