<?php

namespace HidePimcoreXMessageBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class HidePimcoreXMessageBundle extends AbstractPimcoreBundle
{
    public function getNiceName()
    {
        return 'Hide PimcoreX Update Message';
    }

    public function getDescription()
    {
        return 'Hides the PimcoreX Update Message on the login-screens';
    }
}
