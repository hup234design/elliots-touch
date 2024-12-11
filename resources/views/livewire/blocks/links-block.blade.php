<x-blocks.wrapper>

    <div class="w-full lg:col-span-2 grid gap-4 grid-cols-2 lg:grid-cols-4">
        <a
            href="https://elliots-touch.raiselysite.com/" target="_blank"
            class="block bg-et-skyblue-600 rounded-full flex items-center justify-center p-4 text-center shadow-2xl shadow-gray-400 sm:p-8 lg:aspect-square lg:rounded-full "
        >
                    <span class="font-headline text-white font-extrabold text-2xl lg:text-3xl tracking-wider">
                        Donate<br>Now
                    </span>
        </a>
        <a
            href="{{ route('pages.page', 'help-us') }}"
            class="bg-et-crimson rounded-full flex items-center justify-center p-4 text-center shadow-2xl shadow-gray-400  sm:p-8 lg:aspect-square lg:rounded-full"
        >
                    <span class="font-headline text-white font-bold text-2xl lg:text-3xl tracking-wider">
                        Help<br>Us
                    </span>
        </a>
        <a
            href="{{ route('pages.page', 'our-projects') }}"
            class="bg-et-skyblue-700 rounded-full flex items-center justify-center p-4 text-center shadow-2xl  sm:p-8 shadow-gray-400 lg:aspect-square lg:rounded-full"
        >
                    <span class="font-headline text-white text-2xl lg:text-3xl">
                        Our<br>Projects
                    </span>
        </a>
        <a
            href="{{ route('pages.page', 'fundraising-ideas') }}"
            class="bg-et-crimson-700 bg-opacity-70 rounded-full flex items-center justify-center p-4 text-center shadow-2xl  sm:p-8 shadow-gray-400 lg:aspect-square lg:rounded-full"
        >
                    <span class="font-headline text-white text-2xl lg:text-3xl">
                        Fundraising<br>Ideas
                    </span>
        </a>
    </div>

</x-blocks.wrapper>
