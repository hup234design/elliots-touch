@props(['title','heading','text'])

@section('heading')
    <section class="h-48 bg-brand-skyblue flex flex-col items-center justify-center space-y-8">
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

            <a type="button" class="bg-white rounded-xl border-gray-400 px-8 py-2" href="https://cafdonate.cafonline.org/donatesteps.aspx?beneficiarycampaignid=3595" target="_blank">
                <span class="text-xl">DONATE NOW</span>
            </a>
    </section>
@endsection
