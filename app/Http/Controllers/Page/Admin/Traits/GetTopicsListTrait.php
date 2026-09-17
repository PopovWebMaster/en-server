<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use App\Models\Topic;


trait GetTopicsListTrait{


    public function GetTopicsList(){

        $result = [];

        $topic = Topic::get();

        foreach( $topic as $model ){
            array_push( $result, [
                'id' =>     $model->id,
                'name' =>   $model->name,
            ]);
        };

        return $result;
        
        
    }

}


?>


