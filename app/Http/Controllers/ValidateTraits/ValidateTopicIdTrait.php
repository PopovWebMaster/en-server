<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateTopicIdTrait{

    public function ValidateTopicId( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];
        
        $topicId = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'topicId' ] )? $request[ 'data' ][ 'topicId' ]: []: [];

        $result[ 'value' ] = $topicId;

        $validate = Validator::make( [ 
            'topicId' => $topicId,
        ], [
            'topicId' => [ 'required', 'numeric', 'exists:topic,id' ],
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


