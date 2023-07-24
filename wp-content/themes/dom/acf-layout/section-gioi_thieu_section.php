<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) {
	?>

    <div class="gioi_thieu_section top_pad <?= $args["bg_color"] ?>">
        <div class="LR_pad">

            <div class="_inner lh_22">
				<?php if ( $args['section_title'] ) { ?>
                    <h2 class="_title s34 fw700 blue"><?= $args['section_title'] ?></h2>
				<?php } ?>

				<?php if ( $args['first_content'] ) { ?>
                    <div class="_first_content s18 fw300"><?= $args['first_content'] ?></div>
				<?php } ?>

				<?php if ( $args['img'] && isset( $args['img']['id'] ) ) {
					echo wp_get_attachment_image( $args['img']['id'], 'full' );
				} ?>

				<?php if ( $args['contents'] && is_array( $args['contents'] ) ) { ?>
					<?php foreach ( $args['contents'] as $part ) { ?>
                        <div class="_content_list">
							<?php if ( $part['heading'] ) { ?>
                                <h4 class="blue s18 fw500"><?= $part['heading'] ?></h4>
							<?php } ?>
							<?php if ( $part['content_of_heading'] ) { ?>
                                <div class="_txt s18 fw300"><?= $part['content_of_heading'] ?></div>
							<?php } ?>
                        </div>
					<?php } ?>
				<?php } ?>
            </div>

        </div>
    </div>

<?php } ?>