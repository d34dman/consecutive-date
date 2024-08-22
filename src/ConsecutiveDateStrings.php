<?php

namespace D34dman\ConsecutiveDate;

/**
 * Utility to calculate consecutive dates in string format.
 */
class ConsecutiveDateStrings
{

    /**
     * Helper method to count consecutive daily login.
     *
     * @param \DateTimeInterface $date
     *  The date from which we need to retrospectively calculate daily login.
     * @param string[] $list
     *   List of strings representing date.
     *   E.g. ['2020-01-25', '2020-01-24', '2020-01-01'].
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
     * @param string[] $list
     *   List of strings representing date.
     *   E.g. ['2020-01-25', '2020-01-24', '2020-01-01'].
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
     * @param string[] $list
     *   List of strings representing date.
     *   E.g. ['2020-01-25', '2020-01-24', '2020-01-01'].
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
        $total_consecutive_login = 0;
        $activity_list_length = count($list);
        do {
            if ($total_consecutive_login > $activity_list_length) {
                // In case we have already went through  all the list, lets stop
                // calculating further. This is more of a failsafe, as this case
                // should not occur.
                break;
            }
            $date_string = $date->format($date_format);
            if (!in_array($date_string, $list)) {
                break;
            }
            $total_consecutive_login++;
            $date->modify($interval);
        } while (TRUE);
        return $total_consecutive_login;
    }

}