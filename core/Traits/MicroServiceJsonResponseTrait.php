<?php
/**
 * @file
 * Contains \biliboobrian\MicroServiceCore\Traits\MicroServiceJsonResponseTrait.
 */

namespace biliboobrian\MicroServiceCore\Traits;

use biliboobrian\MicroServiceCore\Enum\Status;
use biliboobrian\MicroServiceCore\Helpers\MicroServiceHelper;
use biliboobrian\MicroServiceCore\Pagination\Paginator;

/**
 * A trait for creating a microservice JSON response.
 *
 * @package biliboobrian\MicroServiceCore\Traits
 */
trait MicroServiceJsonResponseTrait
{
    /**
     * Generate a response object in the microservices expected format.
     *
     * @param string $type
     *     The type of data being returned. Will be used to name the collection.
     * @param object|array|NULL $data
     *     The data to return. Will always be parsed into a collection.
     * @param int $code
     *     HTTP status code for the response.
     * @param string $status
     *     A short status message. Examples: 'OK', 'Bad Request', 'Not Found'.
     * @param string $message
     *     A more detailed status message.
     *
     * @return \Illuminate\Http\Response
     */
    protected function generateResponse($type, $data, $code = 200, $status = Status::OK, $message = '')
    {   
        if ($code == 204) {
            return response('', 204);
        }
        $returnData = MicroServiceHelper::jsonResponseFormatter($type, $data, $code, $status, $message);
        return response()->json($returnData, $code);
    }

    /**
     * Generate a paginated response object in the microservices expected format.
     *
     * @param Paginator $paginator
     *     A paginator for the data being returned.
     * @param string $type
     *     The type of data being returned. Will be used to name the collection.
     * @param object|array|NULL $data
     *     The data to return. Will always be parsed into a collection.
     * @param int $code
     *     HTTP status code for the response.
     * @param string $status
     *     A short status message. Examples: 'OK', 'Bad Request', 'Not Found'.
     * @param string $message
     *     A more detailed status message.
     *
     * @return \Illuminate\Http\Response
     */
    protected function generatePaginatedResponse(Paginator $paginator, $type, $data, $code = 200, $status = Status::OK, $message = '')
    {
        $returnData = MicroServiceHelper::jsonResponseFormatter($type, $data, $code, $status, $message);

        // Append the pagination response to the data.
        $returnData->pagination = $paginator->preparePaginationResponse()->snakeFormat();

        return response()->json($returnData, $code);
    }
}