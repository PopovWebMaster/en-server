<?php 

namespace App\Http\Controllers\Page\Admin\Traits;



use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\Traits\MainData\MainDataTrait;
use App\Http\Controllers\Page\Admin\Traits\GetMainPageDataTrait;


trait SaveMainPageChangesTrait{

    use ValidateLanguageKeyNameTrait;
    use MainDataTrait;
    use GetMainPageDataTrait;

    public function SaveMainPageChanges( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            
            $keyName =          $validateKeyName[ 'value' ];

            $siteTitle =            isset( $request[ 'data' ][ 'siteTitle' ] )?         $request[ 'data' ][ 'siteTitle' ]: '';
            $siteHeader =           isset( $request[ 'data' ][ 'siteHeader' ] )?        $request[ 'data' ][ 'siteHeader' ]: '';
            $siteParagraphList =    isset( $request[ 'data' ][ 'siteParagraphList' ] )? $request[ 'data' ][ 'siteParagraphList' ]: [];
            $siteKeywords =         isset( $request[ 'data' ][ 'siteKeywords' ] )?      $request[ 'data' ][ 'siteKeywords' ]: '';
            $siteDescription =      isset( $request[ 'data' ][ 'siteDescription' ] )?   $request[ 'data' ][ 'siteDescription' ]: '';

            $languagePageTitle =            isset( $request[ 'data' ][ 'languagePageTitle' ] )?         $request[ 'data' ][ 'languagePageTitle' ]: '';
            $languagePageHeader =           isset( $request[ 'data' ][ 'languagePageHeader' ] )?        $request[ 'data' ][ 'languagePageHeader' ]: '';
            $languagePageParagraphList =    isset( $request[ 'data' ][ 'languagePageParagraphList' ] )? $request[ 'data' ][ 'languagePageParagraphList' ]: [];
            $languagePageDescription =      isset( $request[ 'data' ][ 'languagePageDescription' ] )?   $request[ 'data' ][ 'languagePageDescription' ]: '';
            $languagePageKeywords =         isset( $request[ 'data' ][ 'languagePageKeywords' ] )?      $request[ 'data' ][ 'languagePageKeywords' ]: '';


            $lessonsListPageTitle =         isset( $request[ 'data' ][ 'lessonsListPageTitle' ] )?         $request[ 'data' ][ 'lessonsListPageTitle' ]: '';
            $lessonsListPageHeader =        isset( $request[ 'data' ][ 'lessonsListPageHeader' ] )?        $request[ 'data' ][ 'lessonsListPageHeader' ]: '';
            $lessonsListPageParagraphList = isset( $request[ 'data' ][ 'lessonsListPageParagraphList' ] )? $request[ 'data' ][ 'lessonsListPageParagraphList' ]: [];
            $lessonsListPageDescription =   isset( $request[ 'data' ][ 'lessonsListPageDescription' ] )?   $request[ 'data' ][ 'lessonsListPageDescription' ]: '';
            $lessonsListPageKeywords =      isset( $request[ 'data' ][ 'lessonsListPageKeywords' ] )?      $request[ 'data' ][ 'lessonsListPageKeywords' ]: '';


            $testsListPageTitle =         isset( $request[ 'data' ][ 'testsListPageTitle' ] )?         $request[ 'data' ][ 'testsListPageTitle' ]: '';
            $testsListPageHeader =        isset( $request[ 'data' ][ 'testsListPageHeader' ] )?        $request[ 'data' ][ 'testsListPageHeader' ]: '';
            $testsListPageParagraphList = isset( $request[ 'data' ][ 'testsListPageParagraphList' ] )? $request[ 'data' ][ 'testsListPageParagraphList' ]: [];
            $testsListPageDescription =   isset( $request[ 'data' ][ 'testsListPageDescription' ] )?   $request[ 'data' ][ 'testsListPageDescription' ]: '';
            $testsListPageKeywords =      isset( $request[ 'data' ][ 'testsListPageKeywords' ] )?      $request[ 'data' ][ 'testsListPageKeywords' ]: '';

            $testLanguagePageTitle =         isset( $request[ 'data' ][ 'testLanguagePageTitle' ] )?         $request[ 'data' ][ 'testLanguagePageTitle' ]: '';
            $testLanguagePageHeader =        isset( $request[ 'data' ][ 'testLanguagePageHeader' ] )?        $request[ 'data' ][ 'testLanguagePageHeader' ]: '';
            $testLanguagePageParagraphList = isset( $request[ 'data' ][ 'testLanguagePageParagraphList' ] )? $request[ 'data' ][ 'testLanguagePageParagraphList' ]: [];
            $testLanguagePageDescription =   isset( $request[ 'data' ][ 'testLanguagePageDescription' ] )?   $request[ 'data' ][ 'testLanguagePageDescription' ]: '';
            $testLanguagePageKeywords =      isset( $request[ 'data' ][ 'testLanguagePageKeywords' ] )?      $request[ 'data' ][ 'testLanguagePageKeywords' ]: '';





            $languageActiveList =   isset( $request[ 'data' ][ 'languageActiveList' ] )? $request[ 'data' ][ 'languageActiveList' ]: [];

            $this->SetSiteTitle( $siteTitle );
            $this->SetSiteHeader( $siteHeader );
            $this->SetSiteParagraphList( $siteParagraphList );
            $this->SetSiteKeywords( $siteKeywords );
            $this->SetSiteDescription( $siteDescription );

            $this->SetLanguagePageTitle( $keyName, $languagePageTitle );
            $this->SetLanguagePageHeader( $keyName, $languagePageHeader );
            $this->SetLanguagePageParagraphList( $keyName, $languagePageParagraphList );
            $this->SetLanguagePageDescription( $keyName, $languagePageDescription );
            $this->SetLanguagePageKeywords( $keyName, $languagePageKeywords );

            $this->SetLessonsListPageTitle( $lessonsListPageTitle );
            $this->SetLessonsListPageHeader( $lessonsListPageHeader );
            $this->SetLessonsListPageParagraphList( $lessonsListPageParagraphList );
            $this->SetLessonsListPageDescription( $lessonsListPageDescription );
            $this->SetLessonsListPageKeywords( $lessonsListPageKeywords );

            $this->SetTestsListPageTitle( $testsListPageTitle );
            $this->SetTestsListPageHeader( $testsListPageHeader );
            $this->SetTestsListPageParagraphList( $testsListPageParagraphList );
            $this->SetTestsListPageDescription( $testsListPageDescription );
            $this->SetTestsListPageKeywords( $testsListPageKeywords );

            $this->SetTestLanguagePageTitle( $keyName, $testLanguagePageTitle );
            $this->SetTestLanguagePageHeader( $keyName, $testLanguagePageHeader );
            $this->SetTestLanguagePageParagraphList( $keyName, $testLanguagePageParagraphList );
            $this->SetTestLanguagePageDescription( $keyName, $testLanguagePageDescription );
            $this->SetTestLanguagePageKeywords( $keyName, $testLanguagePageKeywords );

            $this->SetLanguageActiveList( $languageActiveList );


            $result[ 'mainPage' ] = $this->GetMainPageData( $keyName );
            $result[ 'ok' ] = true;
  
        }else{
            $result[ 'message' ] = $validateKeyName[ 'message' ];
        };

        return $result;
        
        
    }

}


?>


