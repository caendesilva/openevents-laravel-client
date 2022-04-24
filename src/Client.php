<?php

namespace OpenEvents\LaravelClient;

use Illuminate\Support\Facades\Http;

/**
 * HTTP Client for the OpenEvents API
 * @todo Add method to get the response.
 */
class Client
{
    public function dispatchRequest(Event $event)
    {
        try {
            $this->flightCheck($event);

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . config('openevents.token'),
            ])->timeout(config('openevents.timeout', 3))->post(config('openevents.endpoint'), $event->toArray());

            if ($response->status() >= 400) {
                throw new \Exception('OpenEvents API returned an error: ' . $response->body());
            }
        } catch (\Exception $exception) {
            throw_unless(OpenEventsFacade::environment() === 'production', $exception);
        }

    }

    /**
     * Perform a pre-validation before making a failing request.
     * @param Event $event
     * @return void
     */
    protected function flightCheck(Event $event)
    {

        if (!config('openevents.token')) {
            throw new \InvalidArgumentException('OpenEvents API token is not set!');
        }

        if (!config('openevents.endpoint')) {
            throw new \InvalidArgumentException('OpenEvents API endpoint is not set!');
        }

        if (strlen($event->event) > 64) {
            throw new \LengthException('Event name may not exceed 64 characters!');
        }

        if (strlen($event->data) > 255) {
            throw new \LengthException('Event context data may not exceed 255 characters!');
        }

    }
}
