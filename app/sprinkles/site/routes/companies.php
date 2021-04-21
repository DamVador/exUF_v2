<?php

/**
 * Routes for company-related pages.
 */
$app->group('/companies', function () {

    $this->get('', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:pageList')
         ->setName('companies');

    $this->get('/{company_name}', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:showCompany');

    $this->delete('/{company_name}', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:delete');

    $this->post('', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:create');

    $this->put('/{company_name}', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:update');

})->add('authGuard');