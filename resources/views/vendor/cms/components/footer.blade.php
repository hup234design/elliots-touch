<footer class="bg-brand-dark-blue py-16 flex flex-col justify-center items-center space-y-8">

    <div class="text-center">
        <a href="{{ route('home') }}" class="font-bold text-xl text-white">
            {{ config('app.name') }}
        </a>
    </div>

    <ul class="flex items-center font-medium text-sm gap-12">
        @foreach( $menuLinks ?? [] as $link)
            <li class="group px-6">
                <a href="{{ $link['href'] }}" target="{{ $link['target'] }}" class="h-16 text-white font-bold text-lg rounded flex items-center  hover:text-red-700">
                    {{ $link['label'] }}
                </a>
            </li>
        @endforeach
    </ul>

    <p class="text-sm text-white">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </p>
</footer>
