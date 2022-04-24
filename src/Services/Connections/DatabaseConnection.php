<?php

namespace OpenEvents\Client\Services\Connections;

use Illuminate\Support\Facades\DB;
use OpenEvents\LaravelClient\Event;

/**
 * Connect directly to the application database.
 *
 * @Experimental!
 *
 * Can be used to store events locally to use without the API,
 * for redundancy, or for queueing. It's highly recommended
 * that the migration schema is compatible with the API.
 * To queue events it's safe to add a boolean column
 * to keep track of which events have been sent.
 */
class DatabaseConnection implements ConnectionContract
{
    protected string $table = 'openevents_events';

    /**
     * Store the event in the database.
     */
    public function handle(Event $event)
    {
        DB::table($this->table)->insert([
            'event' => $event->event,
            'data' => $event->data,
            'time' => time(),
            'sent' => false,
        ]);
    }
}
