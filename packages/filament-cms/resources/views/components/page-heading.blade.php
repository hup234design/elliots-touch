@props(['title','heading','text'])

@section('heading')
    {{--@parent--}}
    <section class="h-64 bg-gray-800 flex flex-col items-center justify-center space-y-4">

        @isset($title)
            <p class="font-bold text-white text-2xl">
                {{ $title }}
            </p>
        @endisset
        @isset($heading)
            <h1 class="font-extrabold text-white text-4xl">
                {{ $heading }}
            </h1>
        @endisset
        @isset($text)
            <div class="max-w-2xl mx-auto text-center">
                <p class="font-semibold text-white text-xl">
                    {{ $text  }}
                </p>
            </div>
        @endisset
    </section>
@endsection
