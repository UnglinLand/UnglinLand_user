<?php
/**
 * This file is part of UnglinLand_User
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Role
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Model;

/**
 * Entity Version control interface
 *
 * This interface is used to define version control methods
 *
 * @category Entity
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface EntityVersionControlInterface
{
    /**
     * Set reference
     *
     * This method allow to set the identifyer reference of the entity
     *
     * @param mixed $reference The entity identifyer reference
     *
     * @return $this
     */
    public function setReference($reference);

    /**
     * Set deleted
     *
     * This method allow to set the deletion state of the entity
     *
     * @param bool $deleted The deletion state of the entity
     *
     * @return $this
     */
    public function setDeleted(bool $deleted);

    /**
     * Get reference
     *
     * Return the identifyer reference of the entity
     *
     * @return mixed
     */
    public function getReference();

    /**
     * Get creation date
     *
     * This method return the creation date of the entity
     *
     * @return \DateTime
     */
    public function getCreationDate() : \DateTime;

    /**
     * Is deleted
     *
     * This method return the deletion state of the entity
     *
     * @return bool
     */
    public function isDeleted() : bool;
}
