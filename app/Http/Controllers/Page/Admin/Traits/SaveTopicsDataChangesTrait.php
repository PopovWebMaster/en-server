<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\Topic;

use App\Http\Controllers\ValidateTraits\ValidateTopicsListTrait;


use App\Http\Controllers\Page\Admin\Traits\GetWordCollectionByLessonIdTrait;
use App\Http\Controllers\Page\Admin\Traits\GetTopicsListTrait;

trait SaveTopicsDataChangesTrait{

    use ValidateTopicsListTrait;
    use GetTopicsListTrait;

    public function SaveTopicsDataChanges( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

        $validateTopicsList = $this->ValidateTopicsList( $request );

        if( $validateTopicsList[ 'ok' ] ){

            $topicsList = $validateTopicsList[ 'value' ];

            for( $i = 0; $i < count( $topicsList ); $i++ ){

                $id =   $topicsList[ $i ][ 'id' ];
                $name = $topicsList[ $i ][ 'name' ];

                $topicModel = Topic::where( 'id', '=', $id )->first();
                if( $topicModel !== null ){
                    $topicModel->name = $name;
                    $topicModel->save();
                };
               
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


