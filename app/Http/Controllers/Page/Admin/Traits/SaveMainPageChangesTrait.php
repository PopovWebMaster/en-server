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


