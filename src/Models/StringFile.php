<?php 
/*
 * QordobaLib
 *
 *   by Qordoba BETA v2.0 on 02/25/2016
 */

namespace QordobaLib\Models;

use JsonSerializable;

class StringFile implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param string $id public property
     */
    protected $id;

    /**
     * TODO: Write general description for this property
     * @param string $fileName public property
     */
    protected $fileName;

    /**
     * TODO: Write general description for this property
     * @param string $fileType public property
     */
    protected $fileType;

    /**
     * TODO: Write general description for this property
     * @param array $sourceColumns public property
     */
    protected $sourceColumns;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   string            $id               Initialization value for the property $this->id            
	 * @param   string            $fileName         Initialization value for the property $this->fileName      
	 * @param   string            $fileType         Initialization value for the property $this->fileType      
	 * @param   array             $sourceColumns    Initialization value for the property $this->sourceColumns 
     */
    public function __construct()
    {
        if(4 == func_num_args())
        {
            $this->id             = func_get_arg(0);
            $this->fileName       = func_get_arg(1);
            $this->fileType       = func_get_arg(2);
            $this->sourceColumns  = func_get_arg(3);
        }
    }

    /**
     * Return a property of the response if it exists.
     * Possibilities include: code, raw_body, headers, body (if the response is json-decodable)
     * @return mixed
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            //UTF-8 is recommended for correct JSON serialization
            $value = $this->$property;
            if (is_string($value) && mb_detect_encoding($value, "UTF-8", TRUE) != "UTF-8") {
                return utf8_encode($value);
            }
            else {
                return $value;
            }
        }
    }
    
    /**
     * Set the properties of this object
     * @param string $property the property name
     * @param mixed $value the property value
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            //UTF-8 is recommended for correct JSON serialization
            if (is_string($value) && mb_detect_encoding($value, "UTF-8", TRUE) != "UTF-8") {
                $this->$property = utf8_encode($value);
            }
            else {
                $this->$property = $value;
            }
        }

        return $this;
    }

    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['id']             = $this->id;
        $json['file_name']      = $this->fileName;
        $json['file_type']      = $this->fileType;
        $json['source_columns'] = $this->sourceColumns;
        return $json;
    }
}