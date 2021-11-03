@props(['href', 'color' => 'indigo'])

<a
    href="{{ $href }}"
    class="inline-flex items-center h-8 px-4 m-2 text-bold text-{{$color}}-100 transition-colors duration-150 bg-{{$color}}-500 rounded focus:shadow-outline hover:bg-{{$color}}-600 border border-blue-100">
    {{ $slot }}
</a>
