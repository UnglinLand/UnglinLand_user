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
 * Unglin role
 *
 * This class is used as model for database side managed user roles
 *
 * @category Role
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinRole implements EntityVersionControlInterface
{
    use EntityVersionControlTrait;

    /**
     * Id
     *
     * This property store the role identifyer
     *
     * @var mixed
     */
    private $id;

    /**
     * Label
     *
     * This property store the role label
     *
     * @var string
     */
    private $label;

    /**
     * Get id
     *
     * This method return the role id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get label
     *
     * This method return the role label
     *
     * @return string
     */
    public function getLabel() : string
    {
        return $this->label;
    }

    /**
     * Set label
     *
     * This method set the role label
     *
     * @param string $label The new role label
     *
     * @return UnglinRole
     */
    public function setLabel(string $label) : UnglinRole
    {
        $this->label = $label;
        return $this;
    }
}
