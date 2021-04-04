<?php

namespace Elementor\Core\Files\CSS;

use Elementor\Element_Base;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

class Inline_CSS extends Base {
	public function write() {}

	private $element_id;

	private $element;

	/**
	 * @param Element_Base $element
	 */
	public function __construct( Element_Base $element ) {
		$this->element = $element;
		$this->element_id = $element->get_id();

		parent::__construct( $this->element_id );
	}

	public function get_name() {
		return $this->element_id;
	}

	protected function get_file_handle_id() {
		return $this->element_id;
	}

	/**
	 * @param Element_Base $element
	 * @return string
	 */
	public function get_element_unique_selector( Element_Base $element ) {
		return '.e-' . $this->element_id . $element->get_unique_selector();
	}

	protected function render_styles( Element_Base $element ) {
		$element_settings = $element->get_settings();

		$this->add_controls_stack_style_rules(
			$element,
			$this->get_style_controls( $element, null, $element->get_parsed_dynamic_settings() ),
			$element_settings,
			[ '{{ID}}', '{{WRAPPER}}' ],
			[ $element->get_id(), $this->get_element_unique_selector( $element ) ]
		);
	}

	protected function render_css() {
		$this->render_styles( $this->element );
	}

	public function print_css(){
		echo '<style>' . $this->get_content() . '</style>'; // XSS ok.
	}
}
