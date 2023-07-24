<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) {
	?>

    <div class="trich_dan_section top_pad">
        <div class="_inner LR_pad">
            <div class="_img">
				<?php if ( $args['img'] && isset( $args['img']['id'] ) ) {
					echo wp_get_attachment_image( $args['img']['id'], 'full' );
				} ?>
            </div>

            <div class="_content">
				<?php if ( $args['section_title'] ) { ?>
                    <h2 class="_title s34 fw700"><?= $args['section_title'] ?></h2>
				<?php } ?>

				<?php if ( $args['summary'] ) { ?>
                    <div class="_summary s24 fw400"><?= $args['summary'] ?></div>
				<?php } ?>

				<?php if ( $args['button_text'] && $args['button_link'] ) { ?>
                    <a href="<?= $args['button_link'] ?>" class="button_link s16 fw500"><?= $args['button_text'] ?></a>
				<?php } ?>
            </div>
        </div>
    </div>

<?php } ?>