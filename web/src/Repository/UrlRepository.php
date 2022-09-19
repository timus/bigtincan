<?php

namespace App\Repository;

use App\Entity\Url;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use DateTime;

/**
 * Class UrlRepository
 *
 * @package App\Repository
 */
class UrlRepository extends ServiceEntityRepository
{
    /**
     * UrlRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Url::class);
    }

    /**
     * @param string $shortUrl
     * @param false $deleted
     * @return string|null
     */
    public function getFullUrlByShortUrl(string $shortUrl, bool $deleted = false): ?string
    {
        $url= $this->findOneBy([
            'shortUrl' => $shortUrl,
            'deleted' => $deleted,
        ]);
        print_r($url);

        return $url->getUrl();
    }

    /**
     * @param string $shortUrl
     * @param string $url
     * @param int $validHours
     * @return Url
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function createUrl(string $shortUrl, string $url, int $validHours): Url
    {
        $url = new Url([
            'url' => $url,
            'shortUrl' => $shortUrl,
            'created' => new DateTime(),
            'modified' => new DateTime(),
            'deleted' => 0,
            'validHours' => $validHours
        ]);

        $entityManager = $this->getEntityManager();
        $entityManager->persist($url);
        $entityManager->flush();

        return $url;
    }

    /**
     * @param Url $url
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function deleteUrl(Url $url): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->remove($url);
        $entityManager->flush();
    }

}