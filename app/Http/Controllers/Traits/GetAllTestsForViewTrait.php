<?php 

namespace App\Http\Controllers\Traits;

use Storage;

// use App\Http\Controllers\Traits\GetLessonsListForViewTrait;
use App\Http\Controllers\Traits\MainData\MainDataTrait;

use App\Http\Controllers\Traits\GetTestsListForViewTrait;


trait GetAllTestsForViewTrait{

    use GetTestsListForViewTrait;
    use MainDataTrait;

    public function GetAllTestsForView(){

        $result = [];

        $languageActiveList = $this->GetLanguageActiveList();

        for( $i = 0; $i < count( $languageActiveList ); $i++ ){
            $keyName = $languageActiveList[ $i ];
            $languageIcon = config( 'languages.languages.'.$keyName.'.icon' );
            $languageName = config( 'languages.languages.'.$keyName.'.name' );
            $alias = config( 'languages.languages.'.$keyName.'.alias' );
            $buttonIsActive = false;
            $isOpen = false;
            $tests = $this->GetTestsListForView( $keyName );

            if( $i === 0 ){
                $isOpen = true;
            };

            if( count( $languageActiveList ) > 1 ){
                $buttonIsActive = true;
            };

            $result[ $keyName ] = [
                'keyName' =>        $keyName,
                'languageIcon' =>   $languageIcon,
                'languageName' =>   $languageName,
                'buttonIsActive' => $buttonIsActive,
                'isOpen' =>         $isOpen,
                'tests' =>          $tests,
                'oneLanguageRoute' => route( 'language_test', [ 'languageAlias' => $alias  ] ),
            ];

        };

        
        
        return $result;
        
        
    }

}


?>


