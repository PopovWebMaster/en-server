<?php 

namespace App\Http\Controllers\Page\Admin\Traits;

use Storage;


trait AddNewWordTrait{

    public function AddNewWord( $request, $user ){

        $result = [
            'ok' => false,
            'message' => 'всё хорошо',
        ];


        $data = $request->all();

        // if( Storage::disk('audio_buffer')->exists() ){
        //     $result[ 'storage' ] =  'yes!';
        //     // Storage::disk('audio_buffer')->delete( $puth );
        // };

        // $result[ 'file' ] =  $data[ 'data' ]['files'][0]->getClientOriginalExtension();
        $result[ 'file' ] =  $data[ 'data' ]['files'];

        $name = $data[ 'data' ]['files'][ 0 ][ 'name' ];
        $base64 = $data[ 'data' ]['files'][ 0 ][ 'base64' ];
        $puth = Storage::disk( 'audio_buffer' )->path('/');

        $result[ 'name' ] =  $name;
        $result[ 'base64' ] =  $base64;
        $result[ 'puth' ] =  $puth;

        file_put_contents( $puth.$name, base64_decode($base64));






        // $request->file('audio')

       
        

        return $result;
        
        
    }

}


?>


