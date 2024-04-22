<div class="text-sm breadcrumbs">
  <ul>
    @foreach ($breadcrumbs as $breadcrumb)
      @if ($loop->last)
        <li class="breadcrumb-item">
          <p>{{ $breadcrumb['label'] }}</p>
        </li>
      @else
        <li class="breadcrumb-item link link-primary">
          <a href="{{ $breadcrumb['href'] }}">{{ $breadcrumb['label'] }}</a>
        </li>
      @endif
    @endforeach
  </ul>
</div>
