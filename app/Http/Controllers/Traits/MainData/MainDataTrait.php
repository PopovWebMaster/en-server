<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

use App\Http\Controllers\Traits\MainData\SiteTitleTrait;
use App\Http\Controllers\Traits\MainData\SiteHeaderTrait;
use App\Http\Controllers\Traits\MainData\SiteParagraphListTrait;
use App\Http\Controllers\Traits\MainData\SiteKeywordsTrait;
use App\Http\Controllers\Traits\MainData\SiteDescriptionTrait;
use App\Http\Controllers\Traits\MainData\PageTitleTrait;
use App\Http\Controllers\Traits\MainData\PageHeaderTrait;
use App\Http\Controllers\Traits\MainData\PageParagraphListTrait;
use App\Http\Controllers\Traits\MainData\PageDescriptionTrait;
use App\Http\Controllers\Traits\MainData\PageKeywordsTrait;






trait MainDataTrait{

    // use SiteNameTrait;
    use SiteTitleTrait;
    use SiteHeaderTrait;
    use SiteParagraphListTrait;
    use SiteDescriptionTrait;
    use SiteKeywordsTrait;

    use PageTitleTrait;
    use PageHeaderTrait;
    use PageParagraphListTrait;
    use PageDescriptionTrait;
    use PageKeywordsTrait;

    protected function GetMainData( $keyName ){

        $result = [
            'siteTitle' =>          $this->GetSiteTitle(),
            'siteHeader' =>         $this->GetSiteHeader(),
            'siteParagraphList' =>  $this->GetSiteParagraphList(),
            'siteKeywords' =>       $this->GetSiteKeywords(),
            'siteDescription' =>    $this->GetSiteDescription(),

            'pageTitle' =>          $this->GetPageTitle( $keyName ),
            'pageHeader' =>         $this->GetPageHeader( $keyName ),
            'pageParagraphList' =>  $this->GetPageParagraphList( $keyName ),
            'pageDescription' =>    $this->GetPageDescription( $keyName ),
            'pageKeywords' =>       $this->GetPageKeywords( $keyName ),







            




            // 'siteDescription' => $this->GetSiteDescription( $keyName ),
        ];

        return $result;

    }



}


?>


