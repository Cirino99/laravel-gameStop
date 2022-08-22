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

                    <h1>Sono l'index</h1>
                    <ol>
                        @foreach ($games as $game)
                            @if(Auth::id() === $game->user_id)
                                <li><a href="{{ route('admin.games.show' , ['game' => $game]) }}">{{$game->title}}</a></li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection