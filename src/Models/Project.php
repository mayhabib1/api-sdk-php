<?php 
/*
 * QordobaLib
 *
 *   by Qordoba BETA v2.0 on 02/25/2016
 */

namespace QordobaLib\Models;

use JsonSerializable;

class Project implements JsonSerializable {
    /**
     * TODO: Write general description for this property
     * @param string $name public property
     */
    protected $name;

    /**
     * TODO: Write general description for this property
     * @param int $sourceLanguage public property
     */
    protected $sourceLanguage;

    /**
     * TODO: Write general description for this property
     * @param int $contentType public property
     */
    protected $contentType;

    /**
     * TODO: Write general description for this property
     * @param string $organizationId public property
     */
    protected $organizationId;

    /**
     * TODO: Write general description for this property
     * @param array $targetLanguages public property
     */
    protected $targetLanguages;

    /**
     * TODO: Write general description for this property
     * @param array $milestones public property
     */
    protected $milestones;

    /**
     * TODO: Write general description for this property
     * @param array $stringFiles public property
     */
    protected $stringFiles;

    /**
     * Constructor to set initial or default values of member properties
	 * @param   string            $name               Initialization value for the property $this->name            
	 * @param   int               $sourceLanguage     Initialization value for the property $this->sourceLanguage  
	 * @param   int               $contentType        Initialization value for the property $this->contentType     
	 * @param   string            $organizationId     Initialization value for the property $this->organizationId  
	 * @param   array             $targetLanguages    Initialization value for the property $this->targetLanguages 
	 * @param   array             $milestones         Initialization value for the property $this->milestones      
	 * @param   array             $stringFiles        Initialization value for the property $this->stringFiles     
     */
    public function __construct()
    {
        if(7 == func_num_args())
        {
            $this->name             = func_get_arg(0);
            $this->sourceLanguage   = func_get_arg(1);
            $this->contentType      = func_get_arg(2);
            $this->organizationId   = func_get_arg(3);
            $this->targetLanguages  = func_get_arg(4);
            $this->milestones       = func_get_arg(5);
            $this->stringFiles      = func_get_arg(6);
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
        $json['name']             = $this->name;
        $json['source_language']  = $this->sourceLanguage;
        $json['content_type']     = $this->contentType;
        $json['organization_id']  = $this->organizationId;
        $json['target_languages'] = $this->targetLanguages;
        $json['milestones']       = $this->milestones;
        $json['string_files']     = $this->stringFiles;
        return $json;
    }
}