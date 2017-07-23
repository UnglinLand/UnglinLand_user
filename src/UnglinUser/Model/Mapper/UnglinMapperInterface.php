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

/**
 * Unglin mapper interface
 *
 * This interface define the base Unglin mapper methods
 *
 * @category Mapper
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
interface UnglinMapperInterface
{
    /**
     * Persist
     *
     * This method persist an instance.
     *
     * @param mixed $instance The instance to persist
     *
     * @return void
     */
    public function persist($instance) : void ;

    /**
     * Save
     *
     * This method save an instance.
     *
     * @param miced $instance The instance to save
     *
     * @return void
     */
    public function save($instance) : void ;

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
    public function findOneById($identifyer);

    /**
     * Delete
     *
     * This method delete an instance.
     *
     * @param mixed $instance The instance to delete
     *
     * @return void
     */
    public function delete($instance) : void ;
}
