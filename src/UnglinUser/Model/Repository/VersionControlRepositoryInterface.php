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

/**
 * Version control repository interface
 *
 * This interface define the main implementaiotn of the version control repository
 *
 * @category Model
 * @package  UnglinLand-user
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface VersionControlRepositoryInterface
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
    public function findByReference($reference, bool $deleted = false);

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
    public function findOneByReference($reference, bool $deleted = false);
}
