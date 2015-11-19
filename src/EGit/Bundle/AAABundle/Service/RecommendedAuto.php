<?php
/**
 * EGit AAABundle Service Recommended Auto
 * 
 * @author Slavomir Kuzma <slavomir.kuzma@gmail.com>
 */
namespace EGit\Bundle\AAABundle\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\Common\Collections\Criteria;

class RecommendedAuto
{

    /**
     * EGit AAABundle Service Recommended Auto
     *
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * EGit AAABundle Service Recommended Auto Default Order By
     *
     * @var array|null
     */
    protected $defaultOrderBy;

    /**
     * EGit AAABundle Service Recommended Auto Default Limit
     *
     * @var int
     */
    protected $defaultLimit;

    /**
     * EGit AAABundle Service Recommended Auto Order By
     *
     * @var array|null
     */
    protected $orderBy;

    /**
     * EGit AAABundle Service Recommended Auto Limit
     *
     * @var int
     */
    protected $limit;

    /**
     * EGit AAABundle Service Recommended Auto Constructor
     *
     * @param EntityManager $entityManager            
     * @param array|null $defaultOrderBy            
     * @param int $defaultLimit            
     * @param int $defaultOffset            
     */
    public function __construct(EntityManager $entityManager, $defaultOrderBy = null, $defaultLimit = null)
    {
        $this->setEntityManager($entityManager);
        $this->setDefaultOrderBy($defaultOrderBy);
        $this->setDefaultLimit($defaultLimit);
    }

    /**
     * EGit AAABundle Service Recommended Auto Constructor
     *
     * @param Criteria $criteria            
     * @param array|null $orderBy            
     * @param int|null $limit            
     */
    public function getRecomended(Criteria $criteria, $orderBy = null, $limit = null)
    {
        $this->setOrderBy($orderBy);
        $this->setLimit($limit);
        
        $criteria->setMaxResults($this->getLimit());
        $criteria->orderBy($this->getOrderBy());
        
        $car = $this->getEntityManager()->getRepository('EGitAAABundle:Car');
        return $car->matching($criteria);
    }

    /**
     * Gets EGit AAABundle Service Recommended Auto Entity Manager
     *
     * @return EntityManager EGit AAABundle Service Recommended Auto Entity Manager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * Sets EGit AAABundle Service Recommended Auto Entity Manager
     *
     * @param EntityManager $entityManager
     *            EGit AAABundle Service Recommended Auto Entity Manager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     *
     * @return the array|null
     */
    public function getDefaultOrderBy()
    {
        return $this->defaultOrderBy;
    }

    /**
     *
     * @param unknown_type $defaultOrderBy            
     */
    public function setDefaultOrderBy($defaultOrderBy)
    {
        if (null !== $defaultOrderBy) {
            $this->defaultOrderBy = $defaultOrderBy;
        }
        return $this;
    }

    /**
     *
     * @return the int
     */
    public function getDefaultLimit()
    {
        return $this->defaultLimit;
    }

    /**
     *
     * @param
     *            $defaultLimit
     */
    public function setDefaultLimit($defaultLimit)
    {
        $this->defaultLimit = $defaultLimit;
        return $this;
    }

    /**
     *
     * @return the array|null
     */
    public function getOrderBy()
    {
        if (NULL === $this->orderBy) {
            $this->setOrderBy($this->getDefaultOrderBy());
        }
        return $this->orderBy;
    }

    /**
     *
     * @param unknown_type $orderBy            
     */
    public function setOrderBy($orderBy)
    {
        if (null !== $orderBy) {
            $this->orderBy = $orderBy;
        }
        return $this;
    }

    /**
     *
     * @return the int
     */
    public function getLimit()
    {
        if (NULL === $this->limit) {
            $this->setLimit($this->getDefaultLimit());
        }
        return $this->limit;
    }

    /**
     *
     * @param
     *            $limit
     */
    public function setLimit($limit)
    {
        if (NULL !== $limit) {
            $this->limit = $limit;
        }
        return $this;
    }
}