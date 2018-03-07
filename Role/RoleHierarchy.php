<?php

namespace NCMF\RoleHierarchyBundle\Role;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Role\RoleHierarchy as Base;
use Symfony\Component\Security\Core\Role\Role;

class RoleHierarchy extends Base
{

    private $entityManager;

    public function __construct(array $hierarchy, EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct($hierarchy);
    }

    public function getReachableRoles(array $roles)
    {

        $rolesEntities = $this->entityManager->getRepository('NCMFRoleHierarchyBundle:Role')->findAll();

        $newMap = [];

        dump($rolesEntities);
        $newRoles = [];
        foreach ($rolesEntities as $item) {
            $newRoles[] = new Role($item->getCode());
            $code = $item->getCode();
            if ($item->getChildren()->count() > 0) {
                $newMap[$code] = [];
                foreach ($item->getChildren() as $child) {
                    $newMap[$code][] = $child->getCode();
                }
            }
        }

        dump($newMap);

        dump($newRoles);
        dump($roles);

        $reachableRoles = $roles;
        dump($this->map);
        foreach ($roles as $role) {
            if (!isset($this->map[$role->getRole()])) {
                continue;
            }

            foreach ($this->map[$role->getRole()] as $r) {
                $reachableRoles[] = new Role($r);
            }
        }
        dump($reachableRoles);
        return $reachableRoles;
    }
}