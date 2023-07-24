<?php
$postId = get_the_ID();

if ( isset( $args ) && $args && $args['grid_list'] && is_array( $args['grid_list'] ) ) {
    $bg = $args['background'] ?: '';
    ?>
    <div class="doi-lap-section top_pad <?= $bg ?>">
        <div class="_inner LR_pad">
			<?php
			$i = 1;
			foreach ( $args['grid_list'] as $grid ) {
				$layout  = $grid['layout'] ?? ' ';
				$reverse = ( isset( $grid['reversed_block'] ) && $grid['reversed_block'] ) ? ' reversed ' : ' ';
				?>

                <div class="_row <?= $reverse ?>">
                    <div class="_left _col">
                        <div class="_col_inner">
							<?php if ( $grid['img'] && isset( $grid['img']['id'] ) ) {
								echo wp_get_attachment_image( $grid['img']['id'], 'full' );
							} ?>
                        </div>
                    </div>

                    <div class="_right _col ">
                        <div class="_col_inner">
							<?php if ( $grid['section_title'] ) { ?>
                                <h2 class="_title s28 fw700 blue"><?= $grid['section_title'] ?></h2>
							<?php } ?>

							<?php if ( $grid['summary'] ) { ?>
                                <div class="_summary fw400 s24"><?= $grid['summary'] ?></div>
							<?php } ?>
                        </div>
                    </div>
                </div>
				<?php
				$i ++;

			} ?>
        </div>
    </div>
<?php } ?>