<?php
/**
 * OAuth 2.0 Grant type interface
 *
 * @package     php-loep/oauth2-server
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) 2013 PHP League of Extraordinary Packages
 * @license     http://mit-license.org/
 * @link        http://github.com/php-loep/oauth2-server
 */

namespace League\OAuth2\Server\Grant;

use League\OAuth2\Server\Authorization;
use League\OAuth2\Server\Exception;
use League\OAuth2\Server\Util\TokenGeneratorInterface;

interface GrantTypeInterface
{
    /**
     * Constructor
     * @return void
     */
    public function __construct(Authorization $authServer = null);

    /**
     * @param TokenGeneratorInterface $generator
     */
    public function setTokenGenerator(TokenGeneratorInterface $generator);

    /**
     * Complete the grant flow
     *
     * Example response:
     * <code>
     * 	array(
     *  	'access_token'  =>  (string),	// The access token
     *      'refresh_token' =>  (string),	// The refresh token (only set if the refresh token grant is enabled)
     *      'token_type'    =>  'Bearer',	// Almost always "Bearer" (exceptions: JWT, SAML)
     *      'expires'       =>  (int),		// The timestamp of when the access token will expire
     *      'expires_in'    =>  (int)		// The number of seconds before the access token will expire
     *  )
     * </code>
     *
     * @param  null|array $inputParams Null unless the input parameters have been manually set
     * @return array                   An array of parameters to be passed back to the client
     */
    public function completeFlow($inputParams = null);
}
