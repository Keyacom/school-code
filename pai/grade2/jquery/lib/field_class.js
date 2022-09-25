/**
 * Class used for creating a form field.
 * */
class Field {
  constructor(o) {
    this.minLen = o.minLen ?? 0;
    this.required = o.required ?? false;
    this.maxLen = o.maxLen ?? 0;
    this.max = o.max ?? 0;
    this.min = o.min ?? 0;
    this.type = o.type?.trim?.().toLowerCase() ?? 'text';
    this.inputType = o.inputType?.trim?.().toLowerCase() ?? 'text';
    this.innerName = o.innerName ?? ''
    this.value = o.value ?? ''
  }
  /**
   * Render a field.
   * 
   * @param {*} d The field's visible name.
   * @param {*} n The field's internal name.
   * @returns {string} The rendered HTML.
   */
  render(d, n = this.innerName) {
    return `<label for="${n}"><b>${d}</b></label>
    <div class="field">
    <${this.inputType === "textarea" ? 'textarea rows="6"' : "input"}
      id="${n}"
      name="${n}"
      value="${this.value}"
      type="${this.inputType || this.type || 'text'}"
      class="${this.required ? 'required' : ''} ${this.type !== 'text' ? this.type : ''}"
      ${this.minLen ? `minlength="${this.minLen}"` : ''}
      ${this.maxLen ? `maxlength="${this.maxLen}"` : ''}
      ${this.min ? `min="${this.min}"` : ''}
      ${this.max ? `max="${this.max}"` : ''}>${this.inputType === "textarea" ? "</textarea>" : ""}
    </div>`
  }
}