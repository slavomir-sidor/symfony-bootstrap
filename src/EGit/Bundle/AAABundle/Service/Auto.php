<?php
/**
 * EGit AAABundle Service Auto
 * 
 * @author Slavomir Kuzma <slavomir.kuzma@gmail.com>
 */
namespace EGit\Bundle\AAABundle\Service;

use Doctrine\ORM\EntityManager;

class Auto
{

    /**
     * EGit AAABundle Service Auto
     *
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * EGit AAABundle Service Auto Constructor
     *
     * @param EntityManager $entityManager
     *            Doctrine ORM EntityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->setEntityManager($entityManager);
    }

    /**
     * Gets EGit AAABundle Service Auto Detail
     *
     * @param int $id            
     * @return object|NULL
     */
    public function getDetail($id)
    {
        return $this->getEntityManager()
            ->getRepository('EGitAAABundle:Car')
            ->find($id);
    }

    public function getList($limit, $offset)
    {
        return $this->getEntityManager()
            ->getRepository('EGitAAABundle:Car')
            ->findBy(array(), array(), $limit, $offset);
    }

    /**
     * Gets EGit AAABundle Service Auto Entity Manager
     *
     * @return EntityManager EGit AAABundle Service Auto Entity Manager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * Sets EGit AAABundle Service Auto Entity Manager
     *
     * @param EntityManager $entityManager
     *            EGit AAABundle Service Auto Entity Manager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }
}