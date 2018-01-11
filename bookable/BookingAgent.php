<?php

namespace Staf\Bookable;

class BookingAgent
{
    /**
     * @var Bookable
     */
    protected $bookable;

    /**
     * @var BookingClient
     */
    protected $client;

    /**
     * @var BookingTime[]
     */
    protected $times = [];

    /**
     * Start a booking on a bookable item.
     * Note: For now we can only book one item at a time, unless the object
     * implementing the Bookable interface is a collection of objects.
     *
     * @param  Bookable $bookable
     * @return BookingAgent
     */
    public function book(Bookable $bookable)
    {
        $this->bookable = $bookable;

        return $this;
    }

    /**
     * Who is making the booking.
     *
     * @param  BookingClient $client
     * @return BookingAgent
     */
    public function by(BookingClient $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Add one or multiple times for the booking.
     *
     * @param  BookingTime|BookingTime[] $times
     * @return BookingAgent
     * @throws \InvalidArgumentException
     */
    public function at($times)
    {
        if (!is_array($times)) {
            $times = func_get_args();
        }

        foreach ($times as $time) {
            if (!$time instanceof BookingTime) {
                throw new \InvalidArgumentException("Times passed to BookingManager::at must implement the BookingDuration interface.");
            }

            $this->times[] = $time;
        }

        return $this;
    }

    /**
     * Accept a booking object here and fill in the meta data. Since we don't know
     * what object will actually represent the booking we need to receive the
     * actual instance from the user of the library. Exactly how this is best
     * done is yet to be determined.
     *
     * @param  BookingMeta $booking
     * @return BookingMeta
     */
    public function create(BookingMeta $booking)
    {
        $booking->attachBookable($this->bookable);
        $booking->attachClient($this->client);
        $booking->attachTimes($this->times);

        return $booking;
    }
}
