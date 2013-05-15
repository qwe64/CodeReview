<?php

namespace Acme\DemoBundle\Manager;

class PrimeManager
{
    const MAX_DELIMETERS = 2;

    /**
     * @param  Array $numbers
     * @return Array $numbers
     */
    public function selectOnlyPrimes( $numbers )
    {
        foreach ( $numbers as $key => $number ) {
            if ( $this->countDelimeters( $number ) > self::MAX_DELIMETERS ) {
                unset( $numbers[ $key ] );
            }
        }
        return $numbers;
    }

    /**
     * @param  Integer $number
     * @return Integer count of delimeters
     */
    protected function countDelimeters( $number )
    {
        $probableDelimeters = range( 1, $number );
        $count = 0;
        foreach ( $probableDelimeters as $delimeter ) {
            if ( $number % $delimeter === 0 ) {
                $count++;
            }
        }
        return $count;
    }
}