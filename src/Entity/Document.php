<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentRepository")
 */
class Document
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="documents")
     */
    private $project;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="documents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="integer")
     */
    private $rights;

    /**
     * @ORM\Column(type="string", length=256, nullable=true)
     */
    private $hash;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="writtenDocuments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="approvedDocuments")
     */
    private $approbator;

    /**
     * @ORM\Column(type="boolean")
     */
    private $public;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Signature", cascade={"persist", "remove"})
     */
    private $approbatorSignature;

    /**
     * @ORM\Column(type="integer")
     */
    private $publicationStatus;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Signature", cascade={"persist", "remove"})
     */
    private $authorSignature;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DocumentUpdate", mappedBy="relatedDocument")
     */
    private $updates;

    public function __construct()
    {
        $this->updates = new ArrayCollection();
    }

    public function getId(): ?int
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

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
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

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getRights(): ?int
    {
        return $this->rights;
    }

    public function setRights(int $rights): self
    {
        $this->rights = $rights;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(?string $hash): self
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

    public function getPublic(): ?bool
    {
        return $this->public;
    }

    public function setPublic(bool $public): self
    {
        $this->public = $public;

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

    public function getAuthorSignature(): ?Signature
    {
        return $this->authorSignature;
    }

    public function setAuthorSignature(?Signature $authorSignature): self
    {
        $this->authorSignature = $authorSignature;

        return $this;
    }

    /**
     * @return Collection|DocumentUpdate[]
     */
    public function getUpdates(): Collection
    {
        return $this->updates;
    }

    public function addUpdate(DocumentUpdate $update): self
    {
        if (!$this->updates->contains($update)) {
            $this->updates[] = $update;
            $update->setRelatedDocument($this);
        }

        return $this;
    }

    public function removeUpdate(DocumentUpdate $update): self
    {
        if ($this->updates->contains($update)) {
            $this->updates->removeElement($update);
            // set the owning side to null (unless already changed)
            if ($update->getRelatedDocument() === $this) {
                $update->setRelatedDocument(null);
            }
        }

        return $this;
    }
}
