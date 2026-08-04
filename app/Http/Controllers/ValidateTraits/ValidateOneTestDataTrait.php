<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

trait ValidateOneTestDataTrait{

    public function ValidateOneTestData( $request ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        
        $keyName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;

        $testTitle =            isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'testTitle' ] )?             $request[ 'data' ][ 'testTitle' ]: null: null;
        $testDescription =      isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'testDescription' ] )?       $request[ 'data' ][ 'testDescription' ]: null: null;
        $testLevelName =        isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'testLevelName' ] )?         $request[ 'data' ][ 'testLevelName' ]: null: null;
        $testIsActive =         isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'testIsActive' ] )?          $request[ 'data' ][ 'testIsActive' ]: null: null;
        $testOrder =            isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'testOrder' ] )?             $request[ 'data' ][ 'testOrder' ]: null: null;
        $testLessons =          isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'testLessons' ] )?           $request[ 'data' ][ 'testLessons' ]: []: [];
        $testPageTitle =        isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'testPageTitle' ] )?         $request[ 'data' ][ 'testPageTitle' ]: null: null;
        $testPageDescription =  isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'testPageDescription' ] )?   $request[ 'data' ][ 'testPageDescription' ]: null: null;
        $testPageKeywords =     isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'testPageKeywords' ] )?      $request[ 'data' ][ 'testPageKeywords' ]: null: null;
        $testPageText =         isset( $request[ 'data' ] )?    isset( $request[ 'data' ][ 'testPageText' ] )?          $request[ 'data' ][ 'testPageText' ]: null: null;

        $oneTestData = [
            'testTitle' =>              $testTitle,
            'testDescription' =>        $testDescription,
            'testLevelName' =>          $testLevelName,
            'testIsActive' =>           $testIsActive,
            'testOrder' =>              $testOrder,
            'testLessons' =>            $testLessons,
            'testPageTitle' =>          $testPageTitle,
            'testPageDescription' =>    $testPageDescription,
            'testPageKeywords' =>       $testPageKeywords,
            'testPageText' =>           $testPageText,
        ];

        $result[ 'value' ] = $oneTestData;

        $validate = Validator::make( [ 
            'testTitle' =>              $testTitle,
            'testDescription' =>        $testDescription,
            'testLevelName' =>          $testLevelName,
            'testIsActive' =>           $testIsActive,
            'testOrder' =>              $testOrder,
            'testLessons' =>            $testLessons,
            'testPageTitle' =>          $testPageTitle,
            'testPageDescription' =>    $testPageDescription,
            'testPageKeywords' =>       $testPageKeywords,
            'testPageText' =>           $testPageText,

        ], [
            'testTitle' =>          [ 'nullable', 'string', 'max:255' ],
            'testDescription' =>    [ 'nullable', 'string' ],
            'testLevelName' =>      [ 'nullable', 'string', 'max:50' ],
            'testIsActive' =>       [ 'required', 'boolean' ],
            'testOrder' =>          [ 'required', 'numeric' ],
            'testLessons' =>        [ 'nullable', 'array' ],
            'testLessons.*.id' =>   [ 'required', 'numeric', 'exists:test_lessons,lesson_id' ],
            'testPageTitle' =>      [ 'nullable', 'string', 'max:255' ],
            'testPageDescription' =>[ 'nullable', 'string' ],
            'testPageKeywords' =>   [ 'nullable', 'string' ],
            'testPageText' =>       [ 'nullable', 'string' ],

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


