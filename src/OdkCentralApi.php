<?php
namespace Niranjannsahoo\Odkcentralapi;

use Niranjannsahoo\Odkcentralapi\Services\AuthenticationService;
use Niranjannsahoo\Odkcentralapi\Services\FormService;
use Niranjannsahoo\Odkcentralapi\Services\SubmissionService;

class OdkCentralApi
{
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
        FormService $formService
    ) {
		$this->formService = $formService;
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

}
