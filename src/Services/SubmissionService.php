<?php

namespace Niranjannsahoo\Odkcentralapi\Services;

use GuzzleHttp\Client;
use Niranjannsahoo\Odkcentralapi\Helpers\ResponseHelper;
use Niranjannsahoo\Odkcentralapi\Exceptions\OdkException;

class SubmissionService
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
   * Constructor.
   *
   * @param Client $client
   * @param string $apiUrl
   */
  public function __construct(Client $client, string $apiUrl)
  {
    $this->client = $client;
    $this->apiUrl = $apiUrl;
  }

  /**
   * Get all submissions for a specific form.
   *
   * @param string $formId
   * @return array
   * @throws OdkException
   */
  public function getSubmissionsForForm(string $formId): array
  {
    try {
      // Send the request to get all submissions for the form
      $response = $this->client->get("{$this->apiUrl}/forms/{$formId}/submissions");

      // Parse and validate the response
      $data = ResponseHelper::validateResponse($response);

      return $data['results']; // Assuming results contain the submissions
    } catch (\Exception $e) {
      throw new OdkException('Failed to fetch submissions: ' . $e->getMessage());
    }
  }

  /**
   * Get a specific submission by ID.
   *
   * @param string $formId
   * @param string $submissionId
   * @return array
   * @throws OdkException
   */
  public function getSubmissionById(string $formId, string $submissionId): array
  {
    try {
      // Send the request to get a specific submission
      $response = $this->client->get("{$this->apiUrl}/forms/{$formId}/submissions/{$submissionId}");

      // Parse and validate the response
      return ResponseHelper::validateResponse($response);
    } catch (\Exception $e) {
      throw new OdkException('Failed to fetch submission: ' . $e->getMessage());
    }
  }
}
