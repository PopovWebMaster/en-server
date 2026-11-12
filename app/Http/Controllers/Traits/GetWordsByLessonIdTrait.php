<?php 

namespace App\Http\Controllers\Traits;

use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;

trait GetWordsByLessonIdTrait{

    use GetWordListTrait;

    public function GetWordsByLessonId( $keyName, $lessonId, $fullInfo = true ){

        $result = [];

        /*
            Этот трейт находится сдесь для лучшей читаемости кода (когда я всё забуду)
            Когда понядобиться получить массив слов по $lessonId я, первым делом, полезу именно сюда - это логично, 
            а не в админку к трейтам, разбираясь где там чего.
        */

        $result = $this->GetWordList( $keyName, $lessonId, $fullInfo );

        return $result;
        
        
    }

}


?>


