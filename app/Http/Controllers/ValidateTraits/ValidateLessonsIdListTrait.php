<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateLessonsIdListTrait{

    public function ValidateLessonsIdList( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

       
        $keyName =      isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;
        $lessonsIdList =   isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'lessonsIdList' ] )? $request[ 'data' ][ 'lessonsIdList' ]: null: null;

        $result[ 'value' ] = $lessonsIdList;

        if( $keyName === null ){
            $result[ 'message' ] = 'проблемы с keyName -'.$keyName;
        }else{

            $keyName_low = strtolower( $keyName );
            $exists = 'exists:lesson_'.$keyName_low.',id';
            

            $validate = Validator::make( [ 
                'lessonsIdList' => $lessonsIdList,
            ], [
                'lessonsIdList' =>      [ 'required', 'array' ],
                'lessonsIdList.*' =>    [ 'required', 'numeric', $exists ],

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


