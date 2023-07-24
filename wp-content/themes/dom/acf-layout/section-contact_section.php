<?php
$postId = get_the_ID();

//lat_lng
//contact_bg
//info_list

if ( isset( $args ) && $args ) { ?>

    <div class="contact_section">

        <div class="_inner">

            <div class="google_map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1139.8416831115496!2d108.2163232858903!3d16.067817466692382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421835ad614ea7%3A0x5207dde9b6be8520!2zMjIyIEjDuW5nIFbGsMahbmcsIEjhuqNpIENow6J1IDIsIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZyA1NTAwMDA!5e0!3m2!1sen!2s!4v1639997080791!5m2!1sen!2s"
                        width="950" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

			<?php
			$bg = '';
			if ( $args['contact_bg'] && isset( $args['contact_bg']['url'] ) ) {
				$bg = $args['contact_bg']['url'];
			}
			$blur = $args['blur'] ?: '';
			?>

            <div class="info <?= $blur ?>" style="background-image: url('<?= $bg ?>')">


                <div class="contact_list">
					<?php
					$prefix = 'white-';
					$ext    = '.svg';
					if ( $args['info_list'] && is_array( $args['info_list'] ) ) { ?>
						<?php foreach ( $args['info_list'] as $contact ) { ?>
                            <div class="contact_row">
								<?php if ( $contact['icon_select'] ) {
									$imgSrc = file_get_contents( get_template_directory() . '/images/contact/' . $prefix . $contact['icon_select'] . $ext );
									?>
                                    <div class="white-circle"><?= $imgSrc ?></div>
								<?php } ?>
								<?php if ( $contact['content'] ) { ?>
                                    <div class="_txt_area s20 fw500"><?= $contact['content'] ?></div>
								<?php } ?>
                            </div>
						<?php } ?>
					<?php } ?>
                </div>
            </div>

        </div>

    </div>

<?php } ?>