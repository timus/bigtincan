<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Url;
use App\Repository\UrlRepository;
use App\Service\Contracts\UrlServiceInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

/**
 * Class UrlService
 *
 * @package App\Service
 */
class UrlService implements UrlServiceInterface
{

    /**
     * @var UrlRepository $urlRepository
     */
    protected UrlRepository $urlRepository;


    /**
     * DashboardCacheService constructor.
     *
     * @param UrlRepository $urlRepository
     */
    public function __construct(
        UrlRepository $urlRepository

    )
    {
        $this->urlRepository = $urlRepository;
    }

    /**
     * @param string $url
     * @param int $expiry
     * @return Url
     */
    public function create(string $url, int $expiry): Url
    {
        //TODO : Validate short Url  to be unique
        $shortUrl = $this->createShortUrl();
        try {
            return $this->urlRepository
                ->createUrl($shortUrl, $url, $expiry);
        } catch (OptimisticLockException $e) {
        } catch (ORMException $e) {
        }

    }


    /**
     * @param string $shortUrl
     * @return string|null
     */
    public function getFullUrl(string $shortUrl): ?string
    {
        //TODO : create a seperate service for access log and inject that service on this service
        return $this->urlRepository
            ->getFullUrlByShortUrl($shortUrl);
    }

    /**
     * @return string
     */
    private function createShortUrl(): string
    {
        return bin2hex(random_bytes(3));
    }
}