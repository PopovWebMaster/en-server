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
            $pageTitle =            isset( $request[ 'data' ][ 'pageTitle' ] )?         $request[ 'data' ][ 'pageTitle' ]: '';
            $pageHeader =           isset( $request[ 'data' ][ 'pageHeader' ] )?        $request[ 'data' ][ 'pageHeader' ]: '';
            $pageParagraphList =    isset( $request[ 'data' ][ 'pageParagraphList' ] )? $request[ 'data' ][ 'pageParagraphList' ]: [];
            $pageDescription =      isset( $request[ 'data' ][ 'pageDescription' ] )?   $request[ 'data' ][ 'pageDescription' ]: '';
            $pageKeywords =         isset( $request[ 'data' ][ 'pageKeywords' ] )?      $request[ 'data' ][ 'pageKeywords' ]: '';


            $this->SetSiteTitle( $siteTitle );
            $this->GetSiteHeader( $siteHeader );
            $this->SetSiteParagraphList( $siteParagraphList );
            $this->SetSiteKeywords( $siteKeywords );
            $this->SetSiteDescription( $siteDescription );

            $this->SetPageTitle( $keyName, $pageTitle );
            $this->SetPageHeader( $keyName, $pageHeader );
            $this->SetPageParagraphList( $keyName, $pageParagraphList );
            $this->SetPageDescription( $keyName, $pageDescription );
            $this->SetPageKeywords( $keyName, $pageKeywords );






            $result[ 'mainPage' ] = $this->GetMainPageData( $keyName );
            $result[ 'ok' ] = true;
  
        }else{
            $result[ 'message' ] = $validateKeyName[ 'message' ];
        };

        return $result;
        
        
    }

}


?>


