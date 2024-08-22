<?php

namespace D34dman\ConsecutiveDate;

/**
 * Utility to calculate consecutive dates.
 */
class ConsecutiveDate
{

    /**
     * Helper method to count consecutive daily login.
     *
     * @param \DateTimeInterface $date
     *  The date from which we need to retrospectively calculate daily login.
     * @param \DateTimeInterface[] $list
     *    List of items representing date.
     * @param string $date_format
     *   The date format used by each item in the list.
     *   E.g. 'Y-m-d'.
     *
     * @return int
     *   Consecutive daily login.
     */
    public static function countPastDays(\DateTimeInterface $date, array $list, string $date_format): int {
        return static::countIntervals($date, $list, $date_format, '-1 day');
    }

    /**
     * Helper method to count consecutive daily login.
     *
     * @param \DateTimeInterface $date
     *  The date from which we need to retrospectively calculate daily login.
     * @param \DateTimeInterface[] $list
     *    List of items representing date.
     * @param string $date_format
     *   The date format used by each item in the list.
     *   E.g. 'Y-m-d'.
     *
     * @return int
     *   Consecutive daily login.
     */
    public static function countFutureDays(\DateTimeInterface $date, array $list, string $date_format): int {
        return static::countIntervals($date, $list, $date_format, '1 day');
    }


    /**
     * Helper method to count consecutive date intervals.
     *
     * @param \DateTimeInterface $date
     *  The date from which we need to retrospectively calculate daily login.
     * @param \DateTimeInterface[] $list
     *   List of items representing date.
     * @param string $date_format
     *   The date format used by each item in the list.
     *   E.g. 'Y-m-d'.
     * @param string $interval
     *   The interval to use for date difference.
     *
     * @return int
     *   Consecutive daily login.
     */
    public static function countIntervals(\DateTimeInterface $date, array $list, string $date_format, string $interval = '-1 day'): int {
        $date_strings = array_map(fn ($date) => $date->format($date_format), $list);
        return ConsecutiveDateStrings::countIntervals($date, $date_strings, $date_format, $interval);
    }

}