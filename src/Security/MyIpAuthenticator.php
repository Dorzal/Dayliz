<?php
/**
 * Created by PhpStorm.
 * User: Drano
 * Date: 20/12/2018
 * Time: 21:37
 */

namespace App\Security;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class MyIpAuthenticator
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function supports(Request $request)
    {
        if ($this->security->getUser()) {
            return false;
        }

        return true;
    }
}