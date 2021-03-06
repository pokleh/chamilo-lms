<?php

/* For licensing terms, see /license.txt */

namespace Chamilo\CourseBundle\Entity;

use Chamilo\CoreBundle\Entity\AbstractResource;
use Chamilo\CoreBundle\Entity\ResourceInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(
 *  name="c_student_publication_correction"
 * )
 * @ORM\Entity()
 */
class CStudentPublicationCorrection extends AbstractResource implements ResourceInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    protected string $title;

    public function __construct()
    {
    }

    public function __toString(): string
    {
        return (string) $this->getTitle();
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return CStudentPublication
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Resource identifier.
     */
    public function getResourceIdentifier(): int
    {
        return $this->getId();
    }

    public function getResourceName(): string
    {
        return $this->getTitle();
    }

    public function setResourceName(string $name): self
    {
        return $this->setTitle($name);
    }
}
