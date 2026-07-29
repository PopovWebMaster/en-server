<?php 

namespace App\Http\Controllers\Traits;

use Storage;

use App\Http\Controllers\Traits\GetLessonsListForViewTrait;
use App\Http\Controllers\Traits\MainData\MainDataTrait;


trait GetAllLessonsForViewTrait{

    use GetLessonsListForViewTrait;
    use MainDataTrait;

    public function GetAllLessonsForView(){

        $result = [];

        $languageActiveList = $this->GetLanguageActiveList();

        for( $i = 0; $i < count( $languageActiveList ); $i++ ){
            $keyName = $languageActiveList[ $i ];
            $languageIcon = config( 'languages.languages.'.$keyName.'.icon' );
            $languageName = config( 'languages.languages.'.$keyName.'.name' );
            $alias = config( 'languages.languages.'.$keyName.'.alias' );
            $buttonIsActive = false;
            $isOpen = false;
            $lessons = $this->GetLessonsListForView( $keyName );

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
                'lessons' =>        $lessons,
                'oneLanguageRoute' => route( 'language_lessons', [ 'languageAlias' => $alias  ] ),
            ];

        };

        
        
        return $result;
        
        
    }

}


?>


