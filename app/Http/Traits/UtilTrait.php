<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait UtilTrait
{
    /**
     * Create slug with optional custom replacements.
     *
     * @param  string  $string
     * @param  array   $replacements
     * @param  string  $separator
     * @param  string  $language
     * @return string
     */
    public function createSlug(
        string $string,
        array $replacements = [],
        string $separator = '-',
        string $language = 'en'
    ): string {
        // Default custom replacements
        $defaultReplacements = [
            '@' => 'at',
            '&' => 'and',
            '%' => 'percent',
            '$' => 'dollar',
            '+' => 'plus',
            '*' => 'star',
            '#' => 'hash',
            '!' => '',
            '?' => '',
            '/' => '-',
            '\\' => '-',
            '.' => '',
            ',' => '',
            ':' => '',
            ';' => '',
            '(' => '',
            ')' => '',
            '[' => '',
            ']' => '',
            '{' => '',
            '}' => '',
            "'" => '',
            '"' => '',
            '|' => '',
            '<' => '',
            '>' => '',
            '=' => '-',
            '~' => '',
        ];

        // Merge user-defined replacements with defaults
        $finalReplacements = array_merge($defaultReplacements, $replacements);

        // Apply replacements
        $string = strtr($string, $finalReplacements);

        // Create slug
        return Str::slug(strtolower($string), $separator, $language);
    }
}
