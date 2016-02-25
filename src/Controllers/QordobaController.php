<?php
/*
 * QordobaLib
 *
 *   by Qordoba BETA v2.0 on 02/25/2016
 */

namespace QordobaLib\Controllers;

use QordobaLib\APIException;
use QordobaLib\APIHelper;
use QordobaLib\Configuration;
use Unirest\Unirest;
class QordobaController {

    /* private fields for configuration */

    /**
     * The username to use with basic authentication 
     * @var string
     */
    private $basicAuthUserName;

    /**
     * The password to use with basic authentication 
     * @var string
     */
    private $basicAuthPassword;

    /**
     * Constructor with authentication and configuration parameters
     */
    function __construct($basicAuthUserName, $basicAuthPassword)
    {
        $this->basicAuthUserName = $basicAuthUserName ? $basicAuthUserName : Configuration::$basicAuthUserName;
        $this->basicAuthPassword = $basicAuthPassword ? $basicAuthPassword : Configuration::$basicAuthPassword;
    }

    /**
     * Creates a new project
     * @param  Project     $body     Required parameter: Project creation payload
     * @return void response from the API call*/
    public function createProjects (
                $body) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/projects';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'content-type'  => 'application/json; charset=utf-8'
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($body), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Gets an organisation's projects
     * @return mixed response from the API call*/
    public function getProjects () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/projects';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets organisation workflows
     * @return mixed response from the API call*/
    public function getWorkflow () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/workflows';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets a workflow
     * @param  string     $wfId      Required parameter: Your workflow ID
     * @return mixed response from the API call*/
    public function getWorkflow (
                $wfId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/workflows/{wf_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'wf_id' => $wfId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets an organisation's team
     * @param  string     $filterQuery     Required parameter: Your filter string
     * @param  string     $limit           Required parameter: Your pagination limit
     * @param  string     $offset          Required parameter: Your pagination offset
     * @return mixed response from the API call*/
    public function getTeam (
                $filterQuery,
                $limit,
                $offset) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/team';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'filterQuery' => $filterQuery,
            'limit'       => $limit,
            'offset'      => $offset,
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets a project's workflow
     * @param  string     $languageId      Required parameter: Your language ID
     * @param  string     $projectId       Required parameter: Your project ID
     * @return mixed response from the API call*/
    public function getWorkflow (
                $languageId,
                $projectId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/projects/{project_id}/languages/{language_id}/workflow';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'language_id' => $languageId,
            'project_id'  => $projectId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets an project's feed
     * @param  string     $from           Required parameter: Feed source
     * @param  string     $limit          Required parameter: Your pagination limit
     * @param  string     $projectId      Required parameter: Your project ID
     * @return mixed response from the API call*/
    public function getWorkflow (
                $from,
                $limit,
                $projectId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/projects/{project_id}/feed';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'project_id' => $projectId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'from'       => $from,
            'limit'      => $limit,
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets project's files
     * @param  string     $languageId        Required parameter: Your language ID
     * @param  string     $limit             Required parameter: Your pagination limit
     * @param  string     $offset            Required parameter: Your pagination offset
     * @param  string     $projectId         Required parameter: Your project ID
     * @param  string     $searchString      Required parameter: Your search string
     * @return mixed response from the API call*/
    public function getFiles (
                $languageId,
                $limit,
                $offset,
                $projectId,
                $searchString) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/projects/{project_id}/languages/{language_id}/files';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'language_id'   => $languageId,
            'project_id'    => $projectId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'limit'         => $limit,
            'offset'        => $offset,
            'search_string' => $searchString,
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Uploads a project file
     * @param  string     $projectId      Required parameter: Your project ID
     * @return void response from the API call*/
    public function createFiles (
                $projectId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/projects/{project_id}/files';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'project_id' => $projectId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Downloads a project's file
     * @param  string     $fileId          Required parameter: Your file ID
     * @param  string     $languageId      Required parameter: Your language ID
     * @param  string     $projectId       Required parameter: Your project ID
     * @return mixed response from the API call*/
    public function getFiles (
                $fileId,
                $languageId,
                $projectId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/projects/{project_id}/languages/{language_id}/files/{file_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'file_id'     => $fileId,
            'language_id' => $languageId,
            'project_id'  => $projectId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets a file's segments
     * @param  string     $fileId            Required parameter: Your file ID
     * @param  string     $filter            Required parameter: Your filter string
     * @param  string     $languageId        Required parameter: Your language ID
     * @param  string     $limit             Required parameter: Your pagination limit
     * @param  string     $offset            Required parameter: Your pagination offset
     * @param  string     $projectId         Required parameter: Your project ID
     * @param  string     $searchString      Required parameter: Your search string
     * @return mixed response from the API call*/
    public function getSegments (
                $fileId,
                $filter,
                $languageId,
                $limit,
                $offset,
                $projectId,
                $searchString) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/projects/{project_id}/languages/{language_id}/files/{file_id}/segments';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'file_id'       => $fileId,
            'language_id'   => $languageId,
            'project_id'    => $projectId,
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($queryBuilder, array (
            'filter'        => $filter,
            'limit'         => $limit,
            'offset'        => $offset,
            'search_string' => $searchString,
        ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets a segment
     * @param  string     $fileId          Required parameter: Your file ID
     * @param  string     $languageId      Required parameter: Your language ID
     * @param  string     $projectId       Required parameter: Your project ID
     * @param  string     $segmentId       Required parameter: Your segment ID
     * @return mixed response from the API call*/
    public function getSegments (
                $fileId,
                $languageId,
                $projectId,
                $segmentId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/projects/{project_id}/languages/{language_id}/files/{file_id}/segments/{segment_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'file_id'     => $fileId,
            'language_id' => $languageId,
            'project_id'  => $projectId,
            'segment_id'  => $segmentId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Updates a segment
     * @param  string     $fileId          Required parameter: Your file ID
     * @param  string     $languageId      Required parameter: Your language ID
     * @param  string     $projectId       Required parameter: Your project ID
     * @param  string     $segmentId       Required parameter: Your segment ID
     * @return void response from the API call*/
    public function updateSegments (
                $fileId,
                $languageId,
                $projectId,
                $segmentId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/projects/{project_id}/languages/{language_id}/files/{file_id}/segments/{segment_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'file_id'     => $fileId,
            'language_id' => $languageId,
            'project_id'  => $projectId,
            'segment_id'  => $segmentId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::put($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Adds segments to a file
     * @param  Project     $body           Required parameter: Project creation payload
     * @param  string      $fileId         Required parameter: Your file ID
     * @param  string      $projectId      Required parameter: Your project ID
     * @return void response from the API call*/
    public function createFiles (
                $body,
                $fileId,
                $projectId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/projects/{project_id}/files/{file_id}/segments';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'file_id'    => $fileId,
            'project_id' => $projectId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'content-type'  => 'application/json; charset=utf-8'
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, json_encode($body), $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Creates an empty file
     * @param  string     $fileName       Required parameter: Your file name
     * @param  string     $projectId      Required parameter: Your project ID
     * @return void response from the API call*/
    public function createFiles (
                $fileName,
                $projectId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/projects/{project_id}/files/{file_name}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'file_name'  => $fileName,
            'project_id' => $projectId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Gets an organisation's translation memory
     * @return mixed response from the API call*/
    public function getTm () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/translation_memories';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Posts an organisation's translation memory
     * @return void response from the API call*/
    public function createTm () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/translation_memories/upload';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Gets a translation memory config
     * @param  string     $tmId      Required parameter: Your translation memory ID
     * @return mixed response from the API call*/
    public function getTm (
                $tmId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/translation_memories/{tm_id}/config';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'tm_id' => $tmId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Updates a translation memory config
     * @param  string     $tmId      Required parameter: Your translation ID
     * @return void response from the API call*/
    public function updateTm (
                $tmId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/translation_memories/{tm_id}/config';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'tm_id' => $tmId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::put($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Gets a translation memory
     * @param  string     $tmId      Required parameter: Your translation memory ID
     * @return mixed response from the API call*/
    public function getTm (
                $tmId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/translation_memories/{tm_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'tm_id' => $tmId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets a translation memory's segments
     * @param  string     $tmId      Required parameter: Your translation memory ID
     * @return mixed response from the API call*/
    public function getTm (
                $tmId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/translation_memories/{tm_id}/segments';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'tm_id' => $tmId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Posts a translation memory's term
     * @return void response from the API call*/
    public function createTm () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/translation_memories/add_term';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Gets a translation memory's segment
     * @param  string     $id        Required parameter: Your segment ID
     * @param  string     $tmId      Required parameter: Your translation memory ID
     * @return mixed response from the API call*/
    public function getTm (
                $id,
                $tmId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/translation_memories/{tm_id}/segments/{id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'id'    => $id,
            'tm_id' => $tmId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Updates a translation memory's segment
     * @param  string     $id        Required parameter: Your segment ID
     * @param  string     $tmId      Required parameter: Your translation memory ID
     * @return void response from the API call*/
    public function updateTm (
                $id,
                $tmId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/translation_memories/{tm_id}/segments/{id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'id'    => $id,
            'tm_id' => $tmId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::put($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Deletes a translation memory's segment
     * @param  string     $id        Required parameter: Your segment ID
     * @param  string     $tmId      Required parameter: Your translation memory ID
     * @return void response from the API call*/
    public function deleteTm (
                $id,
                $tmId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/translation_memories/{tm_id}/segments/{id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'id'    => $id,
            'tm_id' => $tmId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::delete($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Gets organization's glossaries
     * @return mixed response from the API call*/
    public function getGlossaries () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/glossaries';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Posts an organization glossary
     * @return void response from the API call*/
    public function createGlossaries () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/glossaries/upload';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Gets a glossary's config
     * @param  string     $glossaryId      Required parameter: Your glossary ID
     * @return mixed response from the API call*/
    public function getGlossaries (
                $glossaryId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/glossaries/{glossary_id}/config';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'glossary_id' => $glossaryId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Updates a glossary's config
     * @param  string     $glossaryId      Required parameter: Your glossary ID
     * @return void response from the API call*/
    public function updateGlossaries (
                $glossaryId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/glossaries/{glossary_id}/config';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'glossary_id' => $glossaryId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::put($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Downloads a glossary
     * @param  string     $glossaryId      Required parameter: Your glossary ID
     * @return mixed response from the API call*/
    public function getGlossaries (
                $glossaryId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/glossaries/{glossary_id}/download';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'glossary_id' => $glossaryId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets a glossary
     * @param  string     $glossaryId      Required parameter: Your glossary ID
     * @return mixed response from the API call*/
    public function getGlossaries (
                $glossaryId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/glossaries/{glossary_id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'glossary_id' => $glossaryId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets project glossaries
     * @param  string     $languageId      Required parameter: Your language ID
     * @param  string     $projectId       Required parameter: Your project ID
     * @return mixed response from the API call*/
    public function getGlossaries (
                $languageId,
                $projectId) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/project/{project_id}/languages/{language_id}/glossaries/terms';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'language_id' => $languageId,
            'project_id'  => $projectId,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Posts glossary term
     * @return void response from the API call*/
    public function createGlossaries () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/glossaries/add_term';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::post($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Gets glossary term
     * @param  string     $glossaryId      Required parameter: Your glossary ID
     * @param  string     $id              Required parameter: Your glossary term ID
     * @return mixed response from the API call*/
    public function getGlossaries (
                $glossaryId,
                $id) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/glossaries/{glossary_id}/terms/{id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'glossary_id' => $glossaryId,
            'id'          => $id,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Updates glossary term
     * @param  string     $glossaryId      Required parameter: Your glossary ID
     * @param  string     $id              Required parameter: Your glossary term ID
     * @return void response from the API call*/
    public function updateGlossaries (
                $glossaryId,
                $id) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/glossaries/{glossary_id}/terms/{id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'glossary_id' => $glossaryId,
            'id'          => $id,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::put($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Deletes glossary term
     * @param  string     $glossaryId      Required parameter: Your glossary ID
     * @param  string     $id              Required parameter: Your glossary term ID
     * @return void response from the API call*/
    public function deleteGlossaries (
                $glossaryId,
                $id) 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/glossaries/{glossary_id}/terms/{id}';

        //process optional query parameters
        APIHelper::appendUrlWithTemplateParameters($queryBuilder, array (
            'glossary_id' => $glossaryId,
            'id'          => $id,
            ));

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0'
        );

        //prepare API request
        $request = Unirest::delete($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }
    }
        
    /**
     * Gets languages
     * @return mixed response from the API call*/
    public function getLanguages () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/languages';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets countries
     * @return mixed response from the API call*/
    public function getLanguages () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/countries';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
    /**
     * Gets regex templates
     * @return mixed response from the API call*/
    public function getRegextemplates () 
    {
        //the base uri for api requests
        $queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $queryBuilder = $queryBuilder.'/api/regextemplates';

        //validate and preprocess url
        $queryUrl = APIHelper::cleanUrl($queryBuilder);

        //prepare headers
        $headers = array (
            'user-agent'    => 'Qordoba 2.0',
            'Accept'        => 'application/json'
        );

        //prepare API request
        $request = Unirest::get($queryUrl, $headers, NULL, $this->basicAuthUserName, $this->basicAuthPassword);

        //and invoke the API call request to fetch the response
        $response = Unirest::getResponse($request);

        //Error handling using HTTP status codes
        if (($response->code < 200) || ($response->code > 206)) { //[200,206] = HTTP OK
            throw new APIException("HTTP Response Not OK", $response->code, $response->body);
        }

        return $response->body;
    }
        
}