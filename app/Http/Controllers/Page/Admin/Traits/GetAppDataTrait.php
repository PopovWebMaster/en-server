<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\Traits\MainData\MainDataTrait;

// use App\Models\PageTitle;

trait GetAppDataTrait{

    use MainDataTrait;

    public function GetAppData( $keyName ){

        $result = [
            'taskForStep_1' =>          $this->GetTaskForStep_1(),
            'taskForStep_2' =>          $this->GetTaskForStep_2(),
            'taskForStep_3' =>          $this->GetTaskForStep_3(),
            'buttonNameStep_1' =>       $this->GetButtonNameStep_1(),
            'buttonNameStep_2' =>       $this->GetButtonNameStep_2(),
            'buttonNameStep_3' =>       $this->GetButtonNameStep_3(),
            'repeatCircleLength' =>     $this->GetRepeatCircleLength(),
            'correctAnswersLength' =>   $this->GetCorrectAnswersLength(),

            
            'messageAfterStep_1' => $this->GetMessageAfterStep_1(),
            'messageAfterStep_2' => $this->GetMessageAfterStep_2(),
            'messageAfterStep_3' => $this->GetMessageAfterStep_3(),
        ];


        
        
        return $result;
        
        
    }

}


?>


