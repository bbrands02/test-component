<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Filter\LikeFilter;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is the Test entity.
 *
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}, "enable_max_depth"=true},
 *     denormalizationContext={"groups"={"write"}, "enable_max_depth"=true},
 *     itemOperations={
 *     		"get","put","delete",
 *     		"audittrail"={
 *     			"method"="GET",
 *     			"name"="Provides an auditrail for this entity",
 *     			"description"="Provides an auditrail for this entity"
 *     		}
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\TestRepository")
 * @Gedmo\Loggable
 */
class Test
{
    /**
     * @var UuidInterface
     *
     * @Groups({"read"})
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @var string $randomString RandomString of this Test
     * @example abcdefg
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(
     *     max = 255
     * )
     */
    private $randomString;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Type("int")
     */
    private $randomInt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $randomDate;

    public function getId()
    {
        return $this->id;
    }

    public function getRandomString(): ?string
    {
        return $this->randomString;
    }

    public function setRandomString(?string $randomString): self
    {
        $this->randomString = $randomString;

        return $this;
    }

    public function getRandomInt(): ?int
    {
        return $this->randomInt;
    }

    public function setRandomInt(?int $randomInt): self
    {
        $this->randomInt = $randomInt;

        return $this;
    }

    public function getRandomDate(): ?\DateTimeInterface
    {
        return $this->randomDate;
    }

    public function setRandomDate(?\DateTimeInterface $randomDate): self
    {
        $this->randomDate = $randomDate;

        return $this;
    }
}
