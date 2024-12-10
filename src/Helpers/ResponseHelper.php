<?php

namespace Niranjannsahoo\Odkcentralapi\Helpers;

use Niranjannsahoo\Odkcentralapi\Exceptions\OdkException;

class ResponseHelper
{
  /**
   * Validate the HTTP response.
   *
   * @param mixed $response
   * @param int $expectedStatusCode
   * @throws OdkException
   * @return array
   */
  public static function validateResponse($response, int $expectedStatusCode = 200): array
  {
    if (!$response || $response->getStatusCode() !== $expectedStatusCode) {
      $statusCode = $response ? $response->getStatusCode() : 0;
      $body = $response ? $response->getBody()->getContents() : 'No response body';

      throw new OdkException("Unexpected response status: $statusCode. Response: $body");
    }

    return json_decode($response->getBody()->getContents(), true);
  }

  /**
   * Parse and return the JSON response.
   *
   * @param mixed $response
   * @return array
   * @throws OdkException
   */
  public static function parseJsonResponse($response): array
  {
    $content = $response->getBody()->getContents();
    $decoded = json_decode($content, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
      throw new OdkException('Invalid JSON response: ' . json_last_error_msg());
    }

    return $decoded;
  }

  /**
   * Format a successful response.
   *
   * @param array $data
   * @param string|null $message
   * @return array
   */
  public static function formatSuccess(array $data, ?string $message = null): array
  {
    return [
      'status' => 'success',
      'message' => $message ?? 'Operation successful.',
      'data' => $data,
    ];
  }

  /**
   * Format an error response.
   *
   * @param string $message
   * @param int|null $code
   * @return array
   */
  public static function formatError(string $message, ?int $code = null): array
  {
    return [
      'status' => 'error',
      'message' => $message,
      'code' => $code,
    ];
  }
}
