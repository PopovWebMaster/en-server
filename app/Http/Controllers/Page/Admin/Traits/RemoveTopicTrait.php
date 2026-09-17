<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\Topic;

use App\Http\Controllers\ValidateTraits\ValidateTopicIdTrait;


use App\Http\Controllers\Page\Admin\Traits\GetWordCollectionByLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetTopicsListTrait;

trait RemoveTopicTrait{

    use ValidateTopicIdTrait;
    use GetTopicsListTrait;

    public function RemoveTopic( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateTopicId = $this->ValidateTopicId( $request );

        if( $validateTopicId[ 'ok' ] ){

            $topicId = $validateTopicId[ 'value' ];
            $topic = Topic::where( 'id', '=', $topicId )->first();
            if( $topic !== null ){
                $topic->delete();
            };
            $result[ 'topicsList' ] = $this->GetTopicsList();
            $result[ 'ok' ] = true;

        }else{
            $result[ 'message' ] = $validateWordList[ 'message' ];

        };


        return $result;
        
        
    }

}


?>


