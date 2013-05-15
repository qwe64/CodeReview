<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\DemoBundle\Manager\PrimeManager;

class WelcomeController extends Controller
{
    const MIN = 1;
    const MAX = 1000;

    public function indexAction()
    {
        $primeManager = new PrimeManager;
        return $this->render('AcmeDemoBundle:Welcome:index.html.twig', array(
            'min'            => self::MIN,
            'max'           => self::MAX,
            'numbers'  => $primeManager->selectOnlyPrimes( range( self::MIN, self::MAX ) )
            ));
    }
}
