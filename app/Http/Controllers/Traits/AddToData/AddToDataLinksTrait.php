<?php 

namespace App\Http\Controllers\Traits\AddToData;

use Auth;

trait AddToDataLinksTrait{

    public function AddToDataLinks( $activeRoute = null ){

        $link_lessons = '/lessons';
        $link_tests = '/test';

        $link_login = route( 'login' );
        $link_logout = route( 'logout' );

        $this->data[ 'links' ] = [
            'home' => [
                'route' => '/',
                'isActive' => $activeRoute === 'home'? true: false,
            ],
            'lessons' => [
                'route' => $link_lessons,
                'isActive' => $activeRoute === 'lessons'? true: false,
            ],
            'tests' => [
                'route' => $link_tests,
                'isActive' => $activeRoute === 'tests'? true: false,
            ],
            'login' => [
                'route' => $link_login,
                'isActive' => $activeRoute === 'login'? true: false,
            ],
            'logout' => [
                'route' => $link_logout,
                'isActive' => $activeRoute === 'logout'? true: false,
            ],
        ];
 
    }

}


?>


