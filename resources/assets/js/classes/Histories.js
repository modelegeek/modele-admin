import HistoryTag from "./HistoryTag";

export default class Histories {

  constructor (histories = []){
    this.histories = histories
  }

  /*
   * push new history tag in list of histories object
   */
  pushHistory (name, route){
    let newHistory = new HistoryTag(name, route);

    let exists = this.tagExists(name)

    if ( !exists )
      this.histories.push(newHistory);
  }

  /*
   * check if list of histories have this name
   */
  tagExists (name){
    let exists = false; //false

    for ( let history of this.histories ) {
      if ( history.name === name )
        exists = true; // true
    }

    return exists;
  }
}
