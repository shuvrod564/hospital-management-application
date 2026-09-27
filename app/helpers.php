<?php
function formatDate($date)
{
    return date('d M, Y', strtotime($date));
}


if (!function_exists('format_to_human_time')) {
    /**
     * Convert a date/time string or Carbon instance into a localized, human-readable format.
     * * @param \Carbon\Carbon|string|null $time
     * @param string $format Default format if not using diffForHumans (e.g., 'Y-m-d H:i:s')
     * @param bool $relative Whether to return a relative time string (e.g., "3 hours ago")
     * @return string
     */
    function format_to_human_time(\Carbon\Carbon|string|null $time = null, string $format = 'g:i A', bool $relative = false): string
    {
        if (empty($time)) {
            return '';
        }

        // Ensure we are working with a Carbon instance
        $carbonTime = $time instanceof \Carbon\Carbon ? $time : \Carbon\Carbon::parse($time);

        if ($relative) {
            return $carbonTime->diffForHumans();
        }

        // Handles today/yesterday labeling smoothly before falling back to the standard format
        if ($carbonTime->isToday()) {
            return __('Today at ') . $carbonTime->format($format);
        }

        if ($carbonTime->isYesterday()) {
            return __('Yesterday at ') . $carbonTime->format($format);
        }

        return $carbonTime->format($format);
    }
}