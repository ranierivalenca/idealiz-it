@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{__('messages.ideas.create.header')}}
                </div>
                <div class="card-body">
                    <form action="{{ route('ideas.store') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('messages.ideas.create.title') }}</label>

                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('messages.ideas.create.description') }}</label>

                            <div class="col-md-10">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control vresize @error('description') is-invalid @enderror" required></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <a class="btn btn-light btn-block" href="{{ route('home') }}"  tabindex="1">
                                    {{ __('Back') }}
                                </a>
                            </div><div class="col-md-10">
                                <button type="submit" class="btn btn-primary btn-block" tabindex="0">
                                    {{ __('messages.ideas.create.create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection