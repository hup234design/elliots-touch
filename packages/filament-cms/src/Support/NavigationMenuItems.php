<?php

namespace Hup234design\FilamentCms\Support;

use Hup234design\FilamentCms\Models\IndexPage;
use Hup234design\FilamentCms\Models\Page;

class NavigationMenuItems
{
    public static function transform($items = [])
    {
        return self::transformItems($items);
    }

    private static function transformItems($items) {
        $transformedItems = [];

        foreach ($items as $item) {
            $href = null;
            $target = '_self';
            $dropdown = false;

            switch($item['type']) {
                case 'dropdown':
                    $dropdown = true;
                    break;

                case 'home-page':
                    $href = route('home');
                    break;

                case 'page':
                    if ($page = Page::find($item['data']['page_id'])) {
                        $href = route('page', $page->slug);
                    }
                    break;

                case 'index-page':
                    if ($page = IndexPage::find($item['data']['index_page_id'])) {
                        $href = route($page->for . '.index');
                    }
                    break;

                case 'external-link':
                    $href   = $item['data']['url'];
                    $target = $item['data']['target'] ?? '_self';
                    break;
            }

            // If the model (Page, Post or External Link) was processed and the route was generated
            if ($dropdown || $href) {
                $transformed = [
                    'label'    => $item['label'],
                    'href'     => $href,
                    'target'   => $target,
                    'dropdown' => $dropdown,
                    'children' => null,
                ];

                // If there are children, transform them recursively
                if (!empty($item['children'])) {
                    $transformed['dropdown'] = true;
                    $transformed['children'] = self::transformItems($item['children']);
                }

                $transformedItems[] = $transformed;
            }
        }
        return $transformedItems;
    }
}
