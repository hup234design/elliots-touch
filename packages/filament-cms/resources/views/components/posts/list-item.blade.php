@props(['post'])

<div class="grid md:grid-cols-3 gap-8">
    <div class="">
        <div class="w-full aspect-video">
            <img class="w-full h-full object-cover rounded-lg" src="https://shuffle.dev/plain-assets/images/gray-500-square.png" alt="">
        </div>
    </div>
    <div class="col-span-2">
        <span class="text-xs font-bold text-gray-500">10 jun 2022 19:40</span>
        <h2 class="mt-2 mb-2 text-3xl font-bold font-heading">Lorem ipsum dolor sit</h2>
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
</div>
