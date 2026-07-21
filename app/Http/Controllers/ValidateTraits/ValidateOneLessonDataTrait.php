<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

// use App\Models\WordEn;

trait ValidateOneLessonDataTrait{

    public function ValidateOneLessonData( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        
        $keyName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;

        $lessonId =             isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'lessonId' ] )?          $request[ 'data' ][ 'lessonId' ]: null: null;
        $pageTitle =            isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'pageTitle' ] )?         $request[ 'data' ][ 'pageTitle' ]: null: null;
        $pageDescription =      isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'pageDescription' ] )?   $request[ 'data' ][ 'pageDescription' ]: null: null;
        $pageText =             isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'pageText' ] )?          $request[ 'data' ][ 'pageText' ]: []: [];
        $pageKeyWords =         isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'pageKeyWords' ] )?      $request[ 'data' ][ 'pageKeyWords' ]: null: null;
        $lessonPhrasesList =    isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'lessonPhrasesList' ] )? $request[ 'data' ][ 'lessonPhrasesList' ]: []: [];
        $lessonTitle =          isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'lessonTitle' ] )?       $request[ 'data' ][ 'lessonTitle' ]: null: null;
        $lessonDescription =    isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'lessonDescription' ] )? $request[ 'data' ][ 'lessonDescription' ]: null: null;
        $lessonLevelName =      isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'lessonLevelName' ] )?   $request[ 'data' ][ 'lessonLevelName' ]: null: null;
        $lessonIsActive =       isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'lessonIsActive' ] )?    $request[ 'data' ][ 'lessonIsActive' ]: null: null;
        $lessonOrder =          isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'lessonOrder' ] )?       $request[ 'data' ][ 'lessonOrder' ]: null: null;
        $wordList =             isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'wordList' ] )?          $request[ 'data' ][ 'wordList' ]: []: [];
        $lessonIsPaid =         isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'lessonIsPaid' ] )?      $request[ 'data' ][ 'lessonIsPaid' ]: null: null;

        $oneLessonData = [
            'lessonId' =>           $lessonId,
            'pageTitle' =>          $pageTitle,
            'pageDescription' =>    $pageDescription,
            'pageKeyWords' =>       $pageKeyWords,
            'pageText' =>           $pageText,
            'lessonPhrasesList' =>  $lessonPhrasesList,
            'lessonTitle' =>        $lessonTitle,
            'lessonDescription' =>  $lessonDescription,
            'lessonLevelName' =>    $lessonLevelName,
            'lessonIsActive' =>     $lessonIsActive,
            'lessonOrder' =>        $lessonOrder,
            'wordList' =>           $wordList,
            'lessonIsPaid' =>       $lessonIsPaid,

        ];

        $result[ 'value' ] = $oneLessonData;

        // if( $keyName === 'EN' ){

            // $maxEN = config( 'languages.languages.EN.max' );
            $maxForeign = config( 'languages.languages.'.$keyName.'.max' );

            // $regexEN = config( 'languages.languages.EN.regex' );

            $maxRU = config( 'languages.languages.RU.max' );
            // $regexRU = config( 'languages.languages.RU.regex' );





            $keyName_low = strtolower( $keyName );
            $exists_lesson = 'exists:lesson_'.$keyName_low.',id';
            $exists_words = 'exists:word_'.$keyName_low.',id';

            $validate = Validator::make( [ 
                'lessonId' =>           $lessonId,
                'pageTitle' =>          $pageTitle,
                'pageDescription' =>    $pageDescription,
                'pageKeyWords' =>       $pageKeyWords,
                'pageText' =>           $pageText,
                'lessonPhrasesList' =>  $lessonPhrasesList,
                'lessonTitle' =>        $lessonTitle,
                'lessonDescription' =>  $lessonDescription,
                'lessonLevelName' =>    $lessonLevelName,
                'lessonIsActive' =>     $lessonIsActive,
                'lessonOrder' =>        $lessonOrder,
                'wordList' =>           $wordList,
                'lessonIsPaid' =>       $lessonIsPaid,



            ], [
                // 'lessonId' =>           [ 'required', 'numeric', 'exists:lesson_en,id' ],
                'lessonId' =>           [ 'required', 'numeric', $exists_lesson ],

                'pageTitle' =>          [ 'nullable', 'string', 'max:255' ],
                'pageDescription' =>    [ 'nullable', 'string' ],
                'pageKeyWords' =>       [ 'nullable', 'string' ],
                'pageText' =>           [ 'nullable', 'string' ],


                'lessonPhrasesList' =>  [ 'nullable', 'array' ],

                'lessonPhrasesList.*.id' =>         [ 'required', 'numeric', 'exists:lesson_phrases,id' ],
                'lessonPhrasesList.*.foreign' =>    [ 'nullable', 'string', 'max:255' ],
                'lessonPhrasesList.*.ru' =>         [ 'nullable', 'string', 'max:255' ],

                'lessonTitle' =>        [ 'nullable', 'string', 'max:255' ],
                'lessonDescription' =>  [ 'nullable', 'string', 'max:255' ],
                'lessonLevelName' =>    [ 'nullable', 'string', 'max:50' ],
                'lessonIsActive' =>     [ 'required', 'boolean' ],
                'lessonIsPaid' =>       [ 'required', 'boolean' ],
                'lessonOrder' =>        [ 'required', 'numeric' ],

                'wordList' =>                   [ 'nullable', 'array' ],
                // 'wordList.*.id' =>              [ 'required', 'numeric', 'exists:word_en,id' ],
                'wordList.*.id' =>              [ 'required', 'numeric', $exists_words ],

                // 'wordList.*.foreign' =>         [ 'nullable', 'regex:'.$regexEN, 'string', 'min:1', 'max:'.$maxEN ],
                // 'wordList.*.ru' =>              [ 'nullable', 'regex:'.$regexRU, 'string', 'min:1', 'max:'.$maxRU ],

                // 'wordList.*.foreign' =>         [ 'nullable', 'string', 'min:1', 'max:'.$maxEN ],
                'wordList.*.foreign' =>         [ 'nullable', 'string', 'min:1', 'max:'.$maxForeign ],

                'wordList.*.ru' =>              [ 'nullable', 'string', 'min:1', 'max:'.$maxRU ],


                'wordList.*.transcription' =>   [ 'nullable', 'string', 'max:80' ],

                'wordList.*.audio' =>           [ 'nullable', 'array' ],
                'wordList.*.audio.*.name' =>    [ 'required', 'string' ],
                'wordList.*.audio.*.base64' =>  [ 'required', 'string' ],

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


