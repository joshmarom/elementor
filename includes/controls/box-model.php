<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Box Model control.
 *
 * A base control for creating Box Model control. Displays input fields for top,
 * right, bottom, left of margin, padding, border and border-radius and the option to link them together.
 *
 * @since 2.4.0
 */
class Control_Box_Model extends Control_Base_Units {

	/**
	 * Get Box Model control type.
	 *
	 * Retrieve the control type, in this case `box_model`.
	 *
	 * @since 2.4.0
	 * @access public
	 *
	 * @return string Control type.
	 */
	public function get_type() {
		return 'box_model';
	}

	/**
	 * Get Box Model control default values.
	 *
	 * Retrieve the default value of the Box Model control. Used to return the
	 * default values while initializing the Box Model control.
	 *
	 * @since 2.4.0
	 * @access public
	 *
	 * @return array Control default value.
	 */
	public function get_default_value() {
		return array_merge(
			parent::get_default_value(), [
				'margin_top_size' => '',
				'margin_right_size' => '',
				'margin_bottom_size' => '',
				'margin_left_size' => '',
				'margin_top_unit' => '',
				'margin_right_unit' => '',
				'margin_bottom_unit' => '',
				'margin_left_unit' => '',
				'padding_top_size' => '',
				'padding_right_size' => '',
				'padding_bottom_size' => '',
				'padding_left_size' => '',
				'padding_top_unit' => '',
				'padding_right_unit' => '',
				'padding_bottom_unit' => '',
				'padding_left_unit' => '',
				'border_top_size' => '',
				'border_right_size' => '',
				'border_bottom_size' => '',
				'border_left_size' => '',
				'border_top_unit' => '',
				'border_right_unit' => '',
				'border_bottom_unit' => '',
				'border_left_unit' => '',
/*
				'margin' => [
					'top' => [
						'size' => '',
						'unit' => '',
					],
					'right' => [
						'size' => '',
						'unit' => '',
					],
					'bottom' => [
						'size' => '',
						'unit' => '',
					],
					'left' => [
						'size' => '',
						'unit' => '',
					],
					'link' => '',
				],
				'padding' => [
					'top' => [
						'size' => '',
						'unit' => '',
					],
					'right' => [
						'size' => '',
						'unit' => '',
					],
					'bottom' => [
						'size' => '',
						'unit' => '',
					],
					'left' => [
						'size' => '',
						'unit' => '',
					],
					'link' => '',
				],
				'border' => [
					'top' => [
						'size' => '',
						'unit' => '',
					],
					'right' => [
						'size' => '',
						'unit' => '',
					],
					'bottom' => [
						'size' => '',
						'unit' => '',
					],
					'left' => [
						'size' => '',
						'unit' => '',
					],
					'link' => '',
				],
*/
			]
		);
	}

	/**
	 * Get Box Model control default settings.
	 *
	 * Retrieve the default settings of the Box Model  control. Used to return the
	 * default settings while initializing the Box Model  control.
	 *
	 * @since 2.4.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return array_merge(
			parent::get_default_settings(), [
				'label_block' => true,
				'allowed_dimensions' => 'all',
				'placeholder' => '',
			]
		);
	}

	/**
	 * Render Box Model control output in the editor.
	 *
	 * Used to generate the control HTML in the editor using Underscore JS
	 * template. The variables for the class are available using `data` JS
	 * object.
	 *
	 * @since 2.4.0
	 * @access public
	 */
	public function content_template() {
		$properties = [
			'padding' => __( 'Padding', 'elementor' ),
			'border' => __( 'Border', 'elementor' ),
			'margin' => __( 'Margin', 'elementor' ),
		];
		$dimensions = [
			'top' => __( 'Top', 'elementor' ),
			'right' => __( 'Right', 'elementor' ),
			'bottom' => __( 'Bottom', 'elementor' ),
			'left' => __( 'Left', 'elementor' ),
		];
		?>
		<#
		var wrapperClass = 'elementor-control-input-wrapper';
		if ( 'string' === typeof data.layout ) {
			wrapperClass += ' layout-' + data.layout;
		} #>
		<label class="elementor-control-title">{{{ data.label }}}</label>
			<?php foreach ( $properties as $property_key => $property_title  ) : ?>
			<div class="elementor-control-field">
				<?php $this->print_units_template(); ?>
				<div class="{{ wrapperClass }}">
					<ul class="elementor-control-dimensions <?php echo 'elementor-' . $property_key; ?>">
						<?php
						foreach ( $dimensions as $dimension_key => $dimension_title ) :
							$property_dimension_key_size = $property_key . '-' . $dimension_key . '-' . 'size';
							$control_uid = $this->get_control_uid( $property_dimension_key_size );
							?>
							<li class="elementor-control-dimension">
								<input id="<?php echo $control_uid; ?>" type="number" data-setting="<?php echo esc_attr( $property_dimension_key_size ); ?>"
								       placeholder="<#
								   if ( _.isObject( data.placeholder ) ) {
									if ( ! _.isUndefined( data.placeholder.<?php echo $property_dimension_key_size; ?> ) ) {
										print( data.placeholder.<?php echo $property_dimension_key_size; ?> );
									}
								   } else {
									print( data.placeholder );
								   } #>"
								<# if ( -1 === _.indexOf( allowed_dimensions, '<?php echo $dimension_key; ?>' ) ) { #>
								disabled
								<# } #>
								/>
								<label for="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-dimension-label"><?php echo $property_title . ' ' . $dimension_title; ?></label>
							</li>
						<?php endforeach; ?>
						<li>
							<button class="elementor-link-dimensions tooltip-target" data-tooltip="<?php echo esc_attr__( 'Link values together', 'elementor' ); ?>">
								<span class="elementor-linked">
									<i class="fa fa-link" aria-hidden="true"></i>
									<span class="elementor-screen-only"><?php echo __( 'Link values together', 'elementor' ); ?></span>
								</span>
								<span class="elementor-unlinked">
									<i class="fa fa-chain-broken" aria-hidden="true"></i>
									<span class="elementor-screen-only"><?php echo __( 'Unlinked values', 'elementor' ); ?></span>
								</span>
							</button>
						</li>
					</ul>
				</div>
			</div>
			<?php endforeach; ?>
		<# if ( data.description ) { #>
		<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}
}
