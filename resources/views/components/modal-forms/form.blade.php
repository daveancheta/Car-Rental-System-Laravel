<div class="p-4 md:p-5">
    <form {{ $attributes (["class"=> "space-y-4", "method" => "GET"]) }}>
        @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
        @endif

        {{ $slot }}
    </form>
</div>