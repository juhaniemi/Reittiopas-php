<?php

class LineInformation
{
	/**
	 * Module base-url
	 * @var string
	 */
	private static $_uri = "query=%s&type=%s&p=%s&request=lines";
	
	/**
	 * Line code
	 * @var string, multiple lines separated by pipe ("|")
	 */
	private $_query;
	
	/**
	 * Optional, list of transport type ids separated by pipe ("|").
	 * @var string
	 */
	private $_type;

  /**
 	 * Optional, limit fields in response. Defaults to all fields.
 	 *
 	 * @var string
 	 */
 	private $_p;

	/**
	 * Constructor, creates LineInformation-object.
	 * @param string $query
   * @param string $type
   * @param string $p
	 * @throws InvalidArgumentException
	 */
	function __construct($query, $type = null, $p = null) {
		if(empty($query) || ! is_string($query))
			throw new InvalidArgumentException("Query required.");
		
		$this->_query = $query;
		$this->_type = $type;
		$this->_p = $p;
	}
	
	/**
	 * Format url
	 * @return string
	 */
	public function getUriLineInformation() {
		return sprintf(self::$_uri, $this->_query, $this->_type, $this->_p);
	}
}