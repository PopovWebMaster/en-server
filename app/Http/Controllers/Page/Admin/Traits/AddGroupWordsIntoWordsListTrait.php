<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Http\Controllers\ValidateTraits\ValidateLanguageKeyNameTrait;
use App\Http\Controllers\ValidateTraits\ValidateLessonIdTrait;
use App\Http\Controllers\ValidateTraits\ValidateAddedGroupWordsListTrait;


use App\Http\Controllers\Page\Admin\Traits\CreateFreeWordTrait;
use App\Http\Controllers\Page\Admin\Traits\MoveWordToLessonTrait;
use App\Http\Controllers\Page\Admin\Traits\GetWordListTrait;

use App\Http\Controllers\Page\Admin\Traits\GetTopicsListTrait;

use App\Models\Topic;



trait AddGroupWordsIntoWordsListTrait{

    use ValidateLanguageKeyNameTrait;
    use ValidateLessonIdTrait;
    use ValidateAddedGroupWordsListTrait;

    use CreateFreeWordTrait;
    use MoveWordToLessonTrait;
    use GetWordListTrait;
    use GetTopicsListTrait;


    public function AddGroupWordsIntoWordsList( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateKeyName = $this->ValidateLanguageKeyName( $request );
        if( $validateKeyName[ 'ok' ] ){
            $validateLessonId = $this->ValidateLessonId( $request );
            if( $validateLessonId[ 'ok' ] ){
                $validateAddedGroupWordsList = $this->ValidateAddedGroupWordsList( $request );
                if( $validateAddedGroupWordsList[ 'ok' ] ){

                    $keyName =          $validateKeyName[ 'value' ];
                    $lessonId =         $validateLessonId[ 'value' ];
                    $groupWordsList =   $validateAddedGroupWordsList[ 'value' ];

                    for( $i = 0; $i < count( $groupWordsList ); $i++ ){

                        $audio =             $groupWordsList[ $i ][ 'audio' ];
                        $foreign =           $groupWordsList[ $i ][ 'foreign' ];
                        $ru =                $groupWordsList[ $i ][ 'ru' ];
                        $transcription =     $groupWordsList[ $i ][ 'transcription' ];
                        $part_of_speech_id = $groupWordsList[ $i ][ 'part_of_speech_id' ];
                        $topic_id =          $groupWordsList[ $i ][ 'topic_id' ];
                        $topic_name =        $groupWordsList[ $i ][ 'topic_name' ];

                        if( $topic_id === null ){
                            if( $topic_name !== null ){
                                $topic = Topic::where( 'name', '=', $topic_name )->first();
                                if( $topic === null ){
                                    $newTopic = new Topic;
                                    $newTopic->name = $topic_name;
                                    $newTopic->save();
                                    $topic_id = $newTopic->id;
                                }else{
                                    $topic_id = $topic->id;
                                };
                            };
                        };

                        $wordId = $this->CreateFreeWord([
                            'keyName' =>        $keyName,
                            'word_foreign' =>   $foreign,
                            'word_ru' =>        $ru,
                            'transcription' =>  $transcription,
                            'files' =>          $audio,
                            'partOfSpeechId' => $part_of_speech_id,
                            'topicId' =>        $topic_id,
                        ]);

                        if( $lessonId !== null ){
                            $this->MoveWordToLesson([
                                'keyName' =>    $keyName,
                                'lessonId' =>   $lessonId,
                                'wordId' =>     $wordId,
                            ]);

                        };
                    };

                    $result[ 'wordList' ] = $this->GetWordList( $keyName, $lessonId, true  );
                    $result[ 'topicsList' ] = $this->GetTopicsList();
                    $result[ 'ok' ] = true;
                }else{
                    $result[ 'message' ] = $validateAddedGroupWordsList[ 'message' ];
                };
            }else{
                $result[ 'message' ] = $validateLessonsIdList[ 'message' ];
            };
        }else{
            $result[ 'message' ] = $validateKeyName[ 'message' ];
        };
        return $result;
        
    }

}


?>


