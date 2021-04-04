import { LitElement, css, html } from 'lit-element';
export default class Heading extends elementorModules.frontend.handlers.Base {
	onInit() {
		super.onInit();
	}
}

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
			--heading-font-size: var(--typography-font-size);
			text-align: var(--align, inherit) !important;
		}

		@media screen and ( max-width: 750px ) {
			:host {
				--heading-font-size: var(--typography-font-size-mobile);
			}
		}

		@media screen and ( max-width: 1024x ) {
			:host {
				--heading-font-size: var(--typography-font-size-tablet);
			}
		}

		:is(.default, .small, .medium, .large, .xl, .xxl) ::slotted(:is(h1, h2, h3, h4, h5, h6, p, span)) {
			font-size: var(--heading-font-size, inherit) !important;
		}

		::slotted(:is(h1, h2, h3, h4, h5, h6, p, span)) {
			color: var(--title-color, inherit) !important;
			font-weight: var(--typography-font-weight, inherit) !important;
			font-size: var(--heading-font-size, inherit) !important;
			font-family: var(--typography-font-family, inherit) !important;
			line-height: var(--typography-line-height, inherit) !important;
			padding: 0 !important;
			margin: 0 !important;
		}

		::slotted(*:is(h1, h2, h3, h4, h5, h6, p, span)) a {
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
