<?php

namespace li3_flightaware;
use \lithium\data\Connections;

/**
 * Lithium class to read data from the Flightaware API
 *
 * @author Philip Clifton
 * @link   http://github.com/pclifton
 * @see    http://flightxml.flightaware.com/soap/FlightXML2/doc
 */
class Api {
    
    /**
     * Query the Flightaware API
     *
     * @param string $method API endpoint
     * @param array  $params URL parameters for the API request
     * @return array Decoded results from API
     */
    public static function query($method, $params) {
        $conn = Connections::get('default');
        $query = array(
            'query' => '{true lifeguard}'
        );
        $options = array(
            'source' => $method
        );
        // @TODO: Create results wrapper class and test bad-request results
        $res = $conn->read(new Api\Query($params), $options);
        die(debug($res));
    }
    
    /**
     * Permits the use of shorthand ::[API method name] for requests
     *
     * @param string $name Called method name
     * @param array  $args Arguments passed to the method
     * @return array Decoded results from API
     */
    public static function __callStatic($name, $args) {
        // @TODO: Will we do anything else with this thing?
        return static::query($name, $args);
    }
    
}