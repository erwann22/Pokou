<?php

namespace Pokou\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PokouUserBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
