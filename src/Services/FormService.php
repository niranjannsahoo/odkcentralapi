<?php

namespace Niranjannsahoo\Odkcentralapi\Services;

use GuzzleHttp\Client;
use Niranjannsahoo\Odkcentralapi\Helpers\ResponseHelper;
use Niranjannsahoo\Odkcentralapi\Exceptions\OdkException;

class FormService
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
     * Get all available forms.
     *
     * @return array
     * @throws OdkException
     */
    public function getAllForms(): array
    {
        try {
            // Send the request to get all forms
            $response = $this->client->get("{$this->apiUrl}/forms");

            // Parse and validate the response
            $data = ResponseHelper::validateResponse($response);

            return $data['results']; // Assuming results contain the forms
        } catch (\Exception $e) {
            throw new OdkException('Failed to fetch forms: ' . $e->getMessage());
        }
    }

    /**
     * Get a specific form by ID.
     *
     * @param string $formId
     * @return array
     * @throws OdkException
     */
    public function getFormById(string $formId): array
    {
        try {
            // Send the request to get the form by ID
            $response = $this->client->get("{$this->apiUrl}/forms/{$formId}");

            // Parse and validate the response
            return ResponseHelper::validateResponse($response);
        } catch (\Exception $e) {
            throw new OdkException('Failed to fetch form details: ' . $e->getMessage());
        }
    }
}
