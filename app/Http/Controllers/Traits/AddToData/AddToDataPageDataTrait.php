<?php 

namespace App\Http\Controllers\Traits\AddToData;

use Auth;

trait AddToDataPageDataTrait{

    public function AddToDataPageData( $params ){

        $title =            $params[ 'title' ];
        $header =           $params[ 'header' ];
        $description =      $params[ 'description' ];
        $keywords =         $params[ 'keywords' ];
        $paragraphList =    $params[ 'paragraphList' ];


        $this->data['pageTitle'] =          $title;
        $this->data['pageDescription'] =    $description;
        $this->data['pageKeywords'] =       $keywords;
        $this->data['pageHeader'] =         $header;
        $this->data['pageParagraphList'] =  $paragraphList;

 
    }

}


?>


