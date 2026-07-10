<?php

namespace App\Support;

use HTMLPurifier;
use HTMLPurifier_Config;

class HtmlSanitizer
{
    private static ?HTMLPurifier $purifier = null;

    public static function sanitize(?string $html): string
    {
        if ($html === null || $html === '') {
            return '';
        }

        return self::getPurifier()->purify($html);
    }

    private static function getPurifier(): HTMLPurifier
    {
        if (self::$purifier === null) {
            $config = HTMLPurifier_Config::createDefault();

            $config->set('HTML.Allowed', implode(',', [
                'p',
                'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
                'strong', 'em', 'b', 'i', 'u', 's', 'mark', 'small', 'del', 'ins', 'sub', 'sup',
                'a[href|title|target|rel]',
                'ul', 'ol', 'li',
                'blockquote',
                'pre', 'code',
                'img[src|alt|width|height|loading]',
                'table', 'thead', 'tbody', 'tr', 'th[scope]', 'td[colspan|rowspan]',
                'hr',
                'br',
                'div',
                'span',
            ]));

            $config->set('HTML.Nofollow', true);
            $config->set('Attr.AllowedFrameTargets', ['_blank']);
            $config->set('AutoFormat.RemoveEmpty', true);

            self::$purifier = new HTMLPurifier($config);
        }

        return self::$purifier;
    }
}
