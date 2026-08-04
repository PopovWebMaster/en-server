<div class = 'testsListOfAllLanguages'>
@foreach( $allTestsList as $item )
    @include('layouts.testsListForOneLanguage', $item )
@endforeach
    
</div>