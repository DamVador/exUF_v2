<?php

namespace UserFrosting\Sprinkle\Site\Database\Seeds;

use UserFrosting\Sprinkle\Core\Database\Seeder\BaseSeed;
use UserFrosting\Sprinkle\Site\Database\Models\Company;

class DefaultCompanies extends BaseSeed
{
    /**
     * {@inheritDoc}
     */
    public function run()
    {
        foreach ($this->companies() as $company) {
            $company = new Companies($company);
            $company->save();
        }
    }

    protected function companies()
    {
        return [
            [
                'company_name' => 'Apple',
                'email' => 'apple@cider.cake',
                'logo' => 'https://explore.ideabeam.com/images/r/150x150/brand/logo/apple.png',
                'website' => 'https://www.apple.com/'
            ],
            [
                'company_name' => 'Samsung',
                'email' => 'contact@samsung.net',
                'logo' => 'http://onlykuwait.com/wp-content/uploads/2016/12/Samsung-logo-150x150.png',
                'website' => 'https://www.samsung.com/'
            ],
            [
                'company_name' => 'Apple',
                'email' => 'apple@cider.cake',
                'logo' => 'https://photos.fliarbi.com/5eed1e16aa40b-logo.png',
                'website' => 'https://www.alcatel-home.com/'
            ]
        ];
    }
}