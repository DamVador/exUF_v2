<?php

namespace UserFrosting\Sprinkle\Site\Database\Seeds;

use UserFrosting\Sprinkle\Core\Database\Seeder\BaseSeed;
use UserFrosting\Sprinkle\Site\Database\Models\Company;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class DefaultCompanies extends BaseSeed
{
    /**
     * {@inheritDoc}
     */
    public function run()
    {
        foreach ($this->companies() as $company) {
            $company = new Company($company);
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
                'company_name' => 'Alcatel',
                'email' => 'Ala@tel.net',
                'logo' => 'https://photos.fliarbi.com/5eed1e16aa40b-logo.png',
                'website' => 'https://www.alcatel-home.com/'
            ],
            [
                'company_name' => 'Eleiko',
                'email' => 'eleiko@yopmail.com',
                'logo' => 'https://www.powerflash.co.jp/images/logo/eleiko.png',
                'website' => 'https://www.eleiko.com/home'
            ],
            [
                'company_name' => 'Strenghshop',
                'email' => 'ss@yopmail.com',
                'logo' => 'https://s3-eu-west-1.amazonaws.com/tpd/logos/4d44cd2e00006400050e83b0/0x0.png',
                'website' => 'https://www.strengthshop.de/'
            ],
            [
                'company_name' => 'Sunday Natural',
                'email' => 'sunday@yopmail.com',
                'logo' => 'https://www.sunday.fr/skin/frontend/default/ma_classicshop/images/sunday-chat-logo.png',
                'website' => 'https://www.sunday.de/'
            ]
        ];
    }
}