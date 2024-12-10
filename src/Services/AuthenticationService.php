<?php

namespace Niranjannsahoo\Odkcentralapi\Services;

use GuzzleHttp\Client;
use Niranjannsahoo\Odkcentralapi\Exceptions\OdkException;
use Niranjannsahoo\Odkcentralapi\Helpers\ResponseHelper;

class AuthenticationService
{
  /**
   * The HTTP Client instance.
   *
   * @var Client
   */
  protected $client;

  /**
   * The ODK API URL.
   *
   * @var string
   */
  protected $apiUrl;

  /**
   * The ODK user email.
   *
   * @var string
   */
  protected $userEmail;

  /**
   * The ODK user password.
   *
   * @var string
   */
  protected $userPassword;

  /**
   * Constructor.
   *
   * @param Client $client
   * @param string $apiUrl
   * @param string $userEmail
   * @param string $userPassword
   */
  public function __construct(Client $client, string $apiUrl, string $userEmail, string $userPassword)
  {
    $this->client = $client;
    $this->apiUrl = $apiUrl;
    $this->userEmail = $userEmail;
    $this->userPassword = $userPassword;
  }

  /**
   * Authenticate the user and obtain a token.
   *
   * @return string
   * @throws OdkException
   */
  public function authenticate(): string
  {
    try {
      // Prepare the payload for authentication request
      $payload = [
        'form_params' => [
          'email'    => $this->userEmail,
          'password' => $this->userPassword,
        ]
      ];

      // Send the authentication request
      $response = $this->client->post("{$this->apiUrl}/users/token", $payload);

      // Parse and validate the response
      $data = ResponseHelper::validateResponse($response);

      // Return the authentication token
      return $data['token'];
    } catch (\Exception $e) {
      throw new OdkException('Authentication failed: ' . $e->getMessage());
    }
  }

  /**
   * Refresh the authentication token.
   *
   * @param string $refreshToken
   * @return string
   * @throws OdkException
   */
  public function refreshToken(string $refreshToken): string
  {
    try {
      // Prepare the payload for the refresh token request
      $payload = [
        'form_params' => [
          'refresh_token' => $refreshToken,
        ]
      ];

      // Send the refresh token request
      $response = $this->client->post("{$this->apiUrl}/users/refresh", $payload);

      // Parse and validate the response
      $data = ResponseHelper::validateResponse($response);

      // Return the new authentication token
      return $data['token'];
    } catch (\Exception $e) {
      throw new OdkException('Token refresh failed: ' . $e->getMessage());
    }
  }
}
