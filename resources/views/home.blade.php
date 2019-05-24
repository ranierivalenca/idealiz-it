@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="{{route('ideas.create')}}">
                <div class="card">
                    <div class="card-header">
                        {{__('messages.home.add.idea')}}
                    </div>
                    <div class="card-body">
                        {{__('messages.home.add.idea.body')}}
                    </div>
                </div>
            </a>
        </div>
        @foreach ($ideas as $idea)
            <div class="col-md-4" style="margin-bottom: 1em">
                <a href="{{ route('ideas.show', $idea->id) }}">
                    <div class="card">
                        <div class="card-header">
                            {{ $idea->title }}
                        </div>
                        <div class="card-body">
                            {!! nl2br($idea->description) !!}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('messages.home.dashboard', ['name' => Auth::user()->name]) }}</div>

                <div class="card-body">
                    {{ trans_choice('messages.home.count-messages', 2, ['value' => 2]) }}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{__('messages.home.logged')}}
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection
