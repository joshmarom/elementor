import { LitElement, css, html } from 'lit-element';

export class ElementorHeading extends LitElement {
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

		.small {
			--heading-font-size: 15px;
		}
		.medium {
			--heading-font-size: 19px;
		}
		.large {
			--heading-font-size: 29px;
		}
		.xl {
			--heading-font-size: 39px;
		}
		.xxl {
			--heading-font-size: 59px;
		}`;
	}

	render() {
		return html`
			<div class="elementor-widget-container ${ this.size }">
				<slot/>
			</div>
		`;
	}
}
customElements.define( 'e-heading', ElementorHeading );
