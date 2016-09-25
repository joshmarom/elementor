<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Form extends Widget_Base {

	public function get_id() {
		return 'form';
	}

	public function get_title() {
		return __( 'Form', 'elementor' );
	}

	public function get_icon() {
		return 'bullet-list';
	}

	protected function _register_controls() {
		$this->add_control(
			'section_form_fields',
			[
				'label' => __( 'Form Fields', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);
		$this->add_control(
			'form_fields',
			[
				'label' => __( 'Form Fields', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'section' => 'section_form_fields',
				'show_label' => false,
				'default' => [
					[
						'tab_title' => __( 'Form field', 'elementor' ),
						//'tab_content' => __( 'I am tab content. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementor' ),
					],
				],
				'fields' => [
					[
						'name' => 'field_type',
						'label' => __( 'Field Type', 'elementor' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'text' => __( 'Text', 'elementor' ),
							'tel' => __( 'Tel', 'elementor' ),
							'email' => __( 'Email', 'elementor' ),
							'textarea' => __( 'Textarea', 'elementor' ),
							'number' => __( 'Number', 'elementor' ),
							'select' => __( 'Select', 'elementor' ),
							'url' => __( 'URL', 'elementor' ),
							'upload' => __( 'File Upload', 'elementor' ),
							'checkbox' => __( 'Checkbox', 'elementor' ),
							'radio' => __( 'Radio', 'elementor' ),
						],
						'default' => 'text',
					],
					[
						'name' => 'field_label',
						'label' => __( 'Field Label', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => '',
					],
					[
						'name' => 'show_label',
						'label' => __( 'Show Label', 'elementor' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __( 'Show', 'elementor' ),
						'label_off' => __( 'Hide', 'elementor' ),
						'return_value' => true,
						'default' => true,
					],
					[
						'name' => 'placeholder',
						'label' => __( 'Placeholder', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => '',
					],
					[
						'name' => 'required',
						'label' => __( 'Required', 'elementor' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __( 'Yes', 'elementor' ),
						'label_off' => __( 'No', 'elementor' ),
						'return_value' => true,
						'default' => '',
					],
					[
						'name' => 'css_classes',
						'label' => __( 'CSS Classes', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => '',
					],
					[
						'name' => 'field_options',
						'label' => __( 'Options', 'elementor' ),
						'type' => Controls_Manager::TEXTAREA,
						'default' => '',
						'description' => 'Enter each option in a separate line',
					],
					[
						'name' => 'width',
						'label' => __( 'Width', 'elementor' ),
						'type' => Controls_Manager::SELECT,
						'options' => [
							'100' => '100%',
							'90' => '90%',
							'83' => '83%',
							'80' => '80%',
							'75' => '75%',
							'70' => '70%',
							'66' => '66%',
							'60' => '60%',
							'50' => '50%',
							'40' => '40%',
							'33' => '33%',
							'30' => '30%',
							'25' => '25%',
							'20' => '20%',
							'16' => '16%',
							'14' => '14%',
							'12' => '12%',
							'11' => '11%',
							'10' => '10%',
						],
						'default' => '100',
					],
					[
						'name' => 'rows',
						'label' => __( 'Rows', 'elementor' ),
						'type' => Controls_Manager::NUMBER,
						'default' => 4,
					],
				],
				'title_field' => 'field_label',
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
				'section' => 'section_form_fields',
			]
		);

		$this->add_control(
			'section_form_layout',
			[
				'label' => __( 'Form Layout', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'show_labels',
			[
				'label' => __( 'Show Labels', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'section' => 'section_form_layout',
				'label_on' => __( 'Show', 'elementor' ),
				'label_off' => __( 'Hide', 'elementor' ),
				'return_value' => true,
				'default' => true,
			]
		);

		$this->add_control(
			'label_position',
			[
				'label' => __( 'Label Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'section' => 'section_form_layout',
				'options' => [
					'above' => __( 'Above', 'elementor' ),
					'inline' => __( 'Before', 'elementor' ),
				],
				'default' => 'above',
			]
		);

		$this->add_control(
			'section_submit_button',
			[
				'label' => __( 'Submit Button', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'section' => 'section_submit_button',
				'default' => __( 'Send', 'elementor' ),
				'placeholder' => __( 'Send', 'elementor' ),
				'prefix_class' => '',
				'label_block' => true,
			]
		);

		$this->add_control(
			'button_width',
			[
				'label' => __( 'Button Area Width', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'section' => 'section_submit_button',
				'options' => [
					'100' => '100%',
					'90' => '90%',
					'83' => '83%',
					'80' => '80%',
					'75' => '75%',
					'70' => '70%',
					'66' => '66%',
					'60' => '60%',
					'50' => '50%',
					'40' => '40%',
					'33' => '33%',
					'30' => '30%',
					'25' => '25%',
					'20' => '20%',
					'16' => '16%',
					'14' => '14%',
					'12' => '12%',
					'11' => '11%',
					'10' => '10%',
				],
				'default' => '100',
			]
		);

		$this->add_control(
			'button_align',
			[
				'label' => __( 'Button Align', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'section' => 'section_submit_button',
				'options' => [
					'start' => __( 'Start', 'elementor' ),
					'end' => __( 'End', 'elementor' ),
					'center' => __( 'Center', 'elementor' ),
					'stretch' => __( 'Stretch', 'elementor' ),
				],
				'default' => 'stretch',
			]
		);

		$this->add_control(
			'button_vertical_align',
			[
				'label' => __( 'Button Vertical Align', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'section' => 'section_submit_button',
				'options' => [
					'start' => __( 'Top', 'elementor' ),
					'end' => __( 'Bottom', 'elementor' ),
					'center' => __( 'Center', 'elementor' ),
					'stretch' => __( 'Stretch', 'elementor' ),
				],
				'default' => 'stretch',
			]
		);

		$this->add_control(
			'section_form_style',
			[
				'label' => __( 'Form Style', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'column_gap',
			[
				'label' => __( 'Column gap', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 60,
					],
				],
				'tab' => self::TAB_STYLE,
				'section' => 'section_form_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-field-group' => 'padding-right: calc( {{SIZE}}{{UNIT}}/2 ); padding-left: calc( {{SIZE}}{{UNIT}}/2 );',
					'{{WRAPPER}} .elementor-form-fields-wrapper' => 'margin-left: calc( -{{SIZE}}{{UNIT}}/2 ); margin-right: calc( -{{SIZE}}{{UNIT}}/2 );',
				],
			]
		);

		$this->add_control(
			'row_gap',
			[
				'label' => __( 'Row gap', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 60,
					],
				],
				'tab' => self::TAB_STYLE,
				'section' => 'section_form_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-field-group' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-form-fields-wrapper' => 'margin-bottom: -{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_typography',
				'tab' => self::TAB_STYLE,
				'section' => 'section_form_style',
				'selector' => '{{WRAPPER}} .elementor-tab-title > span',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'section_label_style',
			[
				'label' => __( 'Label Style', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'label_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_label_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-field-group > label' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'tab' => self::TAB_STYLE,
				'section' => 'section_label_style',
				'selector' => '{{WRAPPER}} .elementor-field-group > label',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'section_field_style',
			[
				'label' => __( 'Field Style', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'field_text_color',
			[
				'label' => __( 'Field Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_field_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-field-group .elementor-field, {{WRAPPER}} .elementor-field-subgroup' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_control(
			'field_background_color',
			[
				'label' => __( 'Field Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_field_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-field-group .elementor-field' => 'background-color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_3,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'field_typography',
				'tab' => self::TAB_STYLE,
				'section' => 'section_field_style',
				'selector' => '{{WRAPPER}} .elementor-tab-content',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_width',
				'label' => __( 'Border', 'elementor' ),
				'tab' => self::TAB_STYLE,
				'placeholder' => '1px',
				'default' => '1px',
				'section' => 'section_field_style',
				'selector' => '{{WRAPPER}} .elementor-field-group .elementor-field',
			]
		);

		$this->add_control(
			'field_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_field_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-field-group .elementor-field' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

	}

	protected function render( $instance = [] ) {

		function make_textarea_field( $item, $counter ) {
			$html = '<textarea id="form_field_' . $counter . '"
					name="form_field_' . $counter . '"
			        placeholder="' . $item['placeholder'] . '"
			        rows="' . $item['rows'] . '"
			        class="elementor-field ' . $item['css_classes'] . '"' .
			        ( $item['required'] ? ' required' : '' ) . '></textarea>';
			return $html;
		}

		function make_select_field( $item, $counter ) {
			$options = preg_split( "/\\r\\n|\\r|\\n/", $item['field_options'] );
			$html = '';
			if ( $options ) {
				$html = '<div class="elementor-field elementor-select-wrapper ' . $item['css_classes'] . '">
						<select id="form_field_' . $counter . '"
						name="form_field_' . $counter . '"' .
				        ( $item['required'] ? ' required' : '' ) . '>';
				foreach ( $options as $option ) {
					$html .= '<option value="' . esc_attr( $option ) . '">' . $option . '</option>';
				}
				$html .= '</select></div>';
			}
			return $html;
		}

		function make_radio_checkbox_field( $item, $counter, $type ) {
			$options = preg_split( "/\\r\\n|\\r|\\n/", $item['field_options'] );
			$html    = '';
			if ( $options ) {
				$html .= '<div class="elementor-field-subgroup ' . $item['css_classes'] . '">';
				foreach ( $options as $key => $option ) {
					$html .= '<input type="' . $type . '"
							value="' . esc_attr( $option ) . '"
							id="form_field_' . $counter . '-' . $key . '"
							name="form_field_' . $counter . ( ( 'checkbox' === $type && count( $options ) > 1 ) ? '[]"' : '"' ) .
							( $item['required'] ? ' required' : '' ) . '>
							<label for="form_field_' . $counter . '-' . $key . '">' . $option . '</label> ';
				}
				$html .= '</div>';
			}
			return $html;
		}

		?>
		<form class="elementor-form">
			<?php $counter = 1; ?>
			<div class="elementor-form-fields-wrapper <?php
				echo 'elementor-labels-' . $instance['label_position'];
			?>">
				<?php foreach ( $instance['form_fields'] as $item ) : ?>
				<div class="elementor-field-group elementor-column <?php
					echo 'elementor-field-type-' . $item['field_type'];
					if ( $item['required'] ) echo ' elementor-field-required' ?>"
				     data-col="<?php echo $item['width']; ?>">
					<label for="form_field_<?php echo $counter; ?>" <?php if ( ! $item['show_label'] || ! $instance['show_labels'] ) echo 'class="elementor-screen-only"'; ?>>
						<?php echo $item['field_label']; ?>
					</label>
					<?php
					switch ( $item['field_type'] ) {

						case 'textarea':
							echo make_textarea_field( $item, $counter );
							$counter ++;
							break;

						case 'select':
							echo make_select_field( $item, $counter );
							$counter ++;
							break;

						case 'radio':
						case 'checkbox':
							echo make_radio_checkbox_field( $item, $counter, $item['field_type'] );
							$counter ++;
							break;

						default:
						?>
						<input size="1"
								type="<?php echo $item['field_type']; ?>" id="form_field_<?php echo $counter; ?>"
								name="form_field_<?php echo $counter; ?>"
								placeholder="<?php echo $item['placeholder']; ?>"
								class="elementor-field <?php echo $item['css_classes']; ?>"
						        <?php if ( $item['required'] ) echo 'required'; ?>
						>
					<?php $counter ++; }?>
				</div>
				<?php	endforeach; ?>
				<div class="elementor-field-group elementor-column elementor-field-type-submit <?php
							echo 'elementor-button-align-' . $instance['button_align'];
							echo ' elementor-button-vertical-align-' . $instance['button_vertical_align']; ?>"
				     data-col="<?php echo $instance['button_width']; ?>">
					<button type="submit" class="elementor-button elementor-form-submit"><?php echo $instance['button_text']; ?></button>
				</div>
			</div>
		</form>
	<?php
	}

	protected function content_template() {
		return;
	}
}
