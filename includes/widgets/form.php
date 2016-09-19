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
						'name' => 'placeholder',
						'label' => __( 'Placeholder', 'elementor' ),
						'type' => Controls_Manager::TEXT,
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
			'section_title_style',
			[
				'label' => __( 'Tabs Style', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
					],
				],
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active > span:before' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active > span:after' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active > span' => 'border-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tab-content' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active > span:before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active > span:after' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active > span' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tab-content' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title.active' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .elementor-tabs .elementor-tab-content' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_color',
			[
				'label' => __( 'Title Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-title' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_1,
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'tab_active_color',
			[
				'label' => __( 'Active Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selectors' => [
					'{{WRAPPER}} .elementor-tabs .elementor-tabs-wrapper .elementor-tab-title.active' => 'color: {{VALUE}};',
				],
				'scheme' => [
					'type' => Scheme_Color::get_type(),
					'value' => Scheme_Color::COLOR_4,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_typography',
				'tab' => self::TAB_STYLE,
				'section' => 'section_title_style',
				'selector' => '{{WRAPPER}} .elementor-tab-title > span',
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			]
		);

		$this->add_control(
			'section_tab_content',
			[
				'label' => __( 'Tab Content', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_content',
				'selectors' => [
					'{{WRAPPER}} .elementor-tab-content' => 'color: {{VALUE}};',
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
				'name' => 'content_typography',
				'tab' => self::TAB_STYLE,
				'section' => 'section_tab_content',
				'selector' => '{{WRAPPER}} .elementor-tab-content',
				'scheme' => Scheme_Typography::TYPOGRAPHY_3,
			]
		);
	}

	protected function render( $instance = [] ) {

		function make_select_field( $item, $counter ) {
			$options = preg_split( "/\\r\\n|\\r|\\n/", $item['field_options'] );
			$html = '';
			if ( $options ) {
				$html = '<select ';
				$html .= 'id="form_field_' . $counter . '" ';
				$html .= 'name="form_field_' . $counter . '" ';
				$html .= '>';
				foreach ( $options as $option ) {
					$html .= '<option value="' . esc_attr( $option ) . '">' . $option . '</option>';
				}
				$html .= '</select>';
			}
			return $html;
		}

		function make_radio_checkbox_field( $item, $counter, $type ) {
			$options = preg_split( "/\\r\\n|\\r|\\n/", $item['field_options'] );
			$html    = '';
			if ( $options ) {
				foreach ( $options as $key => $option ) {
					$html .= '<input type="' . $type . '"';
					$html .= 'value="' . esc_attr( $option ) . '"';
					$html .= 'id="form_field_' . $counter . '-' . $key . '"';
					$html .= 'name="form_field_' . $counter . ( ( 'checkbox' === $type && count( $options ) > 1 ) ? '[]"' : '"' );
					$html .= '><label for="form_field_' . $counter . '-' . $key . '">' . $option . '</label>';
				}
			}
			return $html;
		}

		?>
		<form class="elementor-form">
			<?php $counter = 1; ?>
			<div class="elementor-form-fields-wrapper">
				<?php foreach ( $instance['form_fields'] as $item ) : ?>
				<div class="elementor-field-group elementor-field-type-<?php echo $item['field_type']; ?> elementor-column" data-col="<?php echo $item['width']; ?>">
					<label for="form_field_<?php echo $counter; ?>"><?php echo $item['field_label']; ?></label>
					<?php
					switch ( $item['field_type'] ) {

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
						<input type="<?php echo $item['field_type']; ?>" id="form_field_<?php echo $counter; ?>"
								name="form_field_<?php echo $counter; ?>"
								placeholder="<?php echo $item['placeholder']; ?>"
								class="elementor-tab-title <?php echo $item['css_classes']; ?>">
					<?php $counter ++; }?>
				</div>
				<?php	endforeach; ?>
			</div>
		</form>
	<?php
	}

	protected function content_template() {
		return;
	}
}
