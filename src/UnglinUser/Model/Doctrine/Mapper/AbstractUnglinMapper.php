<?php
/**
 * This file is part of UserSymfonyBridge
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Mapper
 * @package  UserSymfonyBridge
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Model\Doctrine\Mapper;

use Doctrine\Common\Persistence\ObjectManager;
use UnglinLand\UserModule\Model\Repository\UnglinRepositoryInterface;
use UnglinLand\UserModule\Model\Mapper\UnglinMapperInterface;

/**
 * Unglin role mapper
 *
 * This class is used as entity mapper
 *
 * @category Mapper
 * @package  UserSymfonyBridge
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
abstract class AbstractUnglinMapper implements UnglinMapperInterface
{
    /**
     * Manager
     *
     * This property store the manager to persist and save entities
     *
     * @var ObjectManager
     */
    private $manager;

    /**
     * Repository
     *
     * This property store the entity repository to load them
     *
     * @var UnglinRepositoryInterface
     */
    private $repository;

    /**
     * Construct
     *
     * The default UnglinMapper constructor
     *
     * @param ObjectManager             $manager    The entity manager
     * @param UnglinRepositoryInterface $repository The entity repository
     *
     * @return void
     */
    public function __construct(ObjectManager $manager, UnglinRepositoryInterface $repository)
    {
        $this->manager = $manager;
        $this->repository = $repository;
    }

    /**
     * Find one by id
     *
     * This method return an instance, accordingly with it identifyer. Can return null if no
     * one instance match the given identifyer.
     *
     * @param mixed $identifyer The instance identifyer
     *
     * @return mixed|NULL
     */
    public function findOneById($identifyer)
    {
        return $this->repository->findOneById($identifyer);
    }

    /**
     * Save
     *
     * This method save an instance.
     *
     * @param miced $instance The instance to save
     *
     * @return void
     */
    public function save($instance) : void
    {
        $this->manager->flush($instance);
        return;
    }

    /**
     * Persist
     *
     * This method persist an instance.
     *
     * @param mixed $instance The instance to persist
     *
     * @return void
     */
    public function persist($instance) : void
    {
        $this->manager->persist($instance);
        return;
    }

    /**
     * Delete
     *
     * This method delete an instance.
     *
     * @param mixed $instance The instance to delete
     *
     * @return void
     */
    public function delete($instance) : void
    {
        $this->manager->remove($instance);
        $this->save($instance);
        return;
    }
}
