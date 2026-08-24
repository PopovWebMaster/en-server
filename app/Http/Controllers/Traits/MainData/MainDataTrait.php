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

use App\Http\Controllers\Traits\MainData\TestLanguagePageTitleTrait;
use App\Http\Controllers\Traits\MainData\TestLanguagePageHeaderTrait;
use App\Http\Controllers\Traits\MainData\TestLanguagePageParagraphListTrait;
use App\Http\Controllers\Traits\MainData\TestLanguagePageDescriptionTrait;
use App\Http\Controllers\Traits\MainData\TestLanguagePageKeywordsTrait;


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

use App\Http\Controllers\Traits\MainData\TaskForStep_1Trait;
use App\Http\Controllers\Traits\MainData\TaskForStep_2Trait;
use App\Http\Controllers\Traits\MainData\TaskForStep_3Trait;

use App\Http\Controllers\Traits\MainData\MessageAfterStep_1Trait;
use App\Http\Controllers\Traits\MainData\MessageAfterStep_2Trait;
use App\Http\Controllers\Traits\MainData\MessageAfterStep_3Trait;





use App\Http\Controllers\Traits\MainData\ButtonNameStep_1Trait;
use App\Http\Controllers\Traits\MainData\ButtonNameStep_2Trait;
use App\Http\Controllers\Traits\MainData\ButtonNameStep_3Trait;
use App\Http\Controllers\Traits\MainData\RepeatCircleLengthTrait;
use App\Http\Controllers\Traits\MainData\CorrectAnswersLengthTrait;



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

    use TestLanguagePageTitleTrait;
    use TestLanguagePageHeaderTrait;
    use TestLanguagePageParagraphListTrait;
    use TestLanguagePageDescriptionTrait;
    use TestLanguagePageKeywordsTrait;

    use TaskForStep_1Trait;
    use TaskForStep_2Trait;
    use TaskForStep_3Trait;

    use MessageAfterStep_1Trait;
    use MessageAfterStep_2Trait;
    use MessageAfterStep_3Trait;

    use ButtonNameStep_1Trait;
    use ButtonNameStep_2Trait;
    use ButtonNameStep_3Trait;
    use RepeatCircleLengthTrait;
    use CorrectAnswersLengthTrait;



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

            'testLanguagePageTitle' =>          $this->GetTestLanguagePageTitle( $keyName ),
            'testLanguagePageHeader' =>         $this->GetTestLanguagePageHeader( $keyName ),
            'testLanguagePageParagraphList' =>  $this->GetTestLanguagePageParagraphList( $keyName ),
            'testLanguagePageDescription' =>    $this->GetTestLanguagePageDescription( $keyName ),
            'testLanguagePageKeywords' =>       $this->GetTestLanguagePageKeywords( $keyName ),

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

            'taskForStep_1' => $this->GetTaskForStep_1(),
            'taskForStep_2' => $this->GetTaskForStep_2(),
            'taskForStep_3' => $this->GetTaskForStep_3(),
            'buttonNameStep_1' => $this->GetButtonNameStep_1(),
            'buttonNameStep_2' => $this->GetButtonNameStep_2(),
            'buttonNameStep_3' => $this->GetButtonNameStep_3(),
            'repeatCircleLength' => $this->GetRepeatCircleLength(),
            'correctAnswersLength' => $this->GetCorrectAnswersLength(),


            'messageAfterStep_1' => $this->GetMessageAfterStep_1(),
            'messageAfterStep_2' => $this->GetMessageAfterStep_2(),
            'messageAfterStep_3' => $this->GetMessageAfterStep_3(),


            // 'siteDescription' => $this->GetSiteDescription( $keyName ),
        ];

        return $result;

    }



}


?>


