@if( isset( $userSuccessList_json ) )
<script type="text/javascript">

    const user_successList_json_from_DOM = JSON.parse('<?php echo $userSuccessList_json; ?>');

</script>
@else
<script type="text/javascript">
    console.error( '>>>>>>>>>>>>>>>> не передан список $userSuccessList_json' );
</script>
@endif


