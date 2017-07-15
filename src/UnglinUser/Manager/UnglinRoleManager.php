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
use UnglinLand\UserModule\Model\UnglinRole;
use UnglinLand\UserModule\Model\Mapper\UnglinRoleMapperInterface;
use Psr\Log\LoggerInterface;

/**
 * UnglinRoleManager
 *
 * This class is used to manage the UnglinRole instances
 *
 * @category Manager
 * @package  UnglinLand_User
 * @author   matthieu vallance <matthieu.vallance@cscfa.fr>
 * @license  MIT <https://opensource.org/licenses/MIT>
 * @link     http://cscfa.fr
 */
class UnglinRoleManager implements UnglinManagerInterface
{
    /**
     * Role mapper
     *
     * This property store the role mapper
     *
     * @var UnglinRoleMapperInterface
     */
    private $roleMapper;

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
     * The default UnglinRoleManager constructor.
     *
     * @param UnglinRoleMapperInterface $roleMapper The UnglinRole mapper
     * @param LoggerInterface           $logger     The application logger
     *
     * @return void
     */
    public function __construct(UnglinRoleMapperInterface $roleMapper, LoggerInterface $logger)
    {
        $this->roleMapper = $roleMapper;
        $this->logger = $logger;
    }

    /**
     * Create role
     *
     * This method create a new instance of role and return it.
     *
     * @return UnglinRole
     */
    public function createInstance()
    {
        $this->logger->debug('Creating empty role');

        return new UnglinRole();
    }

    /**
     * Save role
     *
     * This method save a role instance.
     *
     * @param UnglinRole $role The role to save
     *
     * @return void
     */
    public function save($role) : void
    {
        if (!$role instanceof UnglinRole) {
            throw new \TypeError(
                sprintf(
                    'Expected %s. %s given',
                    UnglinRole::class,
                    is_object($role) ? get_class($role) : gettype($role)
                )
            );
        }

        $this->logger->debug(sprintf('Saving role with identifyer "%s"', $role->getId()));

        $this->roleMapper->persist($role);
        $this->roleMapper->save($role);

        return;
    }

    /**
     * Load by id
     *
     * This method load an role instance accordingly with it identifyer
     *
     * @param mixed $identifyer The role identifyer
     *
     * @return UnglinRole|NULL
     */
    public function loadById($identifyer)
    {
        $this->logger->debug(sprintf('Loading role with identifyer "%s"', $identifyer));

        $role = $this->roleMapper->findOneById($identifyer);

        if (!$role) {
            $this->logger->info(sprintf('Unable to load role with identifyer "%s"', $identifyer));
            return null;
        }

        return $role;
    }
}
