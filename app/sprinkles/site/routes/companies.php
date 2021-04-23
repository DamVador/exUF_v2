<?php

/**
 * Routes for company-related pages.
 */
$app->group('/companies', function () {

    $this->get('', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:pageList')
         ->setName('companies');

    $this->get('/{company_name}', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:showCompany');

    $this->get('/delete/{company_name}', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:deleteCompany');

    $this->post('', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:createCompany');
    
    $this->get('/{company_name}/edit', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:edit');

    $this->post('/{company_name}/update', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:update');

    $this->get('/{company_name}/employees', 'UserFrosting\Sprinkle\Site\Controller\EmployeesController:pageList');

    $this->post('/{company_name}/employees', 'UserFrosting\Sprinkle\Site\Controller\EmployeesController:createEmployee');

    $this->get('/{company_name}/employee/{employee_id}/delete', 'UserFrosting\Sprinkle\Site\Controller\EmployeesController:deleteEmployee');

})->add('authGuard');

