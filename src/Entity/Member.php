<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MemberRepository")
 */
class Member
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
    private $surname;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $persoMail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $proMail;

    /**
     * @ORM\Column(type="string", length=13)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registrationDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     */
    private $groupID;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Project", mappedBy="members")
     */
    private $projects;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project", mappedBy="admin")
     */
    private $adminProjects;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EncryptionKey", mappedBy="member")
     */
    private $encryptionKey;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Subscription", mappedBy="member")
     */
    private $subscriptions;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Signature", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $registrationSignature;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Document", mappedBy="author")
     */
    private $writtenDocuments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Document", mappedBy="approbator")
     */
    private $approvedDocuments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DocumentUpdate", mappedBy="author")
     */
    private $writtenDocumentUpdates;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DocumentUpdate", mappedBy="approbator")
     */
    private $approvedDocumentUpdates;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vote", mappedBy="creator")
     */
    private $votes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VoteEmargement", mappedBy="member")
     */
    private $emargements;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
        $this->adminProjects = new ArrayCollection();
        $this->encryptionKey = new ArrayCollection();
        $this->subscriptions = new ArrayCollection();
        $this->writtenDocuments = new ArrayCollection();
        $this->approvedDocuments = new ArrayCollection();
        $this->writtenDocumentUpdates = new ArrayCollection();
        $this->approvedDocumentUpdates = new ArrayCollection();
        $this->votes = new ArrayCollection();
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

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getPersoMail(): ?string
    {
        return $this->persoMail;
    }

    public function setPersoMail(string $persoMail): self
    {
        $this->persoMail = $persoMail;

        return $this;
    }

    public function getProMail(): ?string
    {
        return $this->proMail;
    }

    public function setProMail(string $proMail): self
    {
        $this->proMail = $proMail;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(\DateTimeInterface $registrationDate): self
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getGroupID(): ?int
    {
        return $this->groupID;
    }

    public function setGroupID(int $groupID): self
    {
        $this->groupID = $groupID;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->addMember($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
            $project->removeMember($this);
        }

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getAdminProjects(): Collection
    {
        return $this->adminProjects;
    }

    public function addAdminProject(Project $adminProject): self
    {
        if (!$this->adminProjects->contains($adminProject)) {
            $this->adminProjects[] = $adminProject;
            $adminProject->setAdmin($this);
        }

        return $this;
    }

    public function removeAdminProject(Project $adminProject): self
    {
        if ($this->adminProjects->contains($adminProject)) {
            $this->adminProjects->removeElement($adminProject);
            // set the owning side to null (unless already changed)
            if ($adminProject->getAdmin() === $this) {
                $adminProject->setAdmin(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EncryptionKey[]
     */
    public function getEncryptionKey(): Collection
    {
        return $this->encryptionKey;
    }

    public function addEncryptionKey(EncryptionKey $encryptionKey): self
    {
        if (!$this->encryptionKey->contains($encryptionKey)) {
            $this->encryptionKey[] = $encryptionKey;
            $encryptionKey->setMember($this);
        }

        return $this;
    }

    public function removeEncryptionKey(EncryptionKey $encryptionKey): self
    {
        if ($this->encryptionKey->contains($encryptionKey)) {
            $this->encryptionKey->removeElement($encryptionKey);
            // set the owning side to null (unless already changed)
            if ($encryptionKey->getMember() === $this) {
                $encryptionKey->setMember(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Subscription[]
     */
    public function getSubscriptions(): Collection
    {
        return $this->subscriptions;
    }

    public function addSubscription(Subscription $subscription): self
    {
        if (!$this->subscriptions->contains($subscription)) {
            $this->subscriptions[] = $subscription;
            $subscription->setMember($this);
        }

        return $this;
    }

    public function removeSubscription(Subscription $subscription): self
    {
        if ($this->subscriptions->contains($subscription)) {
            $this->subscriptions->removeElement($subscription);
            // set the owning side to null (unless already changed)
            if ($subscription->getMember() === $this) {
                $subscription->setMember(null);
            }
        }

        return $this;
    }

    public function getRegistrationSignature(): ?Signature
    {
        return $this->registrationSignature;
    }

    public function setRegistrationSignature(Signature $registrationSignature): self
    {
        $this->registrationSignature = $registrationSignature;

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getWrittenDocuments(): Collection
    {
        return $this->writtenDocuments;
    }

    public function addWrittenDocument(Document $writtenDocument): self
    {
        if (!$this->writtenDocuments->contains($writtenDocument)) {
            $this->writtenDocuments[] = $writtenDocument;
            $writtenDocument->setAuthor($this);
        }

        return $this;
    }

    public function removeWrittenDocument(Document $writtenDocument): self
    {
        if ($this->writtenDocuments->contains($writtenDocument)) {
            $this->writtenDocuments->removeElement($writtenDocument);
            // set the owning side to null (unless already changed)
            if ($writtenDocument->getAuthor() === $this) {
                $writtenDocument->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getApprovedDocuments(): Collection
    {
        return $this->approvedDocuments;
    }

    public function addApprovedDocument(Document $approvedDocument): self
    {
        if (!$this->approvedDocuments->contains($approvedDocument)) {
            $this->approvedDocuments[] = $approvedDocument;
            $approvedDocument->setApprobator($this);
        }

        return $this;
    }

    public function removeApprovedDocument(Document $approvedDocument): self
    {
        if ($this->approvedDocuments->contains($approvedDocument)) {
            $this->approvedDocuments->removeElement($approvedDocument);
            // set the owning side to null (unless already changed)
            if ($approvedDocument->getApprobator() === $this) {
                $approvedDocument->setApprobator(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DocumentUpdate[]
     */
    public function getWrittenDocumentUpdates(): Collection
    {
        return $this->writtenDocumentUpdates;
    }

    public function addWrittenDocumentUpdate(DocumentUpdate $writtenDocumentUpdate): self
    {
        if (!$this->writtenDocumentUpdates->contains($writtenDocumentUpdate)) {
            $this->writtenDocumentUpdates[] = $writtenDocumentUpdate;
            $writtenDocumentUpdate->setAuthor($this);
        }

        return $this;
    }

    public function removeWrittenDocumentUpdate(DocumentUpdate $writtenDocumentUpdate): self
    {
        if ($this->writtenDocumentUpdates->contains($writtenDocumentUpdate)) {
            $this->writtenDocumentUpdates->removeElement($writtenDocumentUpdate);
            // set the owning side to null (unless already changed)
            if ($writtenDocumentUpdate->getAuthor() === $this) {
                $writtenDocumentUpdate->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DocumentUpdate[]
     */
    public function getApprovedDocumentUpdates(): Collection
    {
        return $this->approvedDocumentUpdates;
    }

    public function addApprovedDocumentUpdate(DocumentUpdate $approvedDocumentUpdate): self
    {
        if (!$this->approvedDocumentUpdates->contains($approvedDocumentUpdate)) {
            $this->approvedDocumentUpdates[] = $approvedDocumentUpdate;
            $approvedDocumentUpdate->setApprobator($this);
        }

        return $this;
    }

    public function removeApprovedDocumentUpdate(DocumentUpdate $approvedDocumentUpdate): self
    {
        if ($this->approvedDocumentUpdates->contains($approvedDocumentUpdate)) {
            $this->approvedDocumentUpdates->removeElement($approvedDocumentUpdate);
            // set the owning side to null (unless already changed)
            if ($approvedDocumentUpdate->getApprobator() === $this) {
                $approvedDocumentUpdate->setApprobator(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vote[]
     */
    public function getVotes(): Collection
    {
        return $this->votes;
    }

    public function addVote(Vote $vote): self
    {
        if (!$this->votes->contains($vote)) {
            $this->votes[] = $vote;
            $vote->setCreator($this);
        }

        return $this;
    }

    public function removeVote(Vote $vote): self
    {
        if ($this->votes->contains($vote)) {
            $this->votes->removeElement($vote);
            // set the owning side to null (unless already changed)
            if ($vote->getCreator() === $this) {
                $vote->setCreator(null);
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
            $emargement->setMember($this);
        }

        return $this;
    }

    public function removeEmargement(VoteEmargement $emargement): self
    {
        if ($this->emargements->contains($emargement)) {
            $this->emargements->removeElement($emargement);
            // set the owning side to null (unless already changed)
            if ($emargement->getMember() === $this) {
                $emargement->setMember(null);
            }
        }

        return $this;
    }
}
