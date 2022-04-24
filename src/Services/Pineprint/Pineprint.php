<?php

namespace OpenEvents\LaravelClient\Services\Pineprint;

/**
 * Create an anonymized "fingerprint" that can be used to
 * group similar events instances without identifying
 * the user or any other personal information.
 */
class Pineprint
{
    public string $event;
    // The modifier will support more options through method chaining.
    // For now serialize objects to JSON and/or supply a hash.
    public ?string $modifier;

    protected int $value;

    protected string $algorithm = 'sha256';

    public function __construct(string $eventName, ?string $modifier = null)
    {
        $this->event = $eventName;
        $this->modifier = $modifier;

        $this->value = $this->calculate();
    }

    /**
     * The goal of this function is to create an integer
     * that is unique for the given event but cannot
     * be used in any other context.
     *
     * The algorithm is based on the following principles:
     * The event name is used for the initial value,
     * thus locking the result to the event name.
     *
     * Any modifiers can then be added to the value
     * depending on what metric is desired.
     * This can be a hash of the actual event value,
     * the account id, the session id, etc.
     *
     * This can be useful to see if two events are
     * made by the same user.
     *
     * The value can be salted with a secret key if
     * specified in the config/environment variable
     * so that the value is not predictable by
     * outside parties. This will then use hash_hmac.
     *
     * Note that until this algorithm is tested and proven
     * it will be changed countless times and as such
     * will not be useful for long term comparisons,
     * but can be used to compare events for the same
     * day or at least since the last update.
     * 
     * When converting to a HumanoID a limited set of
     * fruit related words are used. The intentional
     * limitation is to limit how identifying the
     * identifier is.
     */
    protected function calculate(): int
    {
        $value = 0;

        $value += hexdec(substr(hash($this->algorithm, $this->event), 0, 8));
        $value += hexdec(substr(hash($this->algorithm, $this->modifier), 0, 8));

        return  $value;
    }

    public function getInteger(): int
    {
        return $this->value;
    }
}
