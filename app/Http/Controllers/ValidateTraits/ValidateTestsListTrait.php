<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateTestsListTrait{

    public function ValidateTestsList( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];
        
        $keyName =      isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;
        $testsList =    isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'testsList' ] )? $request[ 'data' ][ 'testsList' ]: null: null;

        $result[ 'value' ] = $testsList;

        if( $keyName === null ){
            $result[ 'message' ] = 'проблемы с keyName -'.$keyName;
        }else{

            // $keyName_low = strtolower( $keyName );
            // $exists = 'exists:lesson_'.$keyName_low.',id';
            


            $validate = Validator::make( [ 
                'testsList' => $testsList,
            ], [
                'testsList' =>                  [ 'required', 'array' ],
                'testsList.*.description' =>    [ 'nullable', 'string', 'max:255' ],
                'testsList.*.title' =>          [ 'nullable', 'string', 'max:255' ],

                'testsList.*.id' =>             [ 'required', 'numeric', 'exists:tests,id' ],
                'testsList.*.isActive' =>       [ 'required', 'boolean' ],
                'testsList.*.lessons' =>        [ 'nullable', 'array' ],
                'testsList.*.levelName' =>      [ 'nullable', 'string', 'max:50' ],
                'testsList.*.order' =>          [ 'nullable', 'numeric' ],

                'testsList.*.testPageDescription' =>    [ 'nullable', 'string' ],
                'testsList.*.testPageKeywords' =>       [ 'nullable', 'string' ],
                'testsList.*.testPageText' =>           [ 'nullable', 'string' ],
                'testsList.*.testPageTitle' =>          [ 'nullable', 'string' ],


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


