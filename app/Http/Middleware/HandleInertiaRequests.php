<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => auth()->guest() ? null : [
                'user' => auth()->user()->only( 'nome', 'email')
            ],
            'flash' => [
                'success' => fn() => $request->session()->get('success'),
                'error' => fn() => $request->session()->get('error'),
            ],
            'errors' => function () use ($request) {
                if (!$request->session()->get('errors')) {
                    return (object) [];
                }

                // Pega apenas a primeira mensagem de erro de cada campo
                return collect($request->session()->get('errors')->getBags())
                    ->mapWithKeys(function ($bag) {
                        return $bag->getMessages();
                    })
                    ->map(function ($messages) {
                        return $messages[0];
                    })
                    ->all();
            },
        ]);
    }
}
