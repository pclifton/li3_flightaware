<?php

namespace li3_flightaware\Api;

/**
 * Simple wrapper class for an API query object
 *
 * This class is required because Lithium's Http data source class will not
 * pass URL parameters passed in simple data form for GET requests; the data
 * has to be passed as an object. So all this class does is store a parameter
 * array and expose it again.
 *
 */
class Query {
    
    /**
     * Query data, an array of URL parameters
     *
     * @var array
     */
    protected $_query;
    
    /**
     * Construct *THIS*
     *
     * @param array $query Array of URL params
     * @return void
     */
    public function __construct(array $query) {
        $this->_query = $query;
    }
    
    /**
     * Export the query as an array
     *
     * @return array Array of URL params
     */
    public function export() {
        return $this->_query;
    }
    
    /**
     * Fetch the query data as an array
     *
     * @return array Array of URL params
     */
    public function data() {
        return $this->_query;
    }
    
}