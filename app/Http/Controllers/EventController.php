<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class EventController extends Controller
{
    public function show()
    {
        return Inertia::render('Register/Form', [
            'stores' => [
                'id' => 1,
                'name' => 'duy',
                'routeDelete' => '/api/delete/1'
            ],
        ]);
    }
}
