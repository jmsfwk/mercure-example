<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Mercure\Jwt\StaticJwtProvider;
use Symfony\Component\Mercure\Publisher;
use Symfony\Component\Mercure\Update;

final class PublishController extends Controller
{
    private const JWT = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJtZXJjdXJlIjp7InN1YnNjcmliZSI6WyJmb28iLCJiYXIiXSwicHVibGlzaCI6WyIqIl19fQ.499t1KTyCH4Hkqd9LtnHR9zwxZ6QbW5b5UKee3ZTXyM';

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
        ]);

        $publisher = new Publisher('http://web/.well-known/mercure', new StaticJwtProvider(self::JWT));
        // Serialize the update, and dispatch it to the hub, that will broadcast it to the clients
        $id = $publisher(new Update('https://example.com/books/1.jsonld', $request->message));

        return response()->json($id);
    }
}
