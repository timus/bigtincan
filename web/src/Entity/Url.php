<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Url
 *
 * @package AppBundle\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UrlRepository")
 * @ORM\Table(name="url")
 */
class Url
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected ?string $id = null;

    /**
     * @ORM\Column(type="string", name="url")
     */
    protected string $url;

    /**
     * @ORM\Column(type="string", name="short_url")
     */
    protected string $shortUrl;

    /**
     * @ORM\Column(type="datetime")
     */
    protected DateTime $modified;

    /**
     * @ORM\Column(type="datetime")
     */
    protected DateTime $created;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\Type("bool")
     */
    protected bool $deleted;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\Type("bool")
     */
    protected int $validHours;

    /**
     * Constructor for url
     * @param array $urlParams
     */
    public function __construct(array $urlParams)
    {
        $this->url = $urlParams['url'];
        $this->shortUrl = $urlParams['shortUrl'];
        $this->created = $urlParams['created'];
        $this->modified = $urlParams['modified'];
        $this->deleted = (bool)$urlParams['deleted'];
        $this->validHours = $urlParams['validHours'];
    }


    /**
     * @param DateTime $modified
     * @return $this
     */
    public function setModified(DateTime $modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getModified(): DateTime
    {
        return $this->modified;
    }

    /**
     * @param DateTime $created
     * @return $this
     */
    public function setCreated(DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @return bool
     */
    public function getDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     * @return $this
     */
    public function setDeleted(bool $deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return int
     */
    public function getValidHours(): int
    {
        return $this->validHours;
    }

    /**
     * @param int $validHours
     * @return $this
     */
    public function setValidHours(int $validHours)
    {
        $this->validHours = $validHours;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}