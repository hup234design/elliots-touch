<x-cms-app-layout>

    <x-cms::page-heading heading="Client Testimonials" />

    <div class="max-w-7xl mx-auto px-8">
        <div class="mt-16 space-y-12">
            @foreach($testimonials as $testimonial)
                <div class="py-8 bg-green-900 text-center text-xl font-bold text-white">
                    <span>TESTIMONIAL</span>
                </div>
            @endforeach
        </div>

        <div class="my-16">
            {{ $testimonials->links() }}
        </div>
    </div>

</x-cms-app-layout>
