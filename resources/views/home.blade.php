@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
        </div>
    </div>
</div>
@endsection
