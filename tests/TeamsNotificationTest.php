<?php

use Illuminate\Support\Facades\Event;
use TeamsNotification\TeamsNotification\Events\OrderStatusEvent;

it('can dispatch the event', function () {
    Event::fake();

    $order_uuid = '123456';
    $new_status = 'shipped';
    $timestamp = '2023-04-05 01:36:20';

    event(new OrderStatusEvent($order_uuid, $new_status, $timestamp));

    Event::assertDispatched(OrderStatusEvent::class, function ($event) use ($order_uuid, $new_status, $timestamp) {
        return $event->order_uuid === $order_uuid &&
            $event->new_status === $new_status &&
            $event->timestamp === $timestamp;
    });
});
