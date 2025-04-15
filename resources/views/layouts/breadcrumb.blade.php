<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0">{{ $breadcrumb->title }}</h3>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            @foreach ($breadcrumb->list as $key => $value)
                @if ($key == count($breadcrumb->list) - 1)
                    <li class="breadcrumb-item active text-primary" aria-current="page">{{ $value }}</li>
                @else
                    <li class="breadcrumb-item text-dark">{{ $value }}</li>
                @endif
            @endforeach
        </ol>
    </div>
</div>
