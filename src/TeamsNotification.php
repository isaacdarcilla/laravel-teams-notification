<?php

namespace TeamsNotification\TeamsNotification;

class TeamsNotification
{
    protected string $url;

    protected array $payload;

    protected mixed $context;

    public static function create(): static
    {
        return new static ();
    }

    public function __construct()
    {
    }

    /**
     * Webhook URL to make request
     *
     * @return $this
     */
    public function webHookUrl(string $url = null): TeamsNotification
    {
        $this->url = $url ?? config('teams-notification.webhook_url');

        return $this;
    }

    /**
     * The card design of the message to be sent in MS Teams.
     *
     * @return $this
     */
    public function payload(array $payload): self
    {
        $this->payload = $payload;

        $options = [
            'http' => [
                'header' => 'Content-Type: application/json',
                'method' => 'POST',
                'content' => json_encode($payload),
            ],
        ];

        $this->context = stream_context_create($options);

        return $this;
    }

    /**
     * Send the request to webhook
     */
    public function dispatch(): false|string
    {
        return file_get_contents($this->url, false, $this->context);
    }
}
