<?php
require realpath('../../../wp-includes/class-phpass.php');
require realpath(  '../../../wp-admin/includes/plugin.php' );
//if (is_plugin_active( 'woocommerce/woocommerce.php' )) {
// Send the headers
header('Content-type: text/xml');
header('Pragma: public');
header('Cache-control: private');
header('Expires: -1');

echo '<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">';
echo '<channel>';
echo '<item>';
echo '<g:id>';
echo '</g:id>';
echo '<g:title>';
echo '</g:title>';
echo '<g:description>';
echo '</g:description>';
echo '<g:product_type>';
echo '</g:product_type>';
echo '<g:link>';
echo '</g:link>';
echo '<g:image_link>';
echo '</g:image_link>';
echo '<g:condition>';
echo '</g:condition>';
echo '<g:availability>';
echo '</g:availability>';
echo '<g:price>';
echo '</g:price>';
echo '<g:shipping_weight>';
echo '</g:shipping_weight>';
echo '<g:gtin>';
echo '</g:gtin>';
echo '<g:mpn>';
echo '</g:mpn>';
echo '<g:identifier_exists>';
echo '</g:identifier_exists>';
echo '<g:google_product_category>';
echo '</g:google_product_category>';
echo '<g:product_type>';
echo '</g:product_type>';
echo '</item>';
echo '</channel>';
echo '</rss>';

//} else {
//	die( 'cant access this directly' );
//}
?>



