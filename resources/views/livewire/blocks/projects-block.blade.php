<div>
    <div class="p-8 bg-gray-100 flex justify-center items-center">
        <span>Projects Block</span>
    </div>

    {{ json_encode($this->data) }}

    <div class="flex">
        <!-- Main Content -->
        <div class="w-full p-4">
            @if($selectedProject)
                <div class="flex">

                    <!-- Project Content -->
                    <div class="w-3/4 p-4">
                        <h2 class="font-bold text-xl mb-4">{{ $selectedProject->title }}</h2>
                        <p>{{ $selectedProject->content }}</p>
                        <button wire:click="closeProject" class="mt-4 bg-red-500 text-white px-4 py-2">Close</button>
                    </div>
                    <!-- Sidebar -->
                    <div class="w-1/4 p-4">
                        <h2 class="font-bold mb-4">Projects</h2>
                        <ul>
                            @foreach($projects as $project)
                                <li class="mb-2">
                                    <a href="#" wire:click.prevent="selectProject('{{ $project->id }}')">
                                        {{ $selectedProject && $selectedProject->id === $project->id ? '>' : '' }} {{ $project->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <h2 class="font-bold text-xl mb-4">Project List</h2>
                <ul>
                    @foreach($projects as $project)
                        <li class="mb-2">
                            <h3 class="font-bold">{{ $project->title }}</h3>
                            <p>{{ $project->summary }}</p>
                            <a href="#" wire:click.prevent="selectProject('{{ $project->id }}')" class="text-blue-500">View Project</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <!-- Blog List Section: In Grid -->
    <div class="bg-gray-100 dark:bg-gray-900 dark:text-gray-100">
        <div
            class=""
        >


            <!-- Blog Posts -->
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8">
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
                        <img
                            src="https://cdn.tailkit.com/media/placeholders/photo-73F4pKoUkM0-800x600.jpg"
                            alt="Featured Image of blog post"
                        />
                    </a>
                    <div class="p-6">
                        <div class="mb-3 inline-flex flex-wrap items-center gap-1">
                            <div
                                class="inline-flex rounded-full bg-blue-100 px-2 py-1 text-sm font-semibold leading-4 text-blue-800 dark:bg-blue-900/75 dark:text-blue-200"
                            >
                                travel
                            </div>
                            <div
                                class="inline-flex rounded-full bg-blue-100 px-2 py-1 text-sm font-semibold leading-4 text-blue-800 dark:bg-blue-900/75 dark:text-blue-200"
                            >
                                adventure
                            </div>
                        </div>
                        <h4 class="mb-2 text-lg font-bold sm:text-xl">
                            <a
                                href="javascript:void(0)"
                                class="leading-7 text-gray-800 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-400"
                            >
                                The 10 best hiking trails in the world you should put in your
                                bucket list
                            </a>
                        </h4>
                        <p class="mb-3 text-sm font-medium text-gray-600 dark:text-gray-400">
                            March 3, 2023 · 12 min read
                        </p>
                        <p class="leading-relaxed text-gray-600 dark:text-gray-400">
                            Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed
                            rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi
                            nec lectus.
                        </p>
                    </div>
                </div>
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
                        <img
                            src="https://cdn.tailkit.com/media/placeholders/photo-phIFdC6lA4E-800x600.jpg"
                            alt="Featured Image of blog post"
                        />
                    </a>
                    <div class="p-6">
                        <div class="mb-3 inline-flex flex-wrap items-center gap-1">
                            <div
                                class="inline-flex rounded-full bg-blue-100 px-2 py-1 text-sm font-semibold leading-4 text-blue-800 dark:bg-blue-900/75 dark:text-blue-200"
                            >
                                travel
                            </div>
                            <div
                                class="inline-flex rounded-full bg-blue-100 px-2 py-1 text-sm font-semibold leading-4 text-blue-800 dark:bg-blue-900/75 dark:text-blue-200"
                            >
                                astronomy
                            </div>
                        </div>
                        <h4 class="mb-2 text-lg font-bold sm:text-xl">
                            <a
                                href="javascript:void(0)"
                                class="leading-7 text-gray-800 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-400"
                            >
                                The 20 best places in the world for star gazing
                            </a>
                        </h4>
                        <p class="mb-3 text-sm font-medium text-gray-600 dark:text-gray-400">
                            February 23, 2023 · 20 min read
                        </p>
                        <p class="leading-relaxed text-gray-600 dark:text-gray-400">
                            Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed
                            rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi
                            nec lectus.
                        </p>
                    </div>
                </div>
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
                        <img
                            src="https://cdn.tailkit.com/media/placeholders/photo-T7K4aEPoGGk-800x600.jpg"
                            alt="Featured Image of blog post"
                        />
                    </a>
                    <div class="p-6">
                        <div class="mb-3 inline-flex flex-wrap items-center gap-1">
                            <div
                                class="inline-flex rounded-full bg-blue-100 px-2 py-1 text-sm font-semibold leading-4 text-blue-800 dark:bg-blue-900/75 dark:text-blue-200"
                            >
                                travel
                            </div>
                            <div
                                class="inline-flex rounded-full bg-blue-100 px-2 py-1 text-sm font-semibold leading-4 text-blue-800 dark:bg-blue-900/75 dark:text-blue-200"
                            >
                                adventure
                            </div>
                        </div>
                        <h4 class="mb-2 text-lg font-bold sm:text-xl">
                            <a
                                href="javascript:void(0)"
                                class="leading-7 text-gray-800 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-400"
                            >
                                How to explore one of the most beautiful lakes in the whole world
                            </a>
                        </h4>
                        <p class="mb-3 text-sm font-medium text-gray-600 dark:text-gray-400">
                            February 15, 2023 · 5 min read
                        </p>
                        <p class="leading-relaxed text-gray-600 dark:text-gray-400">
                            Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed
                            rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi
                            nec lectus.
                        </p>
                    </div>
                </div>
            </div>
            <!-- END Blog Posts -->
        </div>
    </div>
    <!-- END Blog List Section: In Grid -->

</div>
