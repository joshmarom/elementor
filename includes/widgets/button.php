<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor button widget.
 *
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Widget_Button extends Widget_Base {
	public $html = '';
	/**
	 * Get widget name.
	 *
	 * Retrieve button widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'button';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve button widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Button', 'elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve button widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-button';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the button widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic' ];
	}

	/**
	 * Get button sizes.
	 *
	 * Retrieve an array of button sizes for the button widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return array An array containing button sizes.
	 */
	public static function get_button_sizes() {
		return [
			'xs' => __( 'Extra Small', 'elementor' ),
			'sm' => __( 'Small', 'elementor' ),
			'md' => __( 'Medium', 'elementor' ),
			'lg' => __( 'Large', 'elementor' ),
			'xl' => __( 'Extra Large', 'elementor' ),
		];
	}

	/**
	 * Register button widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Button', 'elementor' ),
			]
		);

		$this->add_control(
			'button_type',
			[
				'label' => __( 'Type', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'Default', 'elementor' ),
					'info' => __( 'Info', 'elementor' ),
					'success' => __( 'Success', 'elementor' ),
					'warning' => __( 'Warning', 'elementor' ),
					'danger' => __( 'Danger', 'elementor' ),
				],
				'prefix_class' => 'elementor-button-',
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Click here', 'elementor' ),
				'placeholder' => __( 'Click here', 'elementor' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'elementor' ),
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
			]
		);

		$this->add_control(
			'size',
			[
				'label' => __( 'Size', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'sm',
				'options' => self::get_button_sizes(),
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'elementor' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
			]
		);

		$this->add_control(
			'icon_align',
			[
				'label' => __( 'Icon Position', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => [
					'left' => __( 'Before', 'elementor' ),
					'right' => __( 'After', 'elementor' ),
				],
				'condition' => [
					'selected_icon[value]!' => '',
				],
			]
		);

		$this->add_control(
			'icon_indent',
			[
				'label' => __( 'Icon Spacing', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button .elementor-align-icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-button .elementor-align-icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->add_control(
			'button_css_id',
			[
				'label' => __( 'Button ID', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => '',
				'title' => __( 'Add your custom id WITHOUT the Pound key. e.g: my-id', 'elementor' ),
				'description' => __( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows <code>A-z 0-9</code> & underscore chars without spaces.', 'elementor' ),
				'separator' => 'before',

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Button', 'elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				],
				'selector' => '{{WRAPPER}} .elementor-button',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .elementor-button',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'elementor' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_ACCENT,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'elementor' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover, {{WRAPPER}} .elementor-button:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-button:hover svg, {{WRAPPER}} .elementor-button:focus svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover, {{WRAPPER}} .elementor-button:focus' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' => __( 'Border Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'condition' => [
					'border_border!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-button:hover, {{WRAPPER}} .elementor-button:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .elementor-button',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .elementor-button',
			]
		);

		$this->add_responsive_control(
			'text_padding',
			[
				'label' => __( 'Padding', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
	}

	protected function get_button_attribute_string() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'button', 'class', 'elementor-button' );
		$this->add_render_attribute( 'button', 'role', 'button' );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'button', $settings['link'] );
			$this->add_render_attribute( 'button', 'class', 'elementor-button-link' );
		} else {
			$this->add_render_attribute( 'button', 'href', '#' );
		}

		if ( ! empty( $settings['button_css_id'] ) ) {
			$this->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
		}

		if ( ! empty( $settings['size'] ) ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['size'] );
		}

		if ( $settings['hover_animation'] ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-animation-' . $settings['hover_animation'] );
		}

		return $this->get_render_attribute_string( 'button' );
	}

	protected function get_template_data() {
		$settings = $this->get_settings_for_display();

		$template_data = [
			'has_icon' => ! empty( $settings['icon'] ) || ! empty( $settings['selected_icon']['value'] ),
			'text' => ! empty( $settings['text'] ) ? $settings['text'] : false,
		];

		if ( ! ( $template_data['has_icon'] || $template_data['text'] ) ) {
			return false;
		}

		$this->add_render_attribute( 'wrapper', 'class', 'elementor-button-wrapper' );
		$this->add_render_attribute( 'content-wrapper', 'class', 'elementor-button-content-wrapper' );

		$template_data['wrapper_att'] = $this->get_render_attribute_string( 'wrapper' );
		$template_data['button_att'] = $this->get_button_attribute_string();
		$template_data['content_wrapper_att'] = $this->get_render_attribute_string( 'content-wrapper' );

		if ( $template_data['has_icon'] ) {
			$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
			$is_new   = empty( $settings['icon'] ) && Icons_Manager::is_migration_allowed();

			if ( ! $is_new && empty( $settings['icon_align'] ) ) {
				// @todo: remove when deprecated
				// added as bc in 2.6
				//old default
				$settings['icon_align'] = $this->get_settings( 'icon_align' );
			}

			$this->add_render_attribute( 'icon-align', 'class', [
					'elementor-button-icon',
					'elementor-align-icon-' . $settings['icon_align']
				] );
			$template_data['icon_wrapper_att'] = $this->get_render_attribute_string( 'icon-align' );
			$template_data['icon_element'] = $is_new || $migrated ?
				Icons_Manager::get_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ) :
				'<i class="' . esc_attr( $settings['icon'] ) . '" aria-hidden="true"></i>';
		}

		if ( $template_data['text'] ) {
			$this->add_render_attribute( 'text', 'class', 'elementor-button-text' );
			$this->add_inline_editing_attributes( 'text', 'none' );
			$template_data['text_render_att'] = $this->get_render_attribute_string( 'text' );
		}

		return $template_data;
	}

	public $template = '';
	public $raw_template = '';

	/**
	 * Render button widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$data = $this->get_template_data();

		echo $this->template->render( [] );

		$html = $this->template->render( $data );

		echo $html;
	}

	/**
	 * Render button widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 2.9.0
	 * @access protected
	 */


	protected function content_template() {
		?>
		<#
			function get_button_attribute_string() {

				view.addRenderAttribute( 'button', 'class', 'elementor-button' );
				view.addRenderAttribute( 'button', 'role', 'button' );

				if ( settings.link.url ) {
					view.addRenderAttribute( 'button', 'href', settings.link.url );
					view.addRenderAttribute( 'button', 'class', 'elementor-button-link' );
				} else {
					view.addRenderAttribute( 'button', 'href', '#' );
				}

				if ( settings.button_css_id ) {
					view.addRenderAttribute( 'button', 'id', settings.button_css_id );
				}

				if ( settings.size ) {
					view.addRenderAttribute( 'button', 'class', 'elementor-size-' + settings.size );
				}

				if ( settings.hover_animation ) {
					view.addRenderAttribute( 'button', 'class', 'elementor-animation-' + settings.hover_animation );
				}

				return view.getRenderAttributeString( 'button' );
			}

			function get_template_data() {

				const data = {
					'has_icon': settings.icon || settings.selected_icon.value,
					'text': settings.text ? settings.text : false,
				}

				if ( ! ( data.has_icon || data.text ) ) {
					return false;
				}

				view.addRenderAttribute( 'wrapper', 'class', 'elementor-button-wrapper' );
				view.addRenderAttribute( 'content-wrapper', 'class', 'elementor-button-content-wrapper' );

				data.wrapper_att = view.getRenderAttributeString( 'wrapper' );
				data.button_att = get_button_attribute_string();
				data.content_wrapper_att = view.getRenderAttributeString( 'content-wrapper' );

				if ( data.has_icon ) {
					view.addRenderAttribute( 'icon-align', 'class', [
						'elementor-button-icon',
						'elementor-align-icon-' + settings.icon_align
					] );
					data.icon_wrapper_att = view.getRenderAttributeString( 'icon-align' );

					const iconHTML = elementor.helpers.renderIcon( view, settings.selected_icon, { 'aria-hidden': true }, 'i' , 'object' ),
						migrated = elementor.helpers.isIconMigrated( settings, 'selected_icon' );

					if ( iconHTML && iconHTML.rendered && ( ! settings.icon || migrated ) ) {
						data.icon_element = iconHTML.value;
					} else {
						data.icon_element = '<i class="' + settings.icon + '" aria-hidden="true"></i>';
					}
				}

				if ( data.text ) {
					view.addRenderAttribute( 'text', 'class', 'elementor-button-text' );
					view.addInlineEditingAttributes( 'text', 'none' );
					data.text_render_att = view.getRenderAttributeString( 'text' );
				}

				return data;
			}

		// Render Twig Template
		const data = get_template_data();
		console.log( 'data', data );

		if ( data ) {
			const _twig = twig( { data: `<?php echo $this->raw_template; ?>` } );

			print( _twig.render( data ) );
		} #>
		<?php
	}

	public function on_import( $element ) {
		return Icons_Manager::on_import_migration( $element, 'icon', 'selected_icon' );
	}

	function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );

		/* TWIG START */
		// TODO: Move to external - START
		$elementor_path = str_replace( '\\', '/', ELEMENTOR_PATH );
		$full_path = $elementor_path . 'includes/libraries/Twig/Autoloader.php';
		require_once( $full_path );

		\Twig_Autoloader::register();

		$templates_folder = 'includes/widgets';
		$loader = new \Twig_Loader_Filesystem( $elementor_path . $templates_folder );
		$twig = new \Twig_Environment( $loader, [
			//'cache' => $elementor_path . 'includes/widgets',
		] );

		$this->twig = $twig;
		// TODO: Move to external - END

		$template_name = 'button.twig';

		$this->template = $this->twig->loadTemplate( $template_name );

		// Getting the raw template content for JS rendering.
		$this->raw_template = file_get_contents($elementor_path . $templates_folder . '/' . $template_name, true);
		/* TWIG END */

	}
}
