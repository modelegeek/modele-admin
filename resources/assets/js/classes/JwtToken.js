export default class JwtToken {
  constructor (){
    this.token = this.retrieve();
  }

  update (token){
    this.token = token;
    localStorage.setItem('authorization', token);
  }

  retrieve (){
    return localStorage.getItem('authorization');
  }

  destroy (){
    this.token = null;
    localStorage.setItem('authorization', null);
  }
}
