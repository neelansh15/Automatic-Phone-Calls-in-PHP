<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account\Usage;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

class TriggerContext extends InstanceContext {
    /**
     * Initialize the TriggerContext
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the Account that created the resource
     *                           to fetch
     * @param string $sid The unique string that identifies the resource
     */
    public function __construct(Version $version, $accountSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['accountSid' => $accountSid, 'sid' => $sid, ];

        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/Usage/Triggers/' . \rawurlencode($sid) . '.json';
    }

    /**
     * Fetch a TriggerInstance
     *
     * @return TriggerInstance Fetched TriggerInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): TriggerInstance {
        $params = Values::of([]);

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new TriggerInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the TriggerInstance
     *
     * @param array|Options $options Optional Arguments
     * @return TriggerInstance Updated TriggerInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): TriggerInstance {
        $options = new Values($options);

        $data = Values::of([
            'CallbackMethod' => $options['callbackMethod'],
            'CallbackUrl' => $options['callbackUrl'],
            'FriendlyName' => $options['friendlyName'],
        ]);

        $payload = $this->version->update(
            'POST',
            $this->uri,
            [],
            $data
        );

        return new TriggerInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Deletes the TriggerInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.TriggerContext ' . \implode(' ', $context) . ']';
    }
}