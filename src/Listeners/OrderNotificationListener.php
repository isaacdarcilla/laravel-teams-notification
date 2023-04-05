<?php

namespace TeamsNotification\TeamsNotification\Listeners;

use TeamsNotification\TeamsNotification\Events\OrderStatusEvent;

class OrderNotificationListener
{
    /**
     * Handle the event.
     *
     * @param  OrderStatusEvent  $event
     * @return false|string
     */
    public function handle(OrderStatusEvent $event): false|string
    {
        $card = [
            'type' => 'MessageCard',
            'context' => 'https://schema.org/extensions',
            'themeColor' => '0076D7',
            'summary' => 'Order Status Update',
            'sections' => [
                [
                    'activityTitle' => 'Order Status Update',
                    'activitySubtitle' => "Order ID: $event->order_uuid",
                    'facts' => [
                        [
                            'name' => 'New Status',
                            'value' => $event->new_status,
                        ],
                        [
                            'name' => 'Timestamp',
                            'value' => $event->timestamp,
                        ],
                    ],
                ],
            ],
        ];

        $options = [
            "http" => [
                "header" => "Content-Type: application/json",
                "method" => "POST",
                "content" => json_encode($card)
            ]
        ];
        $context = stream_context_create($options);
        return file_get_contents(config('teams-notification.webhook_url'), false, $context);
    }
}