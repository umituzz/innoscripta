@extends('layouts.master')

@section('content')
    <h1 class="h3 mb-2 text-gray-800">{{ __('Notification Management') }}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Notifications') }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                    <tr>
                        <th>{{ __('Message') }}</th>
                        <th>{{ __('Created At') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($notifications as $notification)
                        <tr>
                            <td>{{ $notification['message']  }}</td>
                            <td>{{ $notification['created_at'] }}</td>
                            <td>
                                <a href="{{ route('notifications.show', $notification['id']) }}"
                                   class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text">{{ __('Show') }}</span>
                                </a>
                                <a href="{{ route('notifications.destroy', $notification['id']) }}"
                                   class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-flag"></i>
                                    </span>
                                    <span class="text">{{ __('Delete') }}</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
