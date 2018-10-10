<?php

namespace Enovision\Lightbox\Classes;

abstract class Helpers
{

    static function contentLightbox($html)
    {
        $pattern = '/<img[^>]+>/i';

        $newHtml = preg_replace_callback($pattern, function ($images) {
            $image = $images[0];

            $match = [];

            preg_match_all('@src="([^"]+)"@', $image, $match);

            $srcUrlWithQry = $match[1][0];
            $srcUrl = substr($srcUrlWithQry, 0, strpos($srcUrlWithQry, '?'));

            $srcUrlParsed = parse_url($image);

            parse_str($srcUrlParsed['query'], $query);

            if (strpos($srcUrlWithQry, 'lightbox') !== false) {

                $newImage = sprintf("<a href=\"%s\" data-toggle=\"lightbox\">%s</a>",
                    $srcUrl,
                    self::addDataTag('data-jslghtbx', self::cleanUrl($image, ['?lightbox', '&amp;lightbox']))
                );

                return $newImage;
            }

            return $image;

        }, $html);

        return $newHtml;
    }

    static function addDataTag($tag, $image)
    {
        $imageSplit = explode(' ', $image);
        array_splice($imageSplit, 1, 0, [$tag]);
        return implode(' ', $imageSplit);
    }

    static function cleanUrl($url = '', $remove = [], $count = 1)
    {
        $output = str_replace($remove, '', $url);

        if (strpos($output, '?') === false && strpos($output, '&amp;') !== false) {
            $output = str_replace('&amp;', '?', $output, $count);
        }

        return $output;

    }

}