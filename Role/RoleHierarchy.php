<?php

namespace NCMF\RoleHierarchy\Role;

use Symfony\Component\Security\Core\Role\RoleHierarchy as Base;
use Symfony\Component\Security\Core\Role\Role;

class RoleHierarchy extends Base
{

    public function getReachableRoles(array $roles)
    {
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