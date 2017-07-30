<?php
/**
 * This file is part of UnglinLand-user
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Model
 * @package  UnglinLand-user
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Model\Repository;

use Doctrine\Common\Persistence\ObjectRepository;
use UnglinLand\UserModule\Model\EntityVersionControlInterface;

/**
 * Version control repository trait
 *
 * This trait is used to manage the base VersionControl repository interface
 *
 * @category Model
 * @package  UnglinLand-user
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait VersionControlRepositoryTrait
{
    /**
     * Find by reference
     *
     * This method return a managed instance set, accordingly with given reference. It return an empty
     * set by default id the referenced instance is deleted. To avoid this comportment, the deleted
     * parameter must be set to true.
     *
     * @param mixed $reference The entity reference
     * @param bool  $deleted   The deletion acceptance of the search
     *
     * @return mixed
     */
    public function findByReference($reference, bool $deleted = false)
    {
        $results = $this->getRepository()->findBy(
            ['reference' => $reference],
            ['createdDate' => 'DESC', 'id' => 'DESC']
        );

        if (!$deleted && isset($results[0]) && $this->isDeleted($results[0])) {
            return [];
        }

        return $results;
    }

    /**
     * Find one by reference
     *
     * This method return a managed instance, accordingly with given reference. It return null
     * by default id the referenced instance is deleted. To avoid this comportment, the deleted
     * parameter must be set to true.
     *
     * @param mixed $reference The entity reference
     * @param bool  $deleted   The deletion acceptance of the search
     *
     * @return mixed
     */
    public function findOneByReference($reference, bool $deleted = false)
    {
        $results = $this->getRepository()->findBy(
            ['reference' => $reference],
            ['createdDate' => 'DESC', 'id' => 'DESC'],
            1
        );

        if (!$deleted && isset($results[0]) && $this->isDeleted($results[0])) {
            return null;
        }

        return isset($results[0]) ? $results[0] : null;
    }

    /**
     * Is deleted
     *
     * Return the deletion entity state
     *
     * @param EntityVersionControlInterface $entity Th enetity to check
     *
     * @return boolean
     */
    public function isDeleted(EntityVersionControlInterface $entity) : bool
    {
        return $entity->isDeleted();
    }

    /**
     * Get repository
     *
     * This method return a repository instance to perform the requests.
     *
     * @return ObjectRepository
     */
    abstract protected function getRepository() : ObjectRepository;
}
