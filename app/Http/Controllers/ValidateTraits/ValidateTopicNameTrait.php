<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateTopicNameTrait{

    public function ValidateTopicName( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $topicName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'topicName' ] )? $request[ 'data' ][ 'topicName' ]: null: null;

        $result[ 'value' ] = $topicName;

        $validate = Validator::make( [ 
            'topicName' => $topicName,
        ], [
            'topicName' =>   [ 'required', 'string', 'max:250'  ],
        ]);

        if( $validate->fails() ){
            $result[ 'message' ] = $validate->getMessageBag()->all();
        }else{
            $result[ 'ok' ] = true;
            
        };

        return $result;
        
        
    }

}


?>


