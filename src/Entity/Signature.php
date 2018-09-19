<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SignatureRepository")
 */
class Signature
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=8192)
     */
    private $plainTextSignature;

    /**
     * @ORM\Column(type="string", length=8192, nullable=true)
     */
    private $originalData;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EncryptionKey")
     * @ORM\JoinColumn(nullable=false)
     */
    private $encryptionKey;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPlainTextSignature(): ?string
    {
        return $this->plainTextSignature;
    }

    public function setPlainTextSignature(string $plainTextSignature): self
    {
        $this->plainTextSignature = $plainTextSignature;

        return $this;
    }

    public function getOriginalData(): ?string
    {
        return $this->originalData;
    }

    public function setOriginalData(?string $originalData): self
    {
        $this->originalData = $originalData;

        return $this;
    }

    public function getEncryptionKey(): ?EncryptionKey
    {
        return $this->encryptionKey;
    }

    public function setEncryptionKey(?EncryptionKey $encryptionKey): self
    {
        $this->encryptionKey = $encryptionKey;

        return $this;
    }
}
