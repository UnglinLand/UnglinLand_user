<?php
/**
 * This file is part of UnglinLand_user
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.1
 *
 * @category User
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Model;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * UnglinUser
 *
 * This class is used to store and manage an UnglinLand user
 *
 * @category User
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinUser implements UserInterface, EntityVersionControlInterface
{
    use EntityVersionControlTrait;

    /**
     * Id
     *
     * This property store the user identifyer.
     *
     * @var mixed
     */
    private $id;

    /**
     * Password
     *
     * This property store the user password.
     *
     * @var string
     */
    private $password;

    /**
     * Salt
     *
     * This property store the user password salt.
     *
     * @var unknown
     */
    private $salt;

    /**
     * Roles
     *
     * This property store the user roles.
     *
     * @var array
     */
    private $roles;

    /**
     * Username
     *
     * This property store the user name.
     *
     * @var string
     */
    private $username;

    /**
     * Get id
     *
     * This method return the user identifyer
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     *
     * @return void
     */
    public function eraseCredentials()
    {
        $this->password = null;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->username;
    }
}
