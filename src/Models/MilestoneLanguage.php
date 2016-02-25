<?php 
/*
 * QordobaLib
 *
 *   by Qordoba BETA v2.0 on 02/25/2016
 */

namespace QordobaLib\Models;

use JsonSerializable;

class MilestoneLanguage implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param Milestone $milestone public property
     */
    protected $milestone;

    /**
     * TODO: Write general description for this property
     * @param array $languages public property
     */
    protected $languages;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   Milestone         $milestone   Initialization value for the property $this->milestone
	 * @param   array             $languages   Initialization value for the property $this->languages
     */
    public function __construct()
    {
        if(2 == func_num_args())
        {
            $this->milestone = func_get_arg(0);
            $this->languages = func_get_arg(1);
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
        $json['milestone'] = $this->milestone;
        $json['languages'] = $this->languages;
        return $json;
    }
}