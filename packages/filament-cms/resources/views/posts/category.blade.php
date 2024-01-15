<x-cms-posts-layout>

    <x-cms::page-heading
        title="POSTS"
        :heading="$category->title"
    />

    <div class="space-y-12">
        @foreach($posts as $post)
            <x-cms::posts.list-item :post="$post" />
        @endforeach
    </div>

    <div class="my-16">
        {{ $posts->links() }}
    </div>

</x-cms-posts-layout>


{{--    <p class="mb-2 text-lg leading-8 text-gray-600">POSTS</p>--}}
{{--    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">--}}
{{--        {{ $category->title }}--}}
{{--    </h2>--}}
{{--    <p class="mt-2 text-lg leading-8 text-gray-600">Incididunt sint fugiat pariatur cupidatat consectetur sit cillum anim id veniam aliqua proident excepteur commodo do ea.</p>--}}
{{--                <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20">--}}
{{--                    @foreach($posts as $post)--}}
{{--                    <article class="relative isolate flex flex-col gap-8 lg:flex-row">--}}
{{--                        <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">--}}

{{--                            @if($post->featured_image?->media )--}}
{{--                                @if ($post->featured_image->media->hasCuration( $post->featured_image->curation ?? "" ))--}}
{{--                                    <x-curator-curation :media="$post->featured_image->media" :curation="$post->featured_image->curation" class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover"/>--}}
{{--                                @else--}}
{{--                                    <x-curator-glider--}}
{{--                                        class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover"--}}
{{--                                        :media="$post->featured_image->media"--}}
{{--                                    />--}}
{{--                                @endif--}}
{{--                            @else--}}
{{--                                <img src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80" alt="" class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">--}}
{{--                            @endif--}}
{{--                            <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <div class="flex items-center gap-x-4 text-xs">--}}
{{--                                <time datetime="2020-03-16" class="text-gray-500">--}}
{{--                                    {{ $post->publish_at->format('l M j, Y') }}--}}
{{--                                </time>--}}
{{--                                <a href="{{ route('posts.category', $post->post_category->slug) }}" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">--}}
{{--                                    {{ $post->post_category->title }}--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                            <div class="group relative">--}}
{{--                                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">--}}
{{--                                    <a href="{{ route('posts.post', $post->slug) }}">--}}
{{--                                        <span class="absolute inset-0"></span>--}}
{{--                                        {{ $post->title }}--}}
{{--                                    </a>--}}
{{--                                </h3>--}}
{{--                                <p class="mt-5 text-sm leading-6 text-gray-600">--}}
{{--                                    {{ $post->summary }}--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                    @endforeach--}}
{{--                    <!-- More posts... -->--}}
{{--                </div>--}}

