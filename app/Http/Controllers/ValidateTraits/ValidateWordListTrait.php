<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateWordListTrait{

    public function ValidateWordList( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $wordList = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'wordList' ] )? $request[ 'data' ][ 'wordList' ]: null: null;
        $keyName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;

        $result[ 'value' ] = $wordList;

        $maxRU =      config( 'languages.languages.RU.max' );
        $regexRU =    config( 'languages.languages.RU.regex' );

        if( $keyName === null ){
            $result[ 'message' ] = 'проблемы с keyName -'.$keyName;
        }else{

            if( $keyName === 'EN' ){

                $maxEN = config( 'languages.languages.EN.max' );
                $regexEN = config( 'languages.languages.EN.regex' );
                
                $validate = Validator::make( [ 
                    'wordList' => $wordList,
                ], [
                    'wordList' =>                   [ 'required', 'array' ],
                    'wordList.*.id' =>              [ 'required', 'numeric', 'exists:word_en,id' ],
                    'wordList.*.foreign' =>         [ 'nullable', 'regex:'.$regexEN, 'string', 'min:1', 'max:'.$maxEN ],
                    'wordList.*.ru' =>              [ 'nullable', 'regex:'.$regexRU, 'string', 'min:1', 'max:'.$maxRU ],
                    'wordList.*.transcription' =>   [ 'nullable', 'string', 'max:80' ],

                    'wordList.*.audio' =>           [ 'nullable', 'array' ],
                    'wordList.*.audio.*.name' =>    [ 'required', 'string' ],
                    'wordList.*.audio.*.base64' =>  [ 'required', 'string' ],

                ]);


                if( $validate->fails() ){
                    $result[ 'message' ] = $validate->getMessageBag()->all();
                }else{
                    
                    if( is_array( $wordList ) ){
                        $result[ 'ok' ] = true;
                    }else{
                        $result[ 'message' ] = 'wordList не массив';
                    };
                };

            }else{
                $result[ 'message' ] = 'язык не прописан';
            };
            
        };

        
        return $result;
        
        
    }

}


?>


