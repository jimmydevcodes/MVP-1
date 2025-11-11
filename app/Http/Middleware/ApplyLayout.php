<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Livewire\Component;

class ApplyLayout
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('register') && $request->route()->getAction()['uses'] instanceof Component) {
            $request->route()->setParameter('layout', 'components.layouts.app');
        }

        return $next($request);
    }
}