<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class SidebarUser extends Component
{
    public Collection $routes;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->routes = collect(Route::getRoutes())->filter(function ($route) {
            return str_starts_with($route->getName(), 'user.');
        })->values();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.sidebar-user', [
            'routes' => $this->routes
        ]);
    }
}
