export default class ErrorResponse {

  // init error response to two type
  // validation is for validator error
  // general is for other than validator
  constructor (){
    this.validation = {};

    this.general = {
      message: ''
    }
  }

  // refresh class object
  refresh (){
    this.validation = {};

    this.general = {
      message: ''
    }
  }

  /**
   * update error after got other response
   * it will base on error status and structure the correct object
   * @param error boolean
   * @param refresh
   */
  update (error, refresh = true){
    if ( refresh )
      this.refresh();

    if ( error.status == 422 ) {
      this.restructureValidatorBag(error)
    } else {
      this.restructureErrorBag(error)
    }
  }

  /**
   * error param from axios
   * @param error
   */
  restructureErrorBag (error){
    let message = 'Please try again later.'

    if ( error.data && error.data.user_message ) {
      message = error.data.user_message;

      // if user message is an array then we will get the 1st error message to display
      if ( error.data.user_message instanceof Array ) {
        message = error.data.user_message[0];
      }
    }

    this.general.message = message;
  }

  /**
   * error param from axios
   * @param error
   */
  restructureValidatorBag (error){
    this.validation = error.data.user_message;
  }
}
