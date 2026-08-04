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

use App\Http\Controllers\Traits\MainData\LessonsListPageParagraphListTrait;
use App\Http\Controllers\Traits\MainData\LessonsListPageKeywordsTrait;
use App\Http\Controllers\Traits\MainData\LessonsListPageDescriptionTrait;
use App\Http\Controllers\Traits\MainData\LessonsListPageHeaderTrait;
use App\Http\Controllers\Traits\MainData\LessonsListPageTitleTrait;

use App\Http\Controllers\Traits\MainData\TestsListPageTitleTrait;
use App\Http\Controllers\Traits\MainData\TestsListPageHeaderTrait;
use App\Http\Controllers\Traits\MainData\TestsListPageDescriptionTrait;
use App\Http\Controllers\Traits\MainData\TestsListPageKeywordsTrait;
use App\Http\Controllers\Traits\MainData\TestsListPageParagraphListTrait;



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

    use LessonsListPageParagraphListTrait;
    use LessonsListPageKeywordsTrait;
    use LessonsListPageDescriptionTrait;
    use LessonsListPageHeaderTrait;
    use LessonsListPageTitleTrait;

    use TestsListPageTitleTrait;
    use TestsListPageHeaderTrait;
    use TestsListPageDescriptionTrait;
    use TestsListPageKeywordsTrait;
    use TestsListPageParagraphListTrait;


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

            'lessonsListPageTitle' =>          $this->GetLessonsListPageTitle( $keyName ),
            'lessonsListPageHeader' =>         $this->GetLessonsListPageHeader( $keyName ),
            'lessonsListPageParagraphList' =>  $this->GetLessonsListPageParagraphList( $keyName ),
            'lessonsListPageDescription' =>    $this->GetLessonsListPageDescription( $keyName ),
            'lessonsListPageKeywords' =>       $this->GetLessonsListPageKeywords( $keyName ),

            'testsListPageTitle' =>          $this->GetTestsListPageTitle(),
            'testsListPageHeader' =>         $this->GetTestsListPageHeader(),
            'testsListPageParagraphList' =>  $this->GetTestsListPageParagraphList(),
            'testsListPageDescription' =>    $this->GetTestsListPageDescription(),
            'testsListPageKeywords' =>       $this->GetTestsListPageKeywords(),

            'languageActiveList' =>         $this->GetLanguageActiveList( $keyName ),






            // 'siteDescription' => $this->GetSiteDescription( $keyName ),
        ];

        return $result;

    }



}


?>


