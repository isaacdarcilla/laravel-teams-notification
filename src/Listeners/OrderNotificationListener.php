<?php

namespace TeamsNotification\TeamsNotification\Listeners;

use TeamsNotification\TeamsNotification\Events\OrderStatusEvent;
use TeamsNotification\TeamsNotification\TeamsNotification;

class OrderNotificationListener
{
    /**
     * Handle the event.
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

        return TeamsNotification::create()
            ->webHookUrl()
            ->payload($card)
            ->dispatch();
    }
}
