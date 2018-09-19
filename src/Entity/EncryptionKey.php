<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EncryptionKeyRepository")
 */
class EncryptionKey
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shortPublicID;

    /**
     * @ORM\Column(type="string", length=4096)
     */
    private $publicKey;

    /**
     * @ORM\Column(type="string", length=4096)
     */
    private $encryptedPrivateKey;

    /**
     * @ORM\Column(type="datetime")
     */
    private $generationDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $recovationDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="encryptionKey")
     * @ORM\JoinColumn(nullable=false)
     */
    private $member;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortPublicID(): ?string
    {
        return $this->shortPublicID;
    }

    public function setShortPublicID(string $shortPublicID): self
    {
        $this->shortPublicID = $shortPublicID;

        return $this;
    }

    public function getPublicKey(): ?string
    {
        return $this->publicKey;
    }

    public function setPublicKey(string $publicKey): self
    {
        $this->publicKey = $publicKey;

        return $this;
    }

    public function getEncryptedPrivateKey(): ?string
    {
        return $this->encryptedPrivateKey;
    }

    public function setEncryptedPrivateKey(string $encryptedPrivateKey): self
    {
        $this->encryptedPrivateKey = $encryptedPrivateKey;

        return $this;
    }

    public function getGenerationDate(): ?\DateTimeInterface
    {
        return $this->generationDate;
    }

    public function setGenerationDate(\DateTimeInterface $generationDate): self
    {
        $this->generationDate = $generationDate;

        return $this;
    }

    public function getRecovationDate(): ?\DateTimeInterface
    {
        return $this->recovationDate;
    }

    public function setRecovationDate(?\DateTimeInterface $recovationDate): self
    {
        $this->recovationDate = $recovationDate;

        return $this;
    }

    public function getMember(): ?Member
    {
        return $this->member;
    }

    public function setMember(?Member $member): self
    {
        $this->member = $member;

        return $this;
    }
}
