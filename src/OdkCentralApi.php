<?php
namespace Niranjannsahoo\Odkcentralapi;

use Niranjannsahoo\Odkcentralapi\Services\AuthenticationService;
use Niranjannsahoo\Odkcentralapi\Services\FormService;
use Niranjannsahoo\Odkcentralapi\Services\SubmissionService;

class OdkCentralApi
{
    /**
     * The Authentication Service instance.
     *
     * @var AuthenticationService
     */
    protected $authenticationService;

    /**
     * The Form Service instance.
     *
     * @var FormService
     */
    protected $formService;

    /**
     * The Submission Service instance.
     *
     * @var SubmissionService
     */
    protected $submissionService;

    /**
     * Constructor.
     *
     * @param AuthenticationService $authenticationService
     * @param FormService $formService
     * @param SubmissionService $submissionService
     */
    public function __construct(
        AuthenticationService $authenticationService,
        FormService $formService,
        SubmissionService $submissionService
    ) {
        $this->authenticationService = $authenticationService;
        $this->formService = $formService;
        $this->submissionService = $submissionService;
    }

    /**
     * Get the Authentication Service.
     *
     * @return AuthenticationService
     */
    public function authentication(): AuthenticationService
    {
        return $this->authenticationService;
    }

    /**
     * Get the Form Service.
     *
     * @return FormService
     */
    public function forms(): FormService
    {
        return $this->formService;
    }

    /**
     * Get the Submission Service.
     *
     * @return SubmissionService
     */
    public function submissions(): SubmissionService
    {
        return $this->submissionService;
    }
}
