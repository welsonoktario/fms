<?php
namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Request;

class Breadcrumbs extends Component
{
    public array $breadcrumbs = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $url = Request::url();
        $segments = explode('/', trim($url, '/'));

        foreach ($segments as $key => $segment) {
            if ($key < 2) {
                continue; // Skip first two segments
            }

            // Skip the index for "detail"
            if ($segment === 'detail') {
                continue;
            }

            if ($key == 2) {
                $this->breadcrumbs[] = [
                    'href' => '/',
                    'label' => 'Dashboard',
                ];
                continue;
            }

            if (intval($segment) > 0) {
                continue; // Skip numeric segments
            }

            $this->breadcrumbs[] = [
                'href' => implode('/', array_slice($segments, 0, $key + 1)),
                'label' => ucwords(join(' ', explode('-', $segment))),
            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumbs');
    }
}

