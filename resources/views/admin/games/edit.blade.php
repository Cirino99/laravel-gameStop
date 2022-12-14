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

                    <h1>Sono il create</h1>
                    <form action="{{ route('admin.games.update',  ['game' => $game]) }}" method="post" enctype="multipart/form-data"  novalidate>
                        @method('PUT')
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="title">Title</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $game->title) }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="image">Image</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="file" accept="image/*" name="image" id="image" value="{{ old('image', $game->image) }}">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="price">Price</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price', $game->price) }}">
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
