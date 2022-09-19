<?php

namespace App\Service\Contracts;

use App\Entity\Url;

/**
 * Interface UrlServiceInterface
 * @package App\Service\Contracts
 */
interface UrlServiceInterface
{
    /**
     * @param string $url
     * @param int $expiry
     * @return Url
     */
    public function create(string $url, int $expiry): Url;

    /**
     * @param string $shortUrl
     * @return Url|null
     */
    public function getFullUrl(string $shortUrl): ?string;

}

