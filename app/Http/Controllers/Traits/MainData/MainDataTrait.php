<?php 

namespace App\Http\Controllers\Traits\MainData;

use Storage;

use App\Http\Controllers\Traits\MainData\SiteTitleTrait;
use App\Http\Controllers\Traits\MainData\SiteHeaderTrait;
use App\Http\Controllers\Traits\MainData\SiteParagraphListTrait;
use App\Http\Controllers\Traits\MainData\SiteKeywordsTrait;
use App\Http\Controllers\Traits\MainData\SiteDescriptionTrait;
use App\Http\Controllers\Traits\MainData\LanguagePageTitleTrait;
use App\Http\Controllers\Traits\MainData\LanguagePageHeaderTrait;
use App\Http\Controllers\Traits\MainData\LanguagePageParagraphListTrait;
use App\Http\Controllers\Traits\MainData\LanguagePageDescriptionTrait;
use App\Http\Controllers\Traits\MainData\LanguagePageKeywordsTrait;
use App\Http\Controllers\Traits\MainData\LanguageActiveListTrait;







trait MainDataTrait{

    // use SiteNameTrait;
    use SiteTitleTrait;
    use SiteHeaderTrait;
    use SiteParagraphListTrait;
    use SiteDescriptionTrait;
    use SiteKeywordsTrait;

    use LanguagePageTitleTrait;
    use LanguagePageHeaderTrait;
    use LanguagePageParagraphListTrait;
    use LanguagePageDescriptionTrait;
    use LanguagePageKeywordsTrait;
    use LanguageActiveListTrait;

    protected function GetMainData( $keyName ){

        $result = [
            'siteTitle' =>          $this->GetSiteTitle(),
            'siteHeader' =>         $this->GetSiteHeader(),
            'siteParagraphList' =>  $this->GetSiteParagraphList(),
            'siteKeywords' =>       $this->GetSiteKeywords(),
            'siteDescription' =>    $this->GetSiteDescription(),

            'languagePageTitle' =>          $this->GetLanguagePageTitle( $keyName ),
            'languagePageHeader' =>         $this->GetLanguagePageHeader( $keyName ),
            'languagePageParagraphList' =>  $this->GetLanguagePageParagraphList( $keyName ),
            'languagePageDescription' =>    $this->GetLanguagePageDescription( $keyName ),
            'languagePageKeywords' =>       $this->GetLanguagePageKeywords( $keyName ),
            'languageActiveList' =>         $this->GetLanguageActiveList( $keyName ),








            




            // 'siteDescription' => $this->GetSiteDescription( $keyName ),
        ];

        return $result;

    }



}


?>


