<?php

/**
 * This file contains the RequestParserParseRequestTest class.
 *
 * @package    Lunr\Corona
 * @author     Heinz Wiesinger <heinz@m2mobi.com>
 * @copyright  2014-2018, M2Mobi BV, Amsterdam, The Netherlands
 * @license    http://lunr.nl/LICENSE MIT License
 */

namespace Lunr\Corona\Tests;

use Lunr\Corona\Tests\Helpers\RequestParserStaticRequestTestTrait;

/**
 * Basic tests for the case of empty superglobals.
 *
 * @covers        Lunr\Corona\RequestParser
 * @backupGlobals enabled
 */
class RequestParserParseRequestTest extends RequestParserTest
{

    use RequestParserStaticRequestTestTrait;

    /**
     * Mocked calls to Configuration
     * @var array
     */
    protected $mocked_calls = [];

    /**
     * Preparation work for the request tests.
     *
     * @param string  $protocol  Protocol name
     * @param string  $port      Port number
     * @param boolean $useragent Whether to include useragent information or not
     * @param string  $key       Device useragent key
     *
     * @return void
     */
    protected function prepare_request_test($protocol = 'HTTP', $port = '80', $useragent = FALSE, $key = ''): void
    {
        if (!extension_loaded('uuid'))
        {
            $this->markTestSkipped('Extension uuid is required.');
        }

        $this->mock_function('gethostname', function(){ return "Lunr"; });
        $this->mock_function('uuid_create', function(){ return "962161b2-7a01-41f3-84c6-3834ad001adf"; });

        if (($protocol == 'HTTPS' && $port == '443') || ($protocol == 'HTTP' && $port == '80'))
        {
            $url = strtolower($protocol) . '://www.domain.com/path/to/';
        }
        else
        {
            $url = strtolower($protocol) . '://www.domain.com:' . $port . '/path/to/';
        }

        $this->mocked_calls = [
            'default_application_path' => ['default_application_path', '/full/path/to/'],
            'default_webpath'          => ['default_webpath', '/path/to/'],
            'default_protocol'         => ['default_protocol', strtolower($protocol)],
            'default_domain'           => ['default_domain', 'www.domain.com'],
            'default_port'             => ['default_port', $port],
            'default_url'              => ['default_url', $url],
            'default_controller'       => ['default_controller', 'DefaultController'],
            'default_method'           => ['default_method', 'default_method'],
        ];
    }

    /**
     * Preparation work for the request tests.
     *
     * @param boolean $controller Whether to set a controller value
     * @param boolean $method     Whether to set a method value
     * @param boolean $override   Whether to override default values or not
     *
     * @return void
     */
    protected function prepare_request_data($controller = TRUE, $method = TRUE, $override = FALSE): void
    {
        //NO-OP
    }

    /**
     * Cleanup work for the request tests.
     *
     * @return void
     */
    private function cleanup_request_test(): void
    {
        $this->unmock_function('gethostname');
        $this->unmock_function('uuid_create');
    }

    /**
     * Unit Test Data Provider for possible base_url values and parameters.
     *
     * @return array $base Array of base_url parameters and possible values
     */
    public function baseurlProvider(): array
    {
        $base   = [];
        $base[] = [ 'HTTPS', '443', 'https://www.domain.com/path/to/' ];
        $base[] = [ 'HTTPS', '80', 'https://www.domain.com:80/path/to/' ];
        $base[] = [ 'HTTP', '80', 'http://www.domain.com/path/to/' ];
        $base[] = [ 'HTTP', '443', 'http://www.domain.com:443/path/to/' ];

        return $base;
    }

}

?>
