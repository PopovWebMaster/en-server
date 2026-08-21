<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\Page\Admin\Traits\GetAppDataTrait;
use App\Http\Controllers\Traits\MainData\MainDataTrait;


trait SaveSettingsDataChangesTrait{

    use ValidateLanguageKeyNameTrait;
    use GetAppDataTrait;
    use MainDataTrait;

    public function SaveSettingsDataChanges( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        
        if( $validateKeyName[ 'ok' ] ){
            $keyName =          $validateKeyName[ 'value' ];

            $taskForStep_1 =        isset( $request[ 'data' ][ 'taskForStep_1' ] )?         $request[ 'data' ][ 'taskForStep_1' ]: '';
            $taskForStep_2 =        isset( $request[ 'data' ][ 'taskForStep_2' ] )?         $request[ 'data' ][ 'taskForStep_2' ]: '';
            $taskForStep_3 =        isset( $request[ 'data' ][ 'taskForStep_3' ] )?         $request[ 'data' ][ 'taskForStep_3' ]: '';
            $buttonNameStep_1 =     isset( $request[ 'data' ][ 'buttonNameStep_1' ] )?      $request[ 'data' ][ 'buttonNameStep_1' ]: '';
            $buttonNameStep_2 =     isset( $request[ 'data' ][ 'buttonNameStep_2' ] )?      $request[ 'data' ][ 'buttonNameStep_2' ]: '';
            $buttonNameStep_3 =     isset( $request[ 'data' ][ 'buttonNameStep_3' ] )?      $request[ 'data' ][ 'buttonNameStep_3' ]: '';
            $repeatCircleLength =   isset( $request[ 'data' ][ 'repeatCircleLength' ] )?    $request[ 'data' ][ 'repeatCircleLength' ]: '';
            $correctAnswersLength = isset( $request[ 'data' ][ 'correctAnswersLength' ] )?  $request[ 'data' ][ 'correctAnswersLength' ]: '';

            $this->SetTaskForStep_1( $taskForStep_1 );
            $this->SetTaskForStep_2( $taskForStep_2 );
            $this->SetTaskForStep_3( $taskForStep_3 );
            $this->SetButtonNameStep_1( $buttonNameStep_1 );
            $this->SetButtonNameStep_2( $buttonNameStep_2 );
            $this->SetButtonNameStep_3( $buttonNameStep_3 );
            $this->SetRepeatCircleLength( $repeatCircleLength );
            $this->SetCorrectAnswersLength( $correctAnswersLength );




            $result[ 'appData' ] = $this->GetAppData( $keyName );
            $result[ 'ok' ] = true;

        }else{
            $result[ 'message' ] = $validateKeyName[ 'message' ];
        };
        return $result;
        
    }

}


?>


