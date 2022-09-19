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
     * @Route("/url/{shortUrl}/", name="resolve-short-url", methods={"GET"})
     * @param UrlServiceInterface $urlService
     * @param $shortUrl
     * @return RedirectResponse | JsonResponse
     */
    public function getUrl(
        UrlServiceInterface $urlService,
        $shortUrl
    )
    {
        $url = $urlService->getFullUrl(
            $shortUrl
        );
        if (isset($url)) {
            return new RedirectResponse($url);
        } else {
            //TODO : Keep all constants in seperate place
            return new JsonResponse('Url is expired or does not exists');
        }
    }
}