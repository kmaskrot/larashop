<?php

namespace App\Services;


use Carbon\Carbon;
use Carbon\Traits\Date;

class DateService
{
    /**
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @param string $format
     * @param string $timezone
     * @return float
     */
    public static function getTimeBetweenTwoDates(
        Carbon $startDate,
        Carbon $endDate,
        string $format = 'minutes',
        string $timezone = 'Europe/Paris'
    ): float
    {
        $startDateTz = $startDate->timezone($timezone);
        $endDateTz = $endDate->timezone($timezone);

        if ($format === 'minutes') {
            return round($endDateTz->diffInMinutes($startDateTz));
        }

        if ($format === 'seconds') {
            return round($endDateTz->diffInSeconds($startDateTz));
        }

        if ($format === 'hours') {
            return round($endDateTz->diffInHours($startDateTz));
        }

        if ($format === 'days') {
            return round($endDateTz->diffInDays($startDateTz));
        }
        return round($endDateTz->diffInMinutes($startDateTz));

    }
}