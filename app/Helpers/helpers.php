<?php

use Carbon\Carbon;

if (!function_exists('format_carbon_date')) {
    /**
     * Format a Carbon date in the desired format.
     *
     * @param Carbon|string|null $date
     * @return string
     */
    function format_carbon_date($date = null): string
    {
        if (!$date) {
            return '';
        }

        $carbonDate = $date instanceof Carbon ? $date : Carbon::parse($date);
        return $carbonDate->format('D jS F, Y');
    }
}
