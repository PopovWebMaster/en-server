<?php

namespace App\Http\Controllers\Page\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\SiteController;

use Auth;
use App\Models\User;

use App\Http\Controllers\Traits\AddToData\AddToDataIsAdminTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataLinksTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataPageDataTrait;
use App\Http\Controllers\Traits\AddToData\AddToDataLanguageDataTrait;
use App\Http\Controllers\Traits\GetLessonsListForViewTrait;


// use App\Http\Controllers\Traits\MainData\MainDataTrait;

class HomeController extends SiteController
{
    use AddToDataIsAdminTrait;
    use AddToDataLinksTrait;
    use AddToDataPageDataTrait;
    use AddToDataLanguageDataTrait;
    use GetLessonsListForViewTrait;
    // use MainDataTrait;

    public function __construct(){
        parent::__construct();

    }

    function get( Request $request ){

        $this->data['robots'] = 'index';

        $this->AddToDataPageData([
            'title' =>          $this->GetSiteTitle(),
            'header' =>         $this->GetSiteHeader(),
            'description' =>    $this->GetSiteDescription(),
            'keywords' =>       $this->GetSiteKeywords(),
            'paragraphList' =>  $this->GetSiteParagraphList(),

        ]);
        $this->AddToDataLanguageData();
        $this->AddToDataIsAdmin();
        $this->AddToDataLinks( 'home' );

        $allLessonsList = [];

        for( $i = 0; $i < count( $this->data[ 'languageActiveList' ] ); $i++ ){
            $keyName = $this->data[ 'languageActiveList' ][ $i ];
            $languageIcon = config( 'languages.languages.'.$keyName.'.icon' );
            $languageName = config( 'languages.languages.'.$keyName.'.name' );
            $buttonIsActive = false;
            $isOpen = false;
            $lessons = $this->GetLessonsListForView( $keyName );

            if( $i === 0 ){
                $isOpen = true;
            };

            if( count( $this->data[ 'languageActiveList' ] ) > 1 ){
                $buttonIsActive = true;
            };

            $allLessonsList[ $keyName ] = [
                'keyName' => $keyName,
                'languageIcon' =>   $languageIcon,
                'languageName' =>   $languageName,
                'buttonIsActive' => $buttonIsActive,
                'isOpen' =>         $isOpen,
                'lessons' =>        $lessons,
            ];

        };


        // dd( $allLessonsList );
        $this->data[ 'allLessonsList' ] = $allLessonsList;

        // $this->data[ 'allLessonsList' ] = [
        //     'EN' => [
        //         'keyName' => 'EN',
        //         'languageIcon' => '',
        //         'languageName' => 'англ',
        //         'buttonIsActive' => true,
        //         'isOpen' => true,
        //         'lessons' => [
        //             [
        //                 'route' => '#',
        //                 'wordsLength' => 100,
        //                 'levelName' => 'A1',
        //                 'lessonName' => 'Урок 1',
        //                 'lessonSchortDescription' => 'sdfdsf sdfsdf sdf sdf sdf sdf sdf '
        //             ],
        //             [
        //                 'route' => '#',
        //                 'wordsLength' => 300,
        //                 'levelName' => 'A1',
        //                 'lessonName' => 'Урок 2',
        //                 'lessonSchortDescription' => 'sdfdsf sdfsdf sdf sdf sdf sdf sdf '
        //             ]
        //         ],
        //     ], 
        //     'DE' => [
        //         'keyName' => 'DE',
        //         'languageIcon' => '',
        //         'languageName' => 'НЕМ',
        //         'buttonIsActive' => true,
        //         'isOpen' => false,
        //         'lessons' => [
        //             [
        //                 'route' => '#',
        //                 'wordsLength' => 100,
        //                 'levelName' => 'A1',
        //                 'lessonName' => 'Урок 1',
        //                 'lessonSchortDescription' => 'sdfdsf sdfsdf sdf sdf sdf sdf sdf '
        //             ],
        //             [
        //                 'route' => '#',
        //                 'wordsLength' => 300,
        //                 'levelName' => 'A1',
        //                 'lessonName' => 'Урок 2',
        //                 'lessonSchortDescription' => 'sdfdsf sdfsdf sdf sdf sdf sdf sdf '
        //             ]
        //         ],
        //     ], 
        // ];





        // $user = Auth::user();
        // dd(  );

        // Auth::login();
        // Auth::logout();
        //!!!!!!!!!!!!!!!admin
        // User::create([
        //         'name' => 'Vasyan',
        //         'email' => 'vasyan@mail.ru',
        //         'password' => bcrypt( '123123' ),
        //     ]);
        // User::create([
        //         'name' => 'Genka',
        //         'email' => 'genka@mail.ru',
        //         'password' => bcrypt( '123123' ),
        //     ]);
        // $user = User::find(1);
        // Auth::login($user);
        // dd( $this->data );

        return view( 'home', $this->data );

        
    }
}
