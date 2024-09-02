@if (is_array($breadcrumbs))
    <div class="page-header">
        <div>
            <h3 class="fw-bold mb-3">{{ $breadcrumbs[0]['nav_name'] ?? 'Undefined' }}</h3>
        </div>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ url('/admin') }}">
                    <i class="icon-home"></i>
                </a>
            </li>
            @foreach($breadcrumbs as $breadcrumb)
                @if(isset($breadcrumb['nav_item']))
                    <li class="nav-item">
                        <a href="{{ $breadcrumb['url'] ?? 'javscript:void();' }}">{{ $breadcrumb['nav_item'] }}</a>
                    </li>
                @endif
                @if (!$loop->last)
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                @endif
            @endforeach
        </ul>
        <div class="ms-md-auto py-2 py-md-0">
            @foreach($breadcrumbs as $breadcrumb)
                @if(isset($breadcrumb['nav_button']))
                    <a href="{{ $breadcrumb['url'] ?? 'javscript:void();' }}" class="btn btn-primary btn-round">{{ $breadcrumb['nav_button'] }}</a>
                @endif
            @endforeach
        </div>
    </div>
@endif