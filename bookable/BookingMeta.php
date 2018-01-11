<?php

namespace Staf\Bookable;

/**
 * This object represents the booking itself and contains the meta data about
 * what we are booking, who is booking it and when it is being booked.
 * The object is intended to be an Eloquent model.
 *
 * @package Staf\Bookable
 */
interface BookingMeta
{
    /**
     * @param Bookable $bookable
     */
    public function attachBookable(Bookable $bookable);

    /**
     * @param BookingClient $client
     */
    public function attachClient(BookingClient $client);

    /**
     * @param BookingTime[] $times
     */
    public function attachTimes(array $times);
}
