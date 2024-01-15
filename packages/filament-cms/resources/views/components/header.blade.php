<header class="bg-gray-300 min-h-40 py-4 space-y-4 flex flex-col justify-center items-center">

    <div class="text-center">
        <a href="{{ route('home') }}" class="font-extrabold text-4xl">
            {{ config('app.name') }}
        </a>
    </div>

    <nav class="">
        <ul class="w-full h-16 flex items-center justify-center">
            @foreach( $menuLinks ?? [] as $link)
                <li class="group px-6">
                    @if( $link['dropdown'] )
                        <div class="relative group">
                            @if( $link['href'] )
                                <a href="{{ $link['href'] }}" target="{{ $link['target'] }}" class="h-16 font-bold text-lg rounded flex items-center  hover:text-red-700">
                                    <span>{{ $link['label'] }}</span>
                                    <svg class="fill-current h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12l-6-6h12l-6 6z"/></svg>
                                </a>
                            @else
                                <button class="h-16  font-bold text-lg rounded flex items-center  hover:text-red-700">
                                    <span>{{ $link['label'] }}</span>
                                    <svg class="fill-current h-4 w-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 12l-6-6h12l-6 6z"/></svg>
                                </button>
                            @endif
                            <div class="hidden group-hover:block absolute right-0 -mr-2 z-50" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                <div class="relative mt-2 text-right border rounded-md shadow-lg py-1 bg-white whitespace-nowrap min-w-[160px]" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                    @foreach( $link['children'] as $child )
                                        <a href="{{ $child['href'] }}" target="{{ $child['target'] }}" class="block px-8 py-2 font-bold text-lg text-gray-700 hover:bg-gray-100 hover:text-red-700" role="menuitem">
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ $link['href'] }}" target="{{ $link['target'] }}" class="h-16 font-bold text-lg rounded flex items-center  hover:text-red-700">
                            {{ $link['label'] }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>

</header>
