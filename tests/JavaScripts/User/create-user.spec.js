import {mount} from '@vue/test-utils';
import Helper from "../helper";
let expect = require('expect');
import Create from '../../../resources/assets/js/pages/admin-panel/admin/create.vue';

describe('Create', () =>{
  let wrapper;
  let helper;

  beforeEach(() =>{
    wrapper = mount(Create);
    helper = new Helper(wrapper);
  })

  it('contain email and password', () =>{
    helper.see('Email');
  })
});
