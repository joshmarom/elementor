import BackgroundSlideshow from '../background-slideshow';
import BackgroundVideo from './background-video';
import HandlesPosition from './handles-position';
import StretchedSection from './stretched-section';
import Shapes from './shapes';
import { LitElement, css, html } from 'lit-element';

export default [
	StretchedSection, // Must run before BackgroundSlideshow to init the slideshow only after the stretch.
	BackgroundSlideshow,
	BackgroundVideo,
	HandlesPosition,
	Shapes,
];

export class ElementorSection extends LitElement {
	static get properties() {
		return {
			size: { type: String, reflect: true },
		};
	}

	constructor() {
		super();
		this.size = '';
	}

	static get styles() {
		return css`
		:host {
			color: var(--heading-color, inherit) !important;
			--heading-font-size: inherit;
		}

		:is(.default, .small, .medium, .large, .xl, .xxl) ::slotted(*:is(h1, h2, h3, h4, h5, h6)) {
			font-size: var(--heading-font-size) !important;
		}

		.elementor-widget-container ::slotted(h1, h2, h3, h4, h5, h6) {
			color: var(--heading-color, inherit) !important;
			padding: 0 !important;
			margin: 0 !important;
			line-height: 1;
		}

		:is(.elementor-widget-container) ::slotted(*:is(h1, h2, h3, h4, h5, h6)) a {
			color: inherit !important;
			font-size: inherit !important;
			line-height: inherit  !important;
		}

		.column-gap-no {
			--heading-font-size: 15px;
		}
		.column-gap-narrow {
			--heading-font-size: 19px;
		}
		.column-gap-extended {
			--heading-font-size: 29px;
		}
		.column-gap-wide {
			--heading-font-size: 39px;
		}
		.column-gap-wider {
			--heading-font-size: 59px;
		}
		.column-gap-custom {
			--heading-font-size: 59px;
		}`;
	}

	render() {
		return html`
			<div class="elementor-container column-gap-default">
				<slot/>
			</div>
		`;
	}
}
customElements.define( 'e-section', ElementorSection );
