<?php

/* For licensing terms, see /license.txt */

namespace Chamilo\CourseBundle\Repository;

use Chamilo\CoreBundle\Repository\ResourceNodeRepository;
use Chamilo\CoreBundle\ToolChain;
use Chamilo\CourseBundle\Entity\CThematicAdvance;
use Cocur\Slugify\SlugifyInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

final class CThematicAdvanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CThematicAdvance::class);
    }

    public function setAuthorizationChecker(AuthorizationCheckerInterface $authorizationChecker): self
    {
        $this->authorizationChecker = $authorizationChecker;

        return $this;
    }

    public function setRouter(RouterInterface $router): self
    {
        $this->router = $router;

        return $this;
    }

    public function setSlugify(SlugifyInterface $slugify): self
    {
        $this->slugify = $slugify;

        return $this;
    }

    public function setToolChain(ToolChain $toolChain): self
    {
        $this->toolChain = $toolChain;

        return $this;
    }

    public function setResourceNodeRepository(ResourceNodeRepository $resourceNodeRepository): self
    {
        $this->resourceNodeRepository = $resourceNodeRepository;

        return $this;
    }

    public function delete($resource)
    {
        $this->getEntityManager()->remove($resource);
        $this->getEntityManager()->flush();
    }
}
