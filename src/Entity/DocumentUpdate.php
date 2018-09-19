<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentUpdateRepository")
 */
class DocumentUpdate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Document", inversedBy="updates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $relatedDocument;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $versionNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $hash;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="writtenDocumentUpdates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="approvedDocumentUpdates")
     */
    private $approbator;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Signature", cascade={"persist", "remove"})
     */
    private $authorSignature;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Signature", cascade={"persist", "remove"})
     */
    private $approbatorSignature;

    /**
     * @ORM\Column(type="integer")
     */
    private $publicationStatus;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRelatedDocument(): ?Document
    {
        return $this->relatedDocument;
    }

    public function setRelatedDocument(?Document $relatedDocument): self
    {
        $this->relatedDocument = $relatedDocument;

        return $this;
    }

    public function getVersionNumber(): ?string
    {
        return $this->versionNumber;
    }

    public function setVersionNumber(string $versionNumber): self
    {
        $this->versionNumber = $versionNumber;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
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

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getAuthor(): ?Member
    {
        return $this->author;
    }

    public function setAuthor(?Member $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getApprobator(): ?Member
    {
        return $this->approbator;
    }

    public function setApprobator(?Member $approbator): self
    {
        $this->approbator = $approbator;

        return $this;
    }

    public function getAuthorSignature(): ?Signature
    {
        return $this->authorSignature;
    }

    public function setAuthorSignature(?Signature $authorSignature): self
    {
        $this->authorSignature = $authorSignature;

        return $this;
    }

    public function getApprobatorSignature(): ?Signature
    {
        return $this->approbatorSignature;
    }

    public function setApprobatorSignature(?Signature $approbatorSignature): self
    {
        $this->approbatorSignature = $approbatorSignature;

        return $this;
    }

    public function getPublicationStatus(): ?int
    {
        return $this->publicationStatus;
    }

    public function setPublicationStatus(int $publicationStatus): self
    {
        $this->publicationStatus = $publicationStatus;

        return $this;
    }
}
