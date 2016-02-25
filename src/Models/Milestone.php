<?php 
/*
 * QordobaLib
 *
 *   by Qordoba BETA v2.0 on 02/25/2016
 */

namespace QordobaLib\Models;

use JsonSerializable;

class Milestone implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param int $milestoneId public property
     */
    protected $milestoneId;

    /**
     * TODO: Write general description for this property
     * @param string $name public property
     */
    protected $name;

    /**
     * TODO: Write general description for this property
     * @param int $order public property
     */
    protected $order;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   int               $milestoneId    Initialization value for the property $this->milestoneId 
	 * @param   string            $name           Initialization value for the property $this->name        
	 * @param   int               $order          Initialization value for the property $this->order       
     */
    public function __construct()
    {
        if(3 == func_num_args())
        {
            $this->milestoneId  = func_get_arg(0);
            $this->name         = func_get_arg(1);
            $this->order        = func_get_arg(2);
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
        $json['milestone_id'] = $this->milestoneId;
        $json['name']         = $this->name;
        $json['order']        = $this->order;
        return $json;
    }
}