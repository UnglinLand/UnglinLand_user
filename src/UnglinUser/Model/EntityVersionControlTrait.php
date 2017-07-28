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
 * Entity Version control trait
 *
 * This trait is used to manage version control of the entities
 *
 * @category Entity
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
trait EntityVersionControlTrait
{
    /**
     * Reference
     *
     * This property store the identifyer reference of the entity
     *
     * @var mixed
     */
    private $reference;

    /**
     * Creation date
     *
     * This property store the creation date of the entity
     *
     * @var \DateTime
     */
    private $creationDate;

    /**
     * Deleted
     *
     * This property store the deletion state of the entity
     *
     * @var bool
     */
    private $deleted;

    /**
     * Set reference
     *
     * This method allow to set the identifyer reference of the entity
     *
     * @param mixed $reference The entity identifyer reference
     *
     * @return $this
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Set deleted
     *
     * This method allow to set the deletion state of the entity
     *
     * @param bool $deleted The deletion state of the entity
     *
     * @return $this
     */
    public function setDeleted(bool $deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * Get reference
     *
     * Return the identifyer reference of the entity
     *
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Get creation date
     *
     * This method return the creation date of the entity
     *
     * @return \DateTime
     */
    public function getCreationDate() : \DateTime
    {
        return $this->creationDate;
    }

    /**
     * Is deleted
     *
     * This method return the deletion state of the entity
     *
     * @return bool
     */
    public function isDeleted() : bool
    {
        return $this->deleted;
    }
}
