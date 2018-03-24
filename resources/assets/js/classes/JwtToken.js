import Vue from 'vue';

export default class JwtToken {
  constructor (){
    this.token = null;
    this.retrieve();
  }

  update (newToken){
    this.token = newToken;

    localStorage.setItem('authorization', newToken);
  }

  retrieve (){
    let token = localStorage.getItem('authorization');

    if(token == "null" || token == "undefined"){
      return this.token = null;
    }

    this.token = token;
  }

  destroy (){
    localStorage.setItem('authorization', null);

    this.token = null;
  }
}
