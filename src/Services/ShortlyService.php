<?php

namespace Aysetas\ShortlyPackage\Services;


use Aysetas\ShortlyPackage\Models\ShortUrl;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Sqids\Sqids;

class ShortlyService
{
    /**
     *  Creates a short URL.
     *
     * @param $url
     * @return string
     */
    public function getUrl($url): string
    {
        return  Cache::lock('short_url_lock', 2)->block(1, function () use ($url) {

            $uuid = (int)str_replace('.', '', strval(microtime(true)));

            $shortCode = (new Sqids(minLength: 6))->encode([$uuid]);

            ShortUrl::create([
                'url' => $url,
                'code' => $shortCode,
                'hits' => 0,
            ]);

            return 'http://short.ly/' . $shortCode;
        });
    }

    /**
     * Converts the generated short URL to the original target URL
     *
     * @param $shortCode
     * @return string|null
     */
    public function expandUrl($shortCode): string|null
    {
        $url = ShortUrl::whereCode($shortCode)
            ->firstOrFail();
        if ($url) {
            $url->increment('hits');
            return $url->url;
        }
        return null;
    }

    /**
     * Returns the total number of clicks for a short URL.
     *
     * @param string $shortCode
     * @return int
     */
    public function getHits($shortCode): int
    {
        return ShortUrl::where('code', $shortCode)->value('hits') ?? 0;
    }

}
