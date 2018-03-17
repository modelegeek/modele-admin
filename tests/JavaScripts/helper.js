let expect = require('expect');

export default class Helper {
  constructor (wrapper){
    this.wrapper = wrapper;
  }

  see (text, selector){
    let wrap = selector ? this.wrapper.find(selector): this.wrapper;

    expect(wrap.html()).toContain(text);
  }

  type (selector, text){
    let node = this.wrapper.find(selector);

    node.element.value = text;
    node.trigger('input')
  }

  click (selector){
    this.wrapper.find(selector).trigger('click');
  }
}
