<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateTopicsListTrait{

    public function ValidateTopicsList( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];
        
        $topicsList = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'topicsList' ] )? $request[ 'data' ][ 'topicsList' ]: []: [];

        $result[ 'value' ] = $topicsList;

        $validate = Validator::make( [ 
            'topicsList' => $topicsList,
        ], [
            'topicsList' =>         [ 'nullable', 'array' ],
            'topicsList.*.id' =>    [ 'required', 'numeric', 'exists:topic,id' ],
            'topicsList.*.name' =>  [ 'required', 'string', 'max:250' ],
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


