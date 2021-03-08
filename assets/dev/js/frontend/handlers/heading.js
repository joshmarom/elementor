import { LitElement, html } from 'lit-element';

class ElementorHeading extends LitElement {
	render() {
		return html`<slot name="heading"></slot>`;
	}
}
customElements.define( 'e-heading', ElementorHeading );
