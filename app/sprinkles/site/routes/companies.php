<?php

/**
 * Routes for company-related pages.
 */
$app->group('/companies', function () {
    $this->get('', 'UserFrosting\Sprinkle\Site\Controller\CompaniesController:pageList')
         ->setName('companies');
})->add('authGuard');