@include('layouts.partial.header')

@include('layouts.partial.menu')

<div class="top-separator">
    @yield('content')
</div>

@include('layouts.partial.footer')