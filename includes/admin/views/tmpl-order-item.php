<?php
/**
 * Order Overview: Item
 *
 * @package     EDD
 * @subpackage  Admin/Views
 * @copyright   Copyright (c) 2020, Sandhills Development, LLC
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       3.0
 */

$view_url = add_query_arg(
	array(
		'action' => 'edit',
	),
	admin_url( 'post.php' )
);
?>

<td class="has-row-actions column-name">
	<# if ( true === data.config.isAdding ) { #>
	<button class="button-link delete" id="remove">
		<span class="dashicons dashicons-no"></span>
	</button>
	<# } #>

	<div class="edd-order-overview-summary__items-name">
		<a
			href="<?php echo esc_url( $view_url ); ?>&post={{ data.id }}"
			class="row-title"
		>
			{{{ data.name }}}
		</a>

		<div class="row-actions">
			<# if ( data.discount > 0 ) { #>
			<span class="text"><strong><?php esc_html_e( 'Discount:', 'easy-digital-downloads' ); ?></strong> {{ data.discountCurrency }}</span> | 
			<# } #>

			<# if ( false !== data.config.hasTax && data.tax > 0 ) { #>
			<span class="text"><strong><?php esc_html_e( 'Tax:', 'easy-digital-downloads' ); ?></strong> {{ data.taxCurrency }}</span> | 
			<# } #>

			<button class="button-link">
				<?php echo esc_html( 'Copy Download Link', 'easy-digital-downloads' ); ?>
			</button>
		</div>
	</div>
</td>

<td>
	{{ data.amountCurrency }}
</td>

<# if ( true === data.config.hasQuantity ) { #>
<td>
	{{ data.quantity }}
</td>
<# } #>

<td class="column-right">
	{{ data.subtotalCurrency }}
</td>

<input type="hidden" value="{{ data.id }}" name="downloads[][id]" />
<input type="hidden" value="{{ data.priceId }}" name="downloads[][price_id]" />
<input type="hidden" value="{{ data.amount }}" name="downloads[][amount]" />
<input type="hidden" value="{{ data.tax }}" name="downloads[][tax]" />
<input type="hidden" value="{{ data.subtotal }}" name="downloads[][subtotal]" />