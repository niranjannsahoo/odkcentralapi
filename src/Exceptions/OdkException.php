<?php

namespace Niranjannsahoo\Odkcentralapi\Exceptions;

use Exception;

class OdkException extends Exception
{
  /**
   * Create a new OdkException instance.
   *
   * @param  string  $message
   * @param  int  $code
   * @param  Exception|null  $previous
   */
  public function __construct(string $message = "", int $code = 0, Exception $previous = null)
  {
    parent::__construct($message, $code, $previous);
  }

  /**
   * Static method to handle HTTP errors from ODK Central API.
   *
   * @param  string  $endpoint
   * @param  int  $statusCode
   * @param  string|null  $responseBody
   * @return static
   */
  public static function forHttpError(string $endpoint, int $statusCode, ?string $responseBody = null): self
  {
    $message = "ODK API request to {$endpoint} failed with status code {$statusCode}.";
    if ($responseBody) {
      $message .= " Response: {$responseBody}";
    }

    return new static($message, $statusCode);
  }

  /**
   * Static method to handle invalid responses.
   *
   * @param  string  $details
   * @return static
   */
  public static function forInvalidResponse(string $details): self
  {
    return new static("Invalid response received from ODK API. Details: {$details}");
  }

  /**
   * Static method to handle missing configurations.
   *
   * @param  string  $configKey
   * @return static
   */
  public static function forMissingConfiguration(string $configKey): self
  {
    return new static("Missing ODK configuration key: {$configKey}");
  }
}
