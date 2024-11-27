<x-archive.layout>

    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('archive/images/slider/outstanding_achievement.png') }}">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('archive/images/slider/elliot.png') }}">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('archive/images/slider/royal-brompton-cheque.png') }}">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>


    <div class="bg-et-blue p-4">
        <div class="grid divide-y lg:grid-cols-4 lg:divide-x lg:divide-y-0">
                <a href="{{ url('/elliots-story') }}" class="p-4 flex items-center justify-center text-center lg:flex-col gap-2 ">
                    <x-heroicon-m-information-circle class="w-8 h-8 text-white lg:w-12 lg:h-12" />
                    <p class="text-md text-white font-black lg:text-xl">ABOUT US</p>
                </a>
                <a href="{{ url('/fundraising') }}" class="p-4 flex items-center justify-center text-center lg:flex-col gap-2 ">
                    <x-heroicon-m-check-circle class="w-8 h-8 text-white lg:w-12 lg:h-12" />
                    <p class="text-md text-white font-black lg:text-xl">FUNDRAISING</p>
                </a>
                <a href="{{ url('/support-us') }}" class="p-4 flex items-center justify-center text-center lg:flex-col gap-2 ">
                    <x-heroicon-m-currency-pound class="w-8 h-8 text-white lg:w-12 lg:h-12 " />
                    <p class="text-md text-white font-black lg:text-xl">DONATE</p>
                </a>
                <a  href="{{ url('/contact') }}" class="p-4 flex items-center justify-center text-center lg:flex-col gap-2 ">
                    <x-heroicon-m-envelope class="w-8 h-8 text-white mb-2 lg:w-12 lg:h-12" />
                    <p class="text-md text-white font-black lg:text-xl">CONTACT US</p>
                </a>
        </div>
    </div>

    <div class="mt-12 grid gap-16 lg:grid-cols-2">
        <div class="prose max-w-none">
            <h2 class="text-et-crimson">Support Elliots Touch</h2>
            <h3>How to help....</h3>
            <p>There are many ways you can get involved and help raise money for Elliot's Touch.</p>
            <p>We have a number of places for you to organise events, or you can be creative and do your own thing!</p>
            <p>A cake sale, fun run, coffee morning, zumbathon, 5-a-side football - anything goes!</p>
            <p>However you decide to get involved, your efforts and support will be very much appreciated.</p>
            <p>Take a look at our fundraising ideas for more infomation.</p>
        </div>
        <div class="prose max-w-none">
            <h2 class="text-et-crimson">Latest News</h2>
            <h3>Royal Brompton & Harefield Hospitals</h3>
            <p>On the 12th July 2016, we were humbled to meet Paul and Donna, who sadly lost their infant son Elliot to mitochondrial disease and childhood cardiomyopathy last year at Great Ormond Street Hospital.</p>
            <p>Ever since their tragic loss, Paul and Donna and the team at Elliot’s Touch have bravely and tirelessly raised funds towards research into the condition, so that in future, children can be given a stronger fighting chance at life.</p>
            <p>After doing some of their own research, Paul and Donna came across the Royal Brompton Hospital’s very own Dr Sanjay Prasad, an expert in cardiomyopathy.</p>
            <p>With his fantastic team, Dr Prasad is working towards finding a simple and effective way to test for cardiomyopathy, so that children and adults with this condition can be diagnosed and treated earlier, or even avoid the need for medical intervention.</p>
            <p>Elliot’s Touch were able to meet with Dr Prasad and his team, learn more about their vital work, and, through their ambitious and truly remarkable fundraising efforts, present a generous cheque for ...... Read More</p>
        </div>
    </div>
    @push('styles')
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    @endpush
    @push('scripts')
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
    @endpush
</x-archive.layout>
