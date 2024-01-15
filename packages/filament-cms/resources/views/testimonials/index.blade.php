<x-cms-app-layout>

    <x-cms::page-heading heading="Testimonials" />

    <div class="max-w-7xl mx-auto px-8">
        <div class="mt-16 space-y-12">
            @foreach($testimonials as $testimonial)
                <div>
                    {{ json_encode($testimonial) }}
                </div>
            @endforeach
        </div>

        <div class="my-16">
            {{ $testimonials->links() }}
        </div>
    </div>

</x-cms-app-layout>
