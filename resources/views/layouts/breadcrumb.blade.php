<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0">Dashboard</h3>
        {{-- <h3 class="mb-0">{{ $breadcrumb->title }}</h3> --}}
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            {{-- @foreach ($breadcrumb->list as $key => $value)
                @if ($key == count($breadcrumb->list) - 1)
                    <li class="breadcrumb-item active" aria-current="page">{{ $value }}</li>
                @endif
                <li class="breadcrumb-item"><a href="#">{{ $value }}</a></li>
            @endforeach --}}
            <li class="breadcrumb-item"><a href="#">admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">dashboard</li>
        </ol>
    </div>
</div>
