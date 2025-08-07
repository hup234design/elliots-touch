<!-- Footer Section: With Links Info Newsletter -->

<!-- Footer Section: Simple Vertical with Social -->
<footer id="page-footer" class="bg-gray-50 py-12">
    <div
        class="container text-center"
    >
        <div class="space-y-4">
            <nav class="space-x-4">
                @if( $settings->social_facebook )
                <a
                    href="{{ $settings->social_facebook }}" target="_blank"
                    class="text-gray-400 hover:text-[#1877f2]">
                    <svg
                        class="icon-facebook inline-block size-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path
                            d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.378 14.192 5 15.115 5H18V0h-3.808C10.596 0 9 1.583 9 4.615V8z"
                        ></path>
                    </svg>
                </a>
                @endif
                    @if( $settings->social_twitter )
                <a
                    href="{{ $settings->social_twitter }}" target="_blank"
                    class="text-gray-400 hover:text-gray-800"
                >
                    <svg
                        class="bi bi-twitter-x inline-block size-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 16 16"
                        aria-hidden="true"
                    >
                        <path
                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"
                        />
                    </svg>
                </a>
                    @endif
                    @if( $settings->social_instagram )
                <a href="{{ $settings->social_instagram }}" target="_blank"  class="text-gray-400 hover:text-[#405de6]">
                    <svg
                        class="icon-instagram inline-block size-5"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"
                        ></path>
                    </svg>
                </a>
                    @endif

            </nav>

            <div class="text-sm leading-relaxed">
                <a href="mailto:elliotstouch@yahoo.com">elliotstouch@yahoo.com</a>
            </div>

            <nav class="space-x-2 sm:space-x-8">

                @foreach( $footerMenu ?? [] as $menuItem)
                    @if( $menuItem['route'])
                            <a
                                class="font-medium text-gray-700 hover:text-gray-950"
                                href="{{ route($menuItem['route'], $menuItem['slug']) }}">
                                {{ $menuItem['title'] }}
                            </a>
                    @endif
                @endforeach
            </nav>

            <div x-data="{}" class="py-4">
                <a type="button" @click="$dispatch('open-modal', {id: 'mailchimp-signup'})" class=" rounded-xl font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 bg-et-skyblue hover:bg-et-skyblue-700 focus-visible:outline-et-skyblue-700 px-5 py-2.5 text-md hover:cursor-pointer">
                    <span class="whitespace-nowrap">Subscribe to our Newsletter</span>
                </a>
            </div>

{{--        </div>--}}
        <div class="text-gray-500">
            <span class="font-medium">
                © {{ Carbon\Carbon::now()->format('Y') }} {{ config('app.name') }}
            </span>
        </div>
        {{-- @if( $settings->charity_number )
        <div class="text-gray-500">
            <span class="font-medium">
                Charity Number: {{ $settings->charity_number }}
            </span>
        </div>
        @endif --}}

            <div>
                <a href="https://www.somersetcf.org.uk" target="_blank" title="Somerset Community Foundation">
                    <img src="{{ asset('images/somerset-community-foundation.png') }}" alt="Somerset Community Foundation Logo" class="mx-auto w-1/3 h-auto md:w-auto md:h-20">
                </a>
            </div>

        <div class="text-gray-500">
            <span class="font-medium text-xs">
                Site by <a href="mailto&#58;su%7&#48;po%72t&#64;&#104;u%7&#48;234%64esign&#46;co&#46;u&#107;" class="cursor-pointer hover:underline hover:text-et-skyblue " title="Contact HUP234 Design">HUP234 Design</a>
            </span>
        </div>
{{--    </div>--}}
</footer>
<!-- END Footer Section: Simple Vertical with Social -->



<x-filament::modal width="3xl"  id="mailchimp-signup">
    <x-slot name="heading">
        Newsletter Signup
    </x-slot>
    <div>
        <div class="max-w-2xl">
        <p>Sign up to our newsletter to receive regular updates about our news, events and fundraising campaigns</p>
        </div>
        <x-mailchimp-signup />
    </div>
</x-filament::modal>
