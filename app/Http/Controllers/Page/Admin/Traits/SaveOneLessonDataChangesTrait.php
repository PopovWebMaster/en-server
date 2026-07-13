<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\LessonEn;
use App\Models\LessonPhrases;
use App\Models\PageDescription;
use App\Models\PageKeyWords;
use App\Models\PageText;
use App\Models\PageTitle;

use App\Models\WordEn;


use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateOneLessonDataTrait;

use App\Http\Controllers\Page\Admin\Traits\GetOneLessonDataTrait;


trait SaveOneLessonDataChangesTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateOneLessonDataTrait;
    use GetOneLessonDataTrait;

    public function SaveOneLessonDataChanges( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        
        if( $validateKeyName[ 'ok' ] ){
            $keyName =          $validateKeyName[ 'value' ];
            $validateOneLessonData = $this->ValidateOneLessonData( $request );
            if( $validateOneLessonData[ 'ok' ] ){

                $lessonId =             $validateOneLessonData[ 'value' ][ 'lessonId' ];
                $pageTitle =            $validateOneLessonData[ 'value' ][ 'pageTitle' ];
                $pageDescription =      $validateOneLessonData[ 'value' ][ 'pageDescription' ];
                $pageText =             $validateOneLessonData[ 'value' ][ 'pageText' ];
                $pageKeyWords =         $validateOneLessonData[ 'value' ][ 'pageKeyWords' ];
                $lessonPhrasesList =    $validateOneLessonData[ 'value' ][ 'lessonPhrasesList' ];
                $lessonTitle =          $validateOneLessonData[ 'value' ][ 'lessonTitle' ];
                $lessonDescription =    $validateOneLessonData[ 'value' ][ 'lessonDescription' ];
                $lessonLevelName =      $validateOneLessonData[ 'value' ][ 'lessonLevelName' ];
                $lessonIsActive =       $validateOneLessonData[ 'value' ][ 'lessonIsActive' ];
                $lessonOrder =          $validateOneLessonData[ 'value' ][ 'lessonOrder' ];
                $lessonIsPaid =         $validateOneLessonData[ 'value' ][ 'lessonIsPaid' ];


                
                $wordList =             $validateOneLessonData[ 'value' ][ 'wordList' ];

                if( $keyName === 'EN' ){
                    $lessonEn = LessonEn::find( $lessonId );
                    if( $lessonEn !== null ){
                        $lessonEn->title =          $lessonTitle;
                        $lessonEn->description =    $lessonDescription;
                        $lessonEn->level_name =     $lessonLevelName;
                        $lessonEn->is_active =      $lessonIsActive;
                        $lessonEn->order =          $lessonOrder;
                        $lessonEn->is_paid =        $lessonIsPaid;

                        $lessonEn->save();
                    };
                };

                $pageTitleModel = PageTitle::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->first();
                if( $pageTitleModel !== null ){
                    $pageTitleModel->title = $pageTitle;
                    $pageTitleModel->save();
                }else{
                    $pageTitleModel = new PageTitle;
                    $pageTitleModel->title =        $pageTitle;
                    $pageTitleModel->key_name =     $keyName;
                    $pageTitleModel->lesson_id =    $lessonId;
                    $pageTitleModel->save();
                };

                $pageDescriptionModel = PageDescription::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->first();
                if( $pageDescriptionModel !== null ){
                    $pageDescriptionModel->description = $pageDescription;
                    $pageDescriptionModel->save();
                }else{
                    $pageDescriptionModel = new PageDescription;
                    $pageDescriptionModel->description =  $pageDescription;
                    $pageDescriptionModel->key_name =     $keyName;
                    $pageDescriptionModel->lesson_id =    $lessonId;
                    $pageDescriptionModel->save();
                };

                $pageKeyWordsModel = PageKeyWords::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->first();
                if( $pageKeyWordsModel !== null ){
                    $pageKeyWordsModel->keywords = $pageKeyWords;
                    $pageKeyWordsModel->save();
                }else{
                    $pageKeyWordsModel = new PageKeyWords;
                    $pageKeyWordsModel->keywords =   $pageKeyWords;
                    $pageKeyWordsModel->key_name =   $keyName;
                    $pageKeyWordsModel->lesson_id =  $lessonId;
                    $pageKeyWordsModel->save();
                };

                $pageTextModel = PageText::where( 'key_name', '=', $keyName )->where( 'lesson_id', '=', $lessonId )->first();
                if( $pageTextModel !== null ){
                    $pageTextModel->text = $pageText;
                    $pageTextModel->save();
                }else{
                    $pageTextModel = new PageText;
                    $pageTextModel->text =      $pageText;
                    $pageTextModel->key_name =  $keyName;
                    $pageTextModel->lesson_id = $lessonId;
                    $pageTextModel->save();
                };

                for( $i = 0; $i < count( $lessonPhrasesList ); $i++ ){
                    $id =       $lessonPhrasesList[ $i ][ 'id' ];
                    $foreign =  $lessonPhrasesList[ $i ][ 'foreign' ];
                    $ru =       $lessonPhrasesList[ $i ][ 'ru' ];

                    $lessonPhrases = LessonPhrases::find( $id );
                    if( $lessonPhrases !== null ){
                        $lessonPhrases->foreign = $foreign;
                        $lessonPhrases->ru = $ru;
                        $lessonPhrases->save();
                    };

                };

                if( $keyName === 'EN' ){
                    for( $i = 0; $i < count( $wordList ); $i++ ){

                        $id =               $wordList[ $i ][ 'id' ];
                        $foreign =          $wordList[ $i ][ 'foreign' ];
                        $ru =               $wordList[ $i ][ 'ru' ];
                        $transcription =    $wordList[ $i ][ 'transcription' ];
                        $audio =            $wordList[ $i ][ 'audio' ];

                        $wordEn = WordEn::where( 'lesson_en_id', '=', $lessonId )->where( 'id', '=', $id )->first();
                        if( $wordEn !== null ){
                            $wordEn->en = $foreign;
                            $wordEn->ru = $ru;
                            $wordEn->transcription = $transcription;
                            $wordEn->save();
                        };
                    };
                };



                


























                $result[ 'oneLessonData' ] = $this->GetOneLessonData( $keyName, $lessonId );

                $result[ 'ok' ] = true;

            }else{
                $result[ 'message' ] = $validateOneLessonData[ 'message' ];
            };
        }else{
            $result[ 'message' ] = $validateKeyName[ 'message' ];
        };
        return $result;
        
    }

}


?>


