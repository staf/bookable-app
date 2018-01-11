<?php

namespace Staf\Bookable;

/**
 * This is the time of the booking. Since in some use cases we might want to
 * create a booking with multiple times or a recurring but not perpetual
 * booking the booking time/duration is best stored as a separate object
 * which does not constrain the amount of booking times we can set.
 *
 * @package Staf\Bookable
 */
interface BookingDuration
{
    //
}
