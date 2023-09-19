<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <span class="badge badge-danger badge-counter">
            {{ count(auth()->user()->unreadNotifications ?? []) }}
        </span>
    </a>

    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
         aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Alerts Center
        </h6>
        @if(count($notifications = auth()->user()->notifications) > 0)
            @forelse($notifications->take(5) as $row)

                <a class="dropdown-item d-flex align-items-center"
                   href="{{ route('notifications.show', $row['id']) }}"
                   @if(empty($row['read_at']))
                       style="background-color: yellow"
                    @endif
                >
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">{{ $row['created_at'] }}</div>
                        <span class="font-weight-bold">{{ $row['data']['message'] }}</span>
                    </div>
                </a>
            @empty
            @endforelse

            <a class="dropdown-item text-center small text-gray-500" href="{{ route('notifications.index') }}">
                {{ __('Show All Notifications') }}
            </a>
        @else
            <span class="dropdown-item d-flex align-items-center">
                {{ __('You do not have any notifications') }}
            </span>
        @endisset
    </div>
</li>
