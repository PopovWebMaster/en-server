@if( isset( $lessonScore ) )
<div class = 'BC_CA_header_lesson_score'>
    <span class = 'BC_CA_header_lesson_score_text'>Балл за урок:</span>
    <span class = 'BC_CA_header_lesson_score_num' id = 'scoreNum'>{{ $lessonScore }}</span>
</div>
@endif
