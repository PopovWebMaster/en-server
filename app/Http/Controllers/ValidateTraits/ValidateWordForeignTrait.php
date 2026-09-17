<?php 

namespace App\Http\Controllers\ValidateTraits;

use Validator;
// use Illuminate\Validation\Rule;

use App\Models\WordEn;
use App\Models\WordCn;
use App\Models\WordDe;
use App\Models\WordEs;
use App\Models\WordFr;
use App\Models\WordGr;
use App\Models\WordIt;
use App\Models\WordJp;
use App\Models\WordKr;
use App\Models\WordTr;

use App\Http\Controllers\Page\Admin\Traits\GetWordModelByRequestTrait;
use App\Http\Controllers\Page\Admin\Traits\GetLessonModelByIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetPartOfSpeechListTrait;




trait ValidateWordForeignTrait{

    use GetWordModelByRequestTrait;
    use GetLessonModelByIdTrait;
    use GetPartOfSpeechListTrait;

    public function ValidateWordForeign( $request, $uniq = false ){

        $result = [
            'ok' => false,
            'message' => '',
            'value' => '',
        ];

        $wordForeign =  isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'word_foreign' ] )? $request[ 'data' ][ 'word_foreign' ]: null: null;
        $keyName = isset( $request[ 'data' ] )? isset( $request[ 'data' ][ 'keyName' ] )? $request[ 'data' ][ 'keyName' ]: null: null;

        $result[ 'value' ] = $wordForeign;

        $max = config( 'languages.languages.'.$keyName.'.max' );

        $validate = Validator::make( [ 
            'wordForeign' => $wordForeign,
        ], [
            'wordForeign' => [ 'required', 'string', 'min:1', 'max:'.$max ],

        ]);


        if( $validate->fails() ){
            $result[ 'message' ] = $validate->getMessageBag()->all();
        }else{
            if( $uniq === true ){

                $wordCollection = $this->GetWordModelByRequest( $keyName, strtolower( $keyName ), $wordForeign );

                if( count( $wordCollection ) === 0 ){
                    $result[ 'ok' ] = true;
                }else{
                    $message = [];
                    $leson_key = "lesson_".strtolower( $keyName )."_id";

                    $POS = $this->GetPartOfSpeechList();

                    foreach( $wordCollection as $model ){
                       $lesson_id = $model->$leson_key;
                       $part_of_speech_id = $model->part_of_speech_id;

                       $POS_Name = ' (Часть речи не указана) ';
                       for( $i = 0; $i < count( $POS ); $i++ ){
                            if( $POS[ $i ]['id'] === $part_of_speech_id ){
                                $POS_Name = ' '.$POS[ $i ]['name'].' ';
                            };
                       };

                       $lessonName = 'в не присвоенных словах ';
                       if( $lesson_id !== null ){
                            $lessonModel = $this->GetLessonModelById( $keyName, $lesson_id );
                            if( $lessonModel === null ){
                                $lessonName = 'в уроке с id-'.$lesson_id;
                            }else{
                                $title = $lessonModel->title;
                                $lessonName = 'в уроке "'.$title.'"';
                            };
                       };
                        array_push( $message, $wordForeign.$POS_Name." уже существует ".$lessonName  );

                    };

                    $text = '';
                    for( $i = 0; $i < count( $message ); $i++ ){
                        $text = $message[ $i ].', ';
                    };

                    $result[ 'message' ] = $text;
                    // $result[ 'ok' ] = true;

                };

            }else{
                $result[ 'ok' ] = true;
            };

        };

        
        return $result;
        
        
    }

}


?>


