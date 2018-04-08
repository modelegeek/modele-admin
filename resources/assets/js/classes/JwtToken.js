export default class JwtToken {
  constructor (){
    this.token = null;
    this.retrieve();
  }

  update (newToken){
    this.token = newToken;

    window.localStorage.setItem('authorization', newToken);
  }

  retrieve (){
    let token = window.localStorage.getItem('authorization');

    if ( token == "null" || token == "undefined" ) {
      return this.token = null;
    }

    this.token = token;
  }

  destroy (){
    window.localStorage.setItem('authorization', null);

    this.token = null;
  }
}
