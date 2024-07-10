@unless ($breadcrumbs->isEmpty())
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumb-item text-sm md:text-base hover:underline text-blue-500"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }} </a></li><i class="bi bi-chevron-compact-right text-sm"></i>
            @else
                <li class="breadcrumb-item active text-sm md:text-base">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>
@endunless
