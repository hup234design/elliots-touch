{{--<div><div @class([--}}
{{--        "pt-20 first:pt-0" => ($this->data['include_header'] ?? false),--}}
{{--        "pt-8 first:pt-0" => ! ($this->data['include_header'] ?? false)--}}
{{--])>--}}
{{--    --}}{{--    <div class="container">--}}
{{--    @if( $this->data['include_header'] ?? false )--}}
{{--        <div class="container mb-12">--}}
{{--            <div class="">--}}
{{--                <div @class([--}}
{{--                    "text-left" => (($this->data['header_alignment'] ?? null) == "left"),--}}
{{--                    "text-center" => (($this->data['header_alignment'] ?? null) == "center"),--}}
{{--                    "text-right" => (($this->data['header_alignment'] ?? null) == "right")--}}
{{--                ])>--}}
{{--                    @if( $this->data['header_title'] ?? null)--}}
{{--                        <h2 class="font-headline mt-0 mb-0">--}}
{{--                            {{ $this->data['header_title']  }}--}}
{{--                        </h2>--}}
{{--                    @endif--}}
{{--                    --}}{{--                    @if( $this->data['header_text'] ?? null)--}}
{{--                    --}}{{--                        <p class="mt-6 max-w-3xl mx-auto">--}}
{{--                    --}}{{--                            {{ nl2br($this->data['header_text'])  }}--}}
{{--                    --}}{{--                        </p>--}}
{{--                    --}}{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <div class="container">--}}
{{--        {{ $slot }}--}}
{{--    </div>--}}
{{--</div>--}}
{{--</div>--}}


<div @class([
        "pt-20 first:pt-0" => ($this->data['include_header'] ?? false),
        "pt-12 first:pt-0" => ! ($this->data['include_header'] ?? false)
])>
    @if( $this->data['include_header'] ?? false )

            <div @class([
                "container mb-12",
                "text-left" => (($this->data['title_alignment'] ?? null) == "left"),
                "text-center" => (($this->data['title_alignment'] ?? null) == "center"),
                "text-right" => (($this->data['title_alignment'] ?? null) == "right")
            ])>
                <div class="prose prose-lg">
                @if( $this->data['header_title'] ?? null)
                    <h2 class="font-headline mt-0 mb-0">
                        {{ $this->data['header_title']  }}
                    </h2>
                @endif
                @if( $this->data['header_text'] ?? null)
                    <p class="max-w-3xl mx-auto">
                        {{ nl2br($this->data['header_text'])  }}
                    </p>
                @endif
                </div>
            </div>
    @endif
    <div class="container">
        {{ $slot }}
    </div>
</div>
