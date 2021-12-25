<?php

namespace App\Entity;

use App\Repository\EntityRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

abstract class Entity
{
        /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;


    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function doPrePersist()
    {
        $now = new DateTime();
        $this->setCreatedAt($now)->setUpdatedAt($now);
        $this->setStatus(1);
    }

    /**
     * @ORM\PreUpdate
     */
    public function doPreUpdate()
    {
        $this->setUpdatedAt(new DateTime());
    }
}
