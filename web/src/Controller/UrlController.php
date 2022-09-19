<?php

namespace App\Controller;

use App\Service\Contracts\UrlServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UrlController
 *
 * @package AppBundle\Controller
 */
class UrlController
{
    /**
     * resolve short URL
     * @Route("/url/{shortUrl}/resolve", name="resolve-short-url", methods={"GET"})
     * @param UrlServiceInterface $urlService
     * @param $shortUrl
     * @return JsonResponse
     */
    public function getUrl(
        UrlServiceInterface $urlService,
        $shortUrl
    ): RedirectResponse
    {
        return new RedirectResponse(
            $urlService->getFullUrl(
                $shortUrl
            )
        );
    }
}