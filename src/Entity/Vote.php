<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoteRepository")
 */
class Vote
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
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="votes")
     */
    private $project;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $rights;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $question;

    /**
     * @ORM\Column(type="boolean")
     */
    private $allowMultipleChoices;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="votes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $creator;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VoteOption", mappedBy="vote")
     */
    private $options;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VoteAnswer", mappedBy="vote")
     */
    private $answers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VoteEmargement", mappedBy="vote")
     */
    private $emargements;


    public function __construct()
    {
        $this->options = new ArrayCollection();
        $this->answers = new ArrayCollection();
        $this->emargements = new ArrayCollection();
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

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getAllowMultipleChoices(): ?bool
    {
        return $this->allowMultipleChoices;
    }

    public function setAllowMultipleChoices(bool $allowMultipleChoices): self
    {
        $this->allowMultipleChoices = $allowMultipleChoices;

        return $this;
    }

    public function getCreator(): ?Member
    {
        return $this->creator;
    }

    public function setCreator(?Member $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * @return Collection|VoteOption[]
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(VoteOption $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->setVote($this);
        }

        return $this;
    }

    public function removeOption(VoteOption $option): self
    {
        if ($this->options->contains($option)) {
            $this->options->removeElement($option);
            // set the owning side to null (unless already changed)
            if ($option->getVote() === $this) {
                $option->setVote(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|VoteAnswer[]
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(VoteAnswer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setVote($this);
        }

        return $this;
    }

    public function removeAnswer(VoteAnswer $answer): self
    {
        if ($this->answers->contains($answer)) {
            $this->answers->removeElement($answer);
            // set the owning side to null (unless already changed)
            if ($answer->getVote() === $this) {
                $answer->setVote(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|VoteEmargement[]
     */
    public function getEmargements(): Collection
    {
        return $this->emargements;
    }

    public function addEmargement(VoteEmargement $emargement): self
    {
        if (!$this->emargements->contains($emargement)) {
            $this->emargements[] = $emargement;
            $emargement->setVote($this);
        }

        return $this;
    }

    public function removeEmargement(VoteEmargement $emargement): self
    {
        if ($this->emargements->contains($emargement)) {
            $this->emargements->removeElement($emargement);
            // set the owning side to null (unless already changed)
            if ($emargement->getVote() === $this) {
                $emargement->setVote(null);
            }
        }

        return $this;
    }

}
