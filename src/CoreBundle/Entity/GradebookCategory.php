<?php

/* For licensing terms, see /license.txt */

namespace Chamilo\CoreBundle\Entity;

use Chamilo\CoreBundle\Traits\CourseTrait;
use Chamilo\CoreBundle\Traits\UserTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="gradebook_category",
 *  indexes={
 *  }))
 * @ORM\Entity
 */
class GradebookCategory
{
    use UserTrait;
    use CourseTrait;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @Assert\NotBlank
     *
     * @ORM\Column(name="name", type="text", nullable=false)
     */
    protected string $name;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected ?string $description;

    /**
     * @ORM\ManyToOne(targetEntity="Chamilo\CoreBundle\Entity\User", inversedBy="gradeBookCategories")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected User $user;

    /**
     * @ORM\ManyToOne(targetEntity="Chamilo\CoreBundle\Entity\Course", inversedBy="gradebookCategories")
     * @ORM\JoinColumn(name="c_id", referencedColumnName="id")
     */
    protected Course $course;

    /**
     * @ORM\ManyToOne(targetEntity="Chamilo\CoreBundle\Entity\GradebookCategory")
     * @ORM\JoinColumn(name="parent_id",referencedColumnName="id")
     */
    protected ?GradebookCategory $parent;

    /**
     * @ORM\ManyToOne(targetEntity="Chamilo\CoreBundle\Entity\Session")
     * @ORM\JoinColumn(name="session_id", referencedColumnName="id")
     */
    protected ?Session $session;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", precision=10, scale=0, nullable=false)
     */
    protected $weight;

    /**
     * @var bool
     *
     * @ORM\Column(name="visible", type="boolean", nullable=false)
     */
    protected $visible;

    /**
     * @var int
     *
     * @ORM\Column(name="certif_min_score", type="integer", nullable=true)
     */
    protected $certifMinScore;

    /**
     * @var int
     *
     * @ORM\Column(name="document_id", type="integer", nullable=true)
     */
    protected $documentId;

    /**
     * @var int
     *
     * @ORM\Column(name="locked", type="integer", nullable=false)
     */
    protected $locked;

    /**
     * @var bool
     *
     * @ORM\Column(name="default_lowest_eval_exclude", type="boolean", nullable=true)
     */
    protected $defaultLowestEvalExclude;

    /**
     * @var bool
     *
     * @ORM\Column(name="generate_certificates", type="boolean", nullable=false)
     */
    protected $generateCertificates;

    /**
     * @var int
     *
     * @ORM\Column(name="grade_model_id", type="integer", nullable=true)
     */
    protected $gradeModelId;

    /**
     * @var bool
     *
     * @ORM\Column(
     *      name="is_requirement",
     *      type="boolean",
     *      nullable=false,
     *      options={"default": 0 }
     * )
     */
    protected $isRequirement;

    /**
     * @var string
     *
     * @ORM\Column(name="depends", type="text", nullable=true)
     */
    protected $depends;

    /**
     * @var int
     *
     * @ORM\Column(name="minimum_to_validate", type="integer", nullable=true)
     */
    protected $minimumToValidate;

    /**
     * @var int
     *
     * @ORM\Column(name="gradebooks_to_validate_in_dependence", type="integer", nullable=true)
     */
    protected $gradeBooksToValidateInDependence;

    /**
     * @var ArrayCollection|GradebookComment[]
     *
     * @ORM\OneToMany(targetEntity="Chamilo\CoreBundle\Entity\GradebookComment", mappedBy="gradebook")
     */
    protected $comments;

    public function __construct()
    {
        $this->description = '';
        $this->comments = new ArrayCollection();
        $this->locked = 0;
        $this->generateCertificates = false;
        $this->isRequirement = false;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return GradebookCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set weight.
     *
     * @param float $weight
     */
    public function setWeight($weight): self
    {
        $this->weight = (float) $weight;

        return $this;
    }

    /**
     * Get weight.
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set visible.
     *
     * @param bool $visible
     *
     * @return GradebookCategory
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible.
     *
     * @return bool
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set certifMinScore.
     *
     * @param int $certifMinScore
     *
     * @return GradebookCategory
     */
    public function setCertifMinScore($certifMinScore)
    {
        $this->certifMinScore = $certifMinScore;

        return $this;
    }

    /**
     * Get certifMinScore.
     *
     * @return int
     */
    public function getCertifMinScore()
    {
        return $this->certifMinScore;
    }

    /**
     * Set sessionId.
     *
     * @param int $sessionId
     *
     * @return GradebookCategory
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;

        return $this;
    }

    /**
     * Get sessionId.
     *
     * @return int
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * Set documentId.
     *
     * @param int $documentId
     *
     * @return GradebookCategory
     */
    public function setDocumentId($documentId)
    {
        $this->documentId = $documentId;

        return $this;
    }

    /**
     * Get documentId.
     *
     * @return int
     */
    public function getDocumentId()
    {
        return $this->documentId;
    }

    /**
     * Set locked.
     *
     * @param int $locked
     *
     * @return GradebookCategory
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked.
     *
     * @return int
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set defaultLowestEvalExclude.
     *
     * @param bool $defaultLowestEvalExclude
     *
     * @return GradebookCategory
     */
    public function setDefaultLowestEvalExclude($defaultLowestEvalExclude)
    {
        $this->defaultLowestEvalExclude = $defaultLowestEvalExclude;

        return $this;
    }

    /**
     * Get defaultLowestEvalExclude.
     *
     * @return bool
     */
    public function getDefaultLowestEvalExclude()
    {
        return $this->defaultLowestEvalExclude;
    }

    /**
     * Set generateCertificates.
     *
     * @param bool $generateCertificates
     *
     * @return GradebookCategory
     */
    public function setGenerateCertificates($generateCertificates)
    {
        $this->generateCertificates = $generateCertificates;

        return $this;
    }

    /**
     * Get generateCertificates.
     *
     * @return bool
     */
    public function getGenerateCertificates()
    {
        return $this->generateCertificates;
    }

    /**
     * Set gradeModelId.
     *
     * @param int $gradeModelId
     *
     * @return GradebookCategory
     */
    public function setGradeModelId($gradeModelId)
    {
        $this->gradeModelId = $gradeModelId;

        return $this;
    }

    /**
     * Get gradeModelId.
     *
     * @return int
     */
    public function getGradeModelId()
    {
        return $this->gradeModelId;
    }

    /**
     * Set isRequirement.
     *
     * @param bool $isRequirement
     *
     * @return GradebookCategory
     */
    public function setIsRequirement($isRequirement)
    {
        $this->isRequirement = $isRequirement;

        return $this;
    }

    public function getCourse(): Course
    {
        return $this->course;
    }

    public function setCourse(Course $course): self
    {
        $this->course = $course;

        return $this;
    }

    public function getParent(): ?GradebookCategory
    {
        return $this->parent;
    }

    /**
     * @param GradebookCategory|null $parent
     *
     * @return GradebookCategory
     */
    public function setParent(?GradebookCategory $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): self
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get isRequirement.
     *
     * @return bool
     */
    public function getIsRequirement()
    {
        return $this->isRequirement;
    }

    public function getGradeBooksToValidateInDependence(): int
    {
        return $this->gradeBooksToValidateInDependence;
    }

    public function setGradeBooksToValidateInDependence(int $value): self
    {
        $this->gradeBooksToValidateInDependence = $value;

        return $this;
    }
}
