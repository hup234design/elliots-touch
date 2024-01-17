<x-cms::content-blocks.wrapper>
    @if($blockData['header'])
        <x-cms::content-blocks.header
            :heading="$blockData['header_title']"
            :text="$blockData['header_text']"
        />
    @endif
    <div class="mx-auto grid max-w-lg gap-8 lg:max-w-none lg:grid-cols-3">

        @foreach($posts as $post)
            <div class="p-6 bg-gray-50 rounded-lg">
                <div class="relative h-48 mb-6">
                    @if($post->post_category_id)
                        <a class="absolute top-0 right-0 mt-4 mr-4 inline-block text-xs px-2 py-1 bg-gray-50 rounded uppercase text-gray-500 font-semibold">
                            {{ $post->post_category->title }}
                        </a>
                    @endif
                        <x-cms-media-image-renderer
                            :media="$post->featured_image?->media_id"
                            :curation="$post->featured_image?->media_curation"
                            preset="thumbnail"
                            imgClass="w-full h-full rounded-lg"
                        />
                </div>
                <span class="inline-block text-xs font-bold text-gray-500">
                    {{ $post->publish_at->format('Y-m-d H:i') }}
                </span>
                <h2 class="mb-2 text-2xl font-bold font-heading">
                    {{ $post->title }}
                </h2>
                <p class="mb-4 text-gray-500">
                    {{ nl2br($post->summary) }}
                </p>
                <a class="flex items-center text-lg font-bold text-gray-500 hover:text-gray-700" href="{{ route('posts.post', $post->slug) }}">
                    <span>Read more</span>
                    <span>
                        <svg class="ml-1 w-5 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </span>
                </a>
            </div>
        @endforeach

    </div>
</x-cms::content-blocks.wrapper>
