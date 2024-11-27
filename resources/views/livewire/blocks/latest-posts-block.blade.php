<div>
    <!-- Blog List Section: In Grid -->
{{--    <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-100">--}}
        <div
            class="container"
        >
            <!-- Heading -->
            <div class="prose max-w-none text-center">
                <h2 class="font-headline tracking-tight text-4xl">
                    Latest Posts
                </h2>
                <h3
                    class="mx-auto text-xl text-gray-700 lg:w-2/3 dark:text-gray-300"
                >
                    Be sure to
                    <a
                        href="javascript:void(0)"
                        class="text-blue-600 hover:text-blue-400 dark:text-blue-400 dark:hover:text-blue-300"
                    >follow us on X</a
                    >
                    or
                    <a
                        href="javascript:void(0)"
                        class="text-blue-600 hover:text-blue-400 dark:text-blue-400 dark:hover:text-blue-300"
                    >join us</a
                    >
                    to stay up to date about any new posts.
                </h3>
            </div>
            <!-- END Heading -->

            <!-- Blog Posts -->
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
                @foreach($this->posts as $post)
                <div
                    class="flex flex-col overflow-hidden rounded-lg bg-white shadow-sm dark:bg-gray-800"
                >
                    <a href="javascript:void(0)" class="group relative block">
                        <div
                            class="absolute inset-0 flex items-center justify-center bg-blue-700/75 opacity-0 transition duration-150 ease-out group-hover:opacity-100"
                        >
                            <svg
                                class="hi-solid hi-arrow-right inline-block size-10 -rotate-45 text-white"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </div>
                        <div class="h-48">
                            <x-media-renderer
                                :data="$post->featured_image"
                                class="object-cover object-center w-full h-full"
                                alt="Featured Image of blog post"
                            />
                        </div>
{{--                        <img--}}
{{--                            src="https://cdn.tailkit.com/media/placeholders/photo-73F4pKoUkM0-800x600.jpg"--}}
{{--                            alt="Featured Image of blog post"--}}
{{--                        />--}}
                    </a>
                    <div class="py-6 prose">
                        <h2 class="mb-2 text-lg sm:text-xl">
                            <a
                                href="javascript:void(0)"
                                class="not-prose text-gray-800 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-400"
                            >
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p class="mb-3 text-sm font-medium text-gray-600 dark:text-gray-400">
                            {{ $post->published_at }}
                        </p>
{{--                        <p class="leading-relaxed text-gray-600 dark:text-gray-400">--}}
                        <p class="">
                            {{ nl2br($post->summary) }}
                        </p>
                    </div>
                </div>
                    @endforeach
            </div>
            <!-- END Blog Posts -->
        </div>
{{--    </div>--}}
    <!-- END Blog List Section: In Grid -->

</div>
