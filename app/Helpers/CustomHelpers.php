<?php

if (! function_exists('truncateHtml')) {
    /**
     * Truncate HTML content to a specified length while preserving HTML tags.
     *
     * @param string $text The content to be truncated.
     * @param int $length The maximum length of the plain text before truncation.
     * @return string The truncated HTML content.
     */
    function truncateHtml($text, $length = 100)
    {
        // Strip the tags and get the plain text length
        $plainText = strip_tags($text);

        // If the plain text is already shorter than or equal to the length, return the original content
        if (strlen($plainText) <= $length) {
            return $text;
        }

        // Truncate the plain text
        $truncatedText = substr($plainText, 0, $length);

        // Find the last space to avoid cutting words in half
        $lastSpace = strrpos($truncatedText, ' ');
        if ($lastSpace !== false) {
            $truncatedText = substr($truncatedText, 0, $lastSpace);
        }

        // Add ellipsis to indicate truncation
        $truncatedText .= '...';

        // Rebuild the content with HTML tags intact
        return preg_replace('/\b' . preg_quote($truncatedText, '/') . '\b/', $truncatedText, $text);
    }
}
