<div class = 'lessonsListOfAllLanguages'>
@foreach( $allLessonsList as $item )
    @include('layouts.lessonsListForOneLanguage', $item )
@endforeach
    
</div>