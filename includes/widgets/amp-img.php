<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
/**
 * Elementor amp-img widget.
 *
 * Elementor widget wrapper for the amp-img component.
 * https://amp.dev/documentation/examples/components/amp-img/?format=websites
 *
 * @since 3.2.0
 */
class Widget_amp_img extends Widget_Base {

	public function get_name() {
		return 'amp-img';
	}

	public function get_title() {
		return $this->get_name();
	}

	/* public function get_custom_element_tag() {
		return $this->get_name();
	} */

	public function get_categories() {
		return [ 'amp' ];
	}

	public function get_keywords() {
		return [ 'amp', 'amp-img', 'pic', 'picture', 'img', 'image', 'photo', 'visual', 'jpg', 'media' ];
	}

	public function get_icon() {
		return 'eicon-image';
	}

	protected function register_controls()
	{
		$this->start_controls_section(
			'section_image',
			[
				'label' => __('Image', 'elementor'),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __('Image src', 'elementor'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'large',
			]
		);

		$this->add_control(
			'custom_element_tag',
			[
					'type' => Controls_Manager::HIDDEN,
					'default' => $this->get_custom_element_tag(),
			]
		);

		$this->end_controls_section();
	}

	protected function render() { ?>
		test
	<?php }
}
