<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatusRepository")
 */
class Status
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StatusInfo", mappedBy="status")
     */
    private $statusInfos;

    public function __construct()
    {
        $this->statusInfos = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|StatusInfo[]
     */
    public function getstatusInfos(): Collection
    {
        return $this->statusInfos;
    }

    public function addstatusInfos(StatusInfo $statusInfos): self
    {
        if (!$this->statusInfos->contains($statusInfos)) {
            $this->statusInfos[] = $statusInfos;
            $statusInfos->setStatus($this);
        }

        return $this;
    }

    public function removestatusInfos(StatusInfo $statusInfos): self
    {
        if ($this->statusInfos->contains($statusInfos)) {
            $this->statusInfos->removeElement($statusInfos);
            // set the owning side to null (unless already changed)
            if ($statusInfos->getStatus() === $this) {
                $statusInfos->setStatus(null);
            }
        }

        return $this;
    }
}
