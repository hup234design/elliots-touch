<x-cms::content-blocks.wrapper>
    @if($blockData['header'])
        <x-cms::content-blocks.header
            :heading="$blockData['header_title']"
            :text="$blockData['header_text']"
        />
    @endif
    <div class="mx-auto grid max-w-lg gap-8 lg:max-w-none lg:grid-cols-3">

        @for($x=1; $x<=3; $x++)
            <div class="p-6 bg-gray-50 rounded-lg">
                <div class="relative h-40 mb-6">
                    <span class="absolute top-0 right-0 mt-4 mr-4 inline-block text-xs px-2 py-1 bg-gray-50 rounded uppercase text-gray-500 font-semibold">Development</span>
                    <img class="w-full h-full object-cover rounded-lg" src="https://shuffle.dev/plain-assets/images/gray-500-horizontal.png" alt="">
                </div>
                <span class="inline-block text-xs font-bold text-gray-500">10 jun 2022 19:40</span>
                <h2 class="mb-2 text-2xl font-bold font-heading">Lorem ipsum dolor sit amet consectutar</h2>
                <p class="mb-4 text-lg text-gray-500 leading-loose">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque massa nibh, pulvinar vitae aliquet nec, accumsan aliquet orci.</p>
                <a class="flex items-center text-lg font-bold text-gray-500 hover:text-gray-700" href="#">
                    <span>Read more</span>
                    <span>
              <svg class="ml-1 w-5 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
              </svg>
            </span>
                </a>
            </div>
        @endfor

    </div>
</x-cms::content-blocks.wrapper>
