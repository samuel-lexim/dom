<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) {
	$class = '';
	?>

    <div class="anh_bia_section">
		<?php
		$bg = $args['hero_img'] && isset( $args['hero_img']["url"] ) ? $args['hero_img']["url"] : getDefaultImg();
		?>

        <div class="_inner <?= $class ?>" style="background-image: url(<?= $bg ?>)">
			<?php if ( $args['hero_title'] ) { ?>
                <h1 class="_title blue fw700 h0"><?= $args['hero_title'] ?></h1>
			<?php } ?>
        </div>

    </div>

<?php } ?>