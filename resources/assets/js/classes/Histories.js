import HistoryTag from "./HistoryTag";

export default class Histories {

  constructor (histories = []){
    this.histories = histories
  }

  /*
   * push new history tag in list of histories object
   */
  pushHistory (routeName, route){
    let displayName = routeName.replace('-', ' ');

    let newHistory = new HistoryTag(displayName, routeName, route);

    let exists = this.tagExists(routeName)

    if ( !exists )
      this.histories.push(newHistory);
  }

  /*
   * check if list of histories have this name
   */
  tagExists (name){
    let exists = false; //false

    for ( let history of this.histories ) {
      if ( history.route_name === name )
        exists = true; // true
    }

    return exists;
  }
}
