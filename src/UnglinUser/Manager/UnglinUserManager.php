<?php
/**
 * This file is part of UnglinLand_User
 *
 * As each files provides by the CSCFA, this file is licensed
 * under the MIT license.
 *
 * PHP version 7.2
 *
 * @category Manager
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
namespace UnglinLand\UserModule\Manager;

use UnglinLand\UserModule\Manager\UnglinManagerInterface;
use UnglinLand\UserModule\Model\UnglinUser;
use UnglinLand\UserModule\Model\Mapper\UnglinUserMapperInterface;
use Psr\Log\LoggerInterface;

/**
 * UnglinUserManager
 *
 * This class is used to manage the UnglinUser instances
 *
 * @category Manager
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinUserManager implements UnglinManagerInterface
{
    /**
     * User mapper
     *
     * This property store the user mapper
     *
     * @var UnglinUserMapperInterface
     */
    private $userMapper;

    /**
     * Logger
     *
     * This property store the application logger
     *
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Construct
     *
     * The default UnglinUserManager constructor.
     *
     * @param UnglinUserMapperInterface $userMapper The UnglinUser mapper
     * @param LoggerInterface           $logger     The application logger
     *
     * @return void
     */
    public function __construct(UnglinUserMapperInterface $userMapper, LoggerInterface $logger)
    {
        $this->userMapper = $userMapper;
        $this->logger = $logger;
    }

    /**
     * Create user
     *
     * This method create a new instance of user and return it.
     *
     * @return UnglinUser
     */
    public function createInstance()
    {
        $this->logger->debug('Creating empty user');

        return new UnglinUser();
    }

    /**
     * Save user
     *
     * This method save a user instance.
     *
     * @param UnglinUser $user The user to save
     *
     * @return void
     */
    public function save($user) : void
    {
        if (!$user instanceof UnglinUser) {
            throw new \TypeError(
                sprintf(
                    'Expected %s. %s given',
                    UnglinUser::class,
                    is_object($user) ? get_class($user) : gettype($user)
                )
            );
        }

        $this->logger->debug(sprintf('Saving user with identifyer "%s"', $user->getId()));

        $this->userMapper->persist($user);
        $this->userMapper->save($user);

        return;
    }

    /**
     * Load by id
     *
     * This method load an user instance accordingly with it identifyer
     *
     * @param mixed $identifyer The user identifyer
     *
     * @return UnglinUser|NULL
     */
    public function loadById($identifyer)
    {
        $this->logger->debug(sprintf('Loading user with identifyer "%s"', $identifyer));

        $user = $this->userMapper->findOneById($identifyer);

        if (!$user) {
            $this->logger->info(sprintf('Unable to load user with identifyer "%s"', $identifyer));
            return null;
        }

        return $user;
    }

    /**
     * Delete
     *
     * This method remove a managed instance from the storage
     *
     * @param mixed $instance The instance to remove
     *
     * @return void
     */
    public function delete($instance) : void
    {
        $identifyer = $instance instanceof UnglinUser ? $instance->getId() : '';

        $this->logger->debug(sprintf('Deleting user with identifyer "%s"', $identifyer));

        $this->userMapper->delete($instance);
        return;
    }
}
