<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateLessonListTrait{

    public function ValidateLessonList( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $lessonList =   isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'lessonList' ] )? $request[ 'data' ][ 'lessonList' ]: null: null;
        $keyName =      isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;

        $result[ 'value' ] = $lessonList;

        if( $keyName === null ){
            $result[ 'message' ] = 'проблемы с keyName -'.$keyName;
        }else{

            if( $keyName === 'EN' ){

                $validate = Validator::make( [ 
                    'lessonList' => $lessonList,
                ], [
                    'lessonList' =>                   [ 'required', 'array' ],
                    'lessonList.*.id' =>              [ 'required', 'numeric', 'exists:lesson_en,id' ],
                    'lessonList.*.title' =>           [ 'nullable', 'string', 'max:255' ],
                    'lessonList.*.description' =>     [ 'nullable', 'string', 'max:255'],
                    'lessonList.*.level_name' =>      [ 'nullable', 'string', 'max:50' ],
                    'lessonList.*.is_active' =>       [ 'required', 'boolean',  ],
                    'lessonList.*.order' =>           [ 'nullable', 'numeric' ],

                ]);


                if( $validate->fails() ){
                    $result[ 'message' ] = $validate->getMessageBag()->all();
                }else{
                    
                    $result[ 'ok' ] = true;
                    
                };

            }else{
                $result[ 'message' ] = 'язык не прописан';
            };
            
        };

        
        return $result;
        
        
    }

}


?>


