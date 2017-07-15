<?php
/**
 * This file is part of UnglinLand_User
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Mapper
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Model\Mapper;

use UnglinLand\UserModule\Model\UnglinUser;

/**
 * UnglinUserMapperInterface
 *
 * This interface define the UnglinUser mapper basic methods
 *
 * @category Mapper
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface UnglinUserMapperInterface
{
    /**
     * Persist
     *
     * This method persist an user instance.
     *
     * @param UnglinUser $user The user to persist
     *
     * @return void
     */
    public function persist(UnglinUser $user) : void ;

    /**
     * Save
     *
     * This method save an user instance.
     *
     * @param UnglinUser $user The user to save
     *
     * @return void
     */
    public function save(UnglinUser $user) : void ;

    /**
     * Find one by id
     *
     * This method return an user instance, accordingly with it identifyer. Can return null if no
     * one user match the given identifyer.
     *
     * @param mixed $identifyer The user identifyer
     *
     * @return UnglinUser|NULL
     */
    public function findOneById($identifyer) : ?UnglinUser ;
}
