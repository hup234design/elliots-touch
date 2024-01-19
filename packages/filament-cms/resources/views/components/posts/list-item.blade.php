@props(['post'])

<div class="grid md:grid-cols-3 gap-8">
    <div class="">
        <div class="w-full aspect-square">
            <x-cms-media-image-renderer
                :media="$post->featured_image?->media"
                :curation="$post->featured_image?->media_curation"
                preset="thumbnail"
                imgClass="w-full h-full object-cover rounded-lg"
            />
        </div>
    </div>
    <div class="col-span-2">
        <span class="text-xs font-bold text-gray-500">
            {{ $post->publish_at->format('d-m-Y') }}
        </span>
        <h2 class="mt-2 mb-2 text-3xl font-bold">
            {{ $post->title }}
        </h2>
        @if( $post->summary)
            <p class="mb-4 text-lg text-gray-500 leading-loose">
                {{ nl2br($post->summary) }}
            </p>
        @endif
        <a
            class="flex items-center text-lg font-bold text-gray-500 hover:text-gray-700"
            href="{{ route('posts.post', $post->slug) }}"
        >
            <span>Read more</span>
            <span>
                <svg class="ml-1 w-5 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
              </span>
        </a>
    </div>
</div>
