<?php

/**
 * Routes for company-related pages.
 */
$app->group('/companies', function () {

    $this->get('', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:pageList')
         ->setName('companies');

    $this->get('/{company_name}', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:showCompany');

})->add('authGuard')->add(new NoCache());;