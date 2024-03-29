<?php
namespace App\Classes;

class MyClasses
{
    public function httpResponse($code)
    {
        switch ($code) {
            case 200:
                return array(
                    'code' => '200',
                    'meaning' => 'OK',
                    'description' => 'The API request is successful.',
                );
                break;

            case 201:
                return array(
                    'code' => '201',
                    'meaning' => 'CREATED',
                    'description' => 'Request fulfilled for single record insertion.',
                );
                break;

            case 202:
                return array(
                    'code' => '202',
                    'meaning' => '	ACCEPTED',
                    'description' => 'Request fulfilled for multiple records insertion.',
                );
                break;

            case 204:return array(
                    'code' => '204',
                    'meaning' => 'NO CONTENT',
                    'description' => 'There is no content available for the request.',
                );
                break;

            case 304:return array(
                    'code' => '304',
                    'meaning' => 'NOT MODIFIED',
                    'description' => 'The requested page has not been modified. In case "If-Modified-Since" header is used for GET APIs',
                );
                break;

            case 400:return array(
                    'code' => '400',
                    'meaning' => 'BAD REQUEST',
                    'description' => 'The request or the authentication considered is invalid.',
                );
                break;

            case 401:return array(
                    'code' => '401',
                    'meaning' => 'AUTHORIZATION ERROR',
                    'description' => 'The request lacks valid authentication credentials OR Invalid API key provided.',
                );
                break;

            case 403:return array(
                    'code' => '403',
                    'meaning' => 'FORBIDDEN',
                    'description' => 'No permission to do the operation.',
                );
                break;

            case 404:return array(
                    'code' => '404',
                    'meaning' => 'NOT FOUND',
                    'description' => 'Invalid request.',
                );
                break;

            case 405:return array(
                    'code' => '405',
                    'meaning' => 'METHOD NOT ALLOWED',
                    'description' => 'The specified method is not allowed.',
                );
                break;

            case 413:return array(
                    'code' => '413',
                    'meaning' => 'REQUEST ENTITY TOO LARGE',
                    'description' => 'The server did not accept the request while uploading a file, since the limited file size has exceeded.',
                );
                break;

            case 415:return array(
                    'code' => '415',
                    'meaning' => 'UNSUPPORTED MEDIA TYPE',
                    'description' => 'The server did not accept the request while uploading a file, since the media/ file type is not supported.',
                );
                break;

            case 429:return array(
                    'code' => '429',
                    'meaning' => 'TOO MANY REQUESTS',
                    'description' => 'Number of API requests for the 24 hour period is exceeded or the concurrency limit of the user for the app is exceeded.',
                );
                break;

            case 500:return array(
                    'code' => '500',
                    'meaning' => 'INTERNAL SERVER ERROR',
                    'description' => 'Generic error that is encountered due to an unexpected server error.',
                );
                break;

            default:return array(
                    'code' => '501',
                    'meaning' => 'NOT IMPLEMENTED',
                    'description' => 'The server either does not recognize the request method, or it lacks the ability to fulfil the request. Usually this implies future availability (e.g., a new feature of a web-service API)',
                );
                break;
        }
    }
}
