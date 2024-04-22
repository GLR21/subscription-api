<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\StoreSubscriptionApiRequest;
use Illuminate\Support\Facades\Http;

class SubscriptionApiController extends Controller
{
    public function index()
    {
        $host = env('EVENTSFULLAPI_HOST');
        $token = env('EVENTSFULLAPI_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get($host .'/subscriptions');

        return $response->json();
    }

    public function show($id)
    {
        $host = env('EVENTSFULLAPI_HOST');
        $token = env('EVENTSFULLAPI_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get($host .'/subscriptions/'. $id);

        return $response->json();
    }

    public function store( StoreSubscriptionApiRequest $request)
    {
        $host = env('EVENTSFULLAPI_HOST');
        $token = env('EVENTSFULLAPI_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post($host .'/subscriptions/register', $request->all());

        return $response->json();
    }

    public function checkin($id)
    {
        $host = env('EVENTSFULLAPI_HOST');
        $token = env('EVENTSFULLAPI_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post($host .'/subscriptions/'. $id .'/checkin');

        return $response->json();
    }

    public function cancel($id)
    {
        $host = env('EVENTSFULLAPI_HOST');
        $token = env('EVENTSFULLAPI_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post($host .'/subscriptions/'. $id .'/cancel');

        return $response->json();
    }

    public function sendSubscriptions( $user )
    {
        $host = env('EVENTSFULLAPI_HOST');
        $token = env('EVENTSFULLAPI_TOKEN');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get($host .'/subscription/'. $user .'/email');

        return $response->json();
    }
}
