<?php
function mm_get_image_thumbnail( $attachment_id, $width, $height, $crop=true ) {
	$width = absint( $width );
	$height = absint( $height );

	$upload_dir = wp_upload_dir();
	$path = get_attached_file( $attachment_id );

	$file_name = basename( $path );
	$file_name = preg_replace( '/(\.[^\.]+)$/', '-' . $width . 'x' . $height . ( $crop ? '-cropped' : '' ) . '$1', $file_name);
	$file_path = $upload_dir['path'] . DIRECTORY_SEPARATOR . $file_name;
	$file_url = $upload_dir['url'] . '/' . $file_name;

	if ( !file_exists( $file_path ) ) {
		$editor = wp_get_image_editor( $path );
		$editor->resize( $width, $height, $crop );
		$editor->save( $file_path );
	}

	return $file_url;
}
