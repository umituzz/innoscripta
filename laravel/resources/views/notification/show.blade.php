@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">{{ __('Notification Management') }}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Notification Details') }}</h6>
        </div>
        <div class="card-body">
            <p>{{ __('Notification Message: ') . $notification['message'] }}</p>
            <p>{{ __('Read At: ') . $notification['read_at'] }}</p>
            <p>{{ __('Created At: ') . $notification['created_at'] }}</p>
        </div>
    </div>

@endsection
