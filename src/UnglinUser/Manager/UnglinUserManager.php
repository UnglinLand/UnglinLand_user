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

use UnglinLand\UserModule\Manager\UnglinUserManagerInterface;
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
class UnglinUserManager implements UnglinUserManagerInterface
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
    public function createUser() : UnglinUser
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
    public function saveUser(UnglinUser $user) : void
    {
        $this->logger->debug(sprintf('Saving user with identifyer "%s"', $user->getId()));

        $this->userMapper->persist($user);
        $this->userMapper->save($user);

        return;
    }

    /**
     * Load user
     *
     * This method load an user instance accordingly with it identifyer
     *
     * @param mixed $identifyer The user identifyer
     *
     * @return UnglinUser|NULL
     */
    public function loadUser($identifyer) : ?UnglinUser
    {
        $this->logger->debug(sprintf('Loading user with identifyer "%s"', $identifyer));

        $user = $this->userMapper->findOneByIdentifyer($identifyer);

        if (!$user) {
            $this->logger->info(sprintf('Unable to load user with identifyer "%s"', $identifyer));
            return null;
        }

        return $user;
    }
}
