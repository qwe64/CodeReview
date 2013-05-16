<?php

namespace Acme\DemoBundle\Tests\Manager;

use Acme\DemoBundle\Manager\PrimeManager;

class PrimeManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
	$manager = new PrimeManager();

	$numbers = range(2,1000);

	$result = $manager->selectOnlyPrimes( $numbers );

	foreach ($result as $v) {
		$isPrime = \gmp_prob_prime ( $v );
		if ($isPrime==1) {// gmp not sure, must do the hard way
			$isPrime=2;
			for ($d=2;$d<$v;$d++) {
				if ($v%$d==0) {
					$isPrime=0;
					break;
				}
			}
		}
		$this->assertEquals($isPrime,2);
	}

    }
}

?>
