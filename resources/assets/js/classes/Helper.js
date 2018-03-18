export default class Helper {
  /**
   * helper for show noty without wrote the long object config again and again
   * @param message String
   * @param type String (alert, success, warning, error, info/information)
   */
  showNoty (message, type){
    let notyMessage = new Noty({
      text: message,
      type: type
    });

    notyMessage.show();
  }
}
