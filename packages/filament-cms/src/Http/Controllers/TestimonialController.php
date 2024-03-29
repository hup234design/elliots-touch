<?php

namespace Hup234design\FilamentCms\Http\Controllers;

use App\Http\Controllers\Controller;
use Hup234design\FilamentCms\Models\IndexPage;
use Hup234design\FilamentCms\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $page = IndexPage::where('for', 'testimonials')->firstOrFail();

        $testimonials = Testimonial::visible()
            ->orderBy('received_on', 'desc')
            ->paginate(10);

        return view('cms::testimonials.index', compact('page', 'testimonials'));
    }
}
