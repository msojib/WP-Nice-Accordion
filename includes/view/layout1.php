<?php
$layout_1 = '<div class="accordion wpnp-accordion '.$layout.'" id="wpnp_'.$acoordion_id.'">';
$x=0;
foreach ( $accordion_data as $key => $acc ) :
$x++;

//collase mode check
if ( $openmode == 'open' && $x == 1 ) {
    $collapse  = '';
    $show = 'show';
} else {
    $collapse  = 'collapsed';
    $show = '';
}

$dataUnique = $acoordion_id . $x;

$layout_1 .= '<div class="accordion-item">
				<div class="accordion-header" id="heading-'.$dataUnique.'">
					<button class="accordion-button '.$collapse.'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$dataUnique.'" aria-expanded="true" aria-controls="collapse'.$dataUnique.'">
					'.$acc[ 'wpnp-accordion-title' ].'
					</button>
				</div>
				<div id="collapse'.$dataUnique.'" class="accordion-collapse collapse '.$show.'" aria-labelledby="heading'.$dataUnique.'" data-bs-parent="#wpnp_'.$acoordion_id.'">
					<div class="accordion-body">
					'.$acc[ 'wpnp-text-content' ].'
					</div>
				</div>
 		</div>';
endforeach;

$x++;

$layout_1 .= '</div>';



