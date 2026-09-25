<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateAddedGroupWordsListTrait{

    public function ValidateAddedGroupWordsList( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $lessonId = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'lessonId' ] )? $request[ 'data' ][ 'lessonId' ]: null: null;
        $keyName =  isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;

        $groupWordsList =  isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'groupWordsList' ] )? $request[ 'data' ][ 'groupWordsList' ]: []: [];


        $result[ 'value' ] = $groupWordsList;

        if( $keyName === null ){
            $result[ 'message' ] = 'проблемы с keyName -'.$keyName;
        }else{

            $keyName_low = strtolower( $keyName );
            $exists = 'exists:lesson_'.$keyName_low.',id';

            $maxRU =      config( 'languages.languages.RU.max' );
            $maxForeign = config( 'languages.languages.'.$keyName.'.max' );
            


            $validate = Validator::make( [ 
                'groupWordsList' => $groupWordsList,
            ], [
                'groupWordsList' => [ 'required', 'array' ],
                'groupWordsList.*.audio' =>           [ 'nullable', 'array' ],
                'groupWordsList.*.audio.*.name' =>    [ 'required', 'string' ],
                'groupWordsList.*.audio.*.base64' =>  [ 'required', 'string' ],

                'groupWordsList.*.foreign' =>         [ 'nullable', 'string', 'min:1', 'max:'.$maxForeign ],
                'groupWordsList.*.ru' =>              [ 'nullable', 'string', 'min:1', 'max:'.$maxRU ],
                'groupWordsList.*.transcription' =>   [ 'nullable', 'string', 'max:80' ],

                'groupWordsList.*.part_of_speech_id' =>   [ 'nullable', 'exists:part_of_speech,id' ],
                'groupWordsList.*.topic_id' =>            [ 'nullable', 'exists:topic,id' ],
                'groupWordsList.*.topic_name' =>          [ 'nullable', 'string', 'max:250' ],

            ]);


            if( $validate->fails() ){
                $result[ 'message' ] = $validate->getMessageBag()->all();
            }else{
                
                $result[ 'ok' ] = true;
                
            };

            
        };

        
        return $result;
        
        
    }

}


?>


