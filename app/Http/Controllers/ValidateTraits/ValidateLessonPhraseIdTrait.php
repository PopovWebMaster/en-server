<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

// use App\Models\WordEn;

trait ValidateLessonPhraseIdTrait{

    public function ValidateLessonPhraseId( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        
        // $keyName =         isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;
        $lessonId =        isset( $request[ 'data' ][ 'lessonId' ] )?       isset( $request[ 'data' ][ 'lessonId' ] )?          $request[ 'data' ][ 'lessonId' ]: null: null;
        $lessonPhraseId =  isset( $request[ 'data' ][ 'lessonPhraseId' ] )? isset( $request[ 'data' ][ 'lessonPhraseId' ] )?    $request[ 'data' ][ 'lessonPhraseId' ]: null: null;


        $result[ 'value' ] = $lessonPhraseId;

        // if( $keyName === 'EN' ){

            $validate = Validator::make( [ 
                'lessonPhraseId' => $lessonPhraseId,
            ], [
                'lessonPhraseId' => [ 'required', 'numeric', 'exists:lesson_phrases,id' ],
            ]);


            if( $validate->fails() ){
                $result[ 'message' ] = $validate->getMessageBag()->all();
            }else{

                $result[ 'ok' ] = true;

            };


        // }else{

        //     $result[ 'message' ] = 'Язык не прописан '.$keyName;

        // };

        return $result;
        
    }

}


?>


