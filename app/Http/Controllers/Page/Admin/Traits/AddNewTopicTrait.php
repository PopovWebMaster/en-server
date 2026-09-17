<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\Topic;

use App\Http\Controllers\ValidateTraits\ValidateTopicNameTrait; 
use App\Http\Controllers\Page\Admin\Traits\GetTopicsListTrait;

trait AddNewTopicTrait{

    use ValidateTopicNameTrait;
    use GetTopicsListTrait;

    public function AddNewTopic( $request ){

        $result = [
            'ok' => false,
            'message' => '',
        ];

            $validateTopicName= $this->ValidateTopicName( $request );
            if( $validateTopicName[ 'ok' ] ){

                $topicName = $validateTopicName[ 'value' ];

                $topic = new Topic;
                $topic->name = $topicName;
                $topic->save();

                $result[ 'ok' ] = true;
                $result[ 'topicsList' ] = $this->GetTopicsList();

            }else{
                $result[ 'message' ] = $validateTestTitle[ 'message' ];
            };



        return $result;
        
        
    }

}


?>


