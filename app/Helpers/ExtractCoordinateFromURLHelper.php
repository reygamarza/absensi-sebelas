<?php

namespace App\Helpers;

class ExtractCoordinateFromURLHelper
{
    public static function getCoordinatesAndPlace(string $urlMaps)
    {
        // Resolusi URL (jika URL adalah short link)
        $resolvedUrl = self::resolveUrl($urlMaps);
        $urlMaps = $resolvedUrl ?? $urlMaps;

        // Mencocokkan pola pertama dari URL yang mengandung koordinat
        $matches = [];
        preg_match('/@([-0-9.]+),([-0-9.]+)/', $urlMaps, $matches);
        if (count($matches) === 3) {
            return [
                'latitude' => (float) $matches[1],
                'longitude' => (float) $matches[2],
            ];
        }

        // Mencocokkan pola kedua dari URL yang mengandung data koordinat
        preg_match('/data=.*!3d([-0-9.]+)!4d([-0-9.]+)/', $urlMaps, $matches);
        if (count($matches) === 3) {
            return [
                'latitude' => (float) $matches[1],
                'longitude' => (float) $matches[2],
            ];
        }

        // Mencocokkan pola ketiga dari URL yang mengandung tempat dan koordinat
        preg_match('/place\/([^\/?]+).*!3d([-0-9.]+)!4d([-0-9.]+)/', $urlMaps, $matches);
        if (count($matches) === 4) {
            return [
                'latitude' => (float) $matches[2],
                'longitude' => (float) $matches[3],
            ];
        }

        // Mengambil bagian URL sebelum tanda tanya (?) untuk pola terakhir
        $cleanUrl = explode('?', $urlMaps)[0];

        // Mencocokkan pola terakhir untuk mendapatkan koordinat
        preg_match('/([-+]?[0-9]*\.?[0-9]+),([-+]?[0-9]*\.?[0-9]+)/', $cleanUrl, $matches);
        if (count($matches) === 3) {
            return [
                'latitude' => (float) $matches[1],
                'longitude' => (float) $matches[2],
            ];
        }

        // Jika tidak ada koordinat ditemukan
        return null;
    }

    public static function resolveUrl(string $shortUrl)
    {
        if ($shortUrl) {
            // Mendapatkan header URL dan memeriksa lokasi jika ada pengalihan
            $headers = @get_headers($shortUrl, 1);
            if ($headers && isset($headers['Location'])) {
                return is_array($headers['Location']) ? end($headers['Location']) : $headers['Location'];
            }
        }

        return null;
    }
}
