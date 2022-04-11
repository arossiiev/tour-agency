import {combineReducers} from "redux";
import {SET_TOURS} from "../actions";


function toursReducers(state={}, action){
    let tmp;
    switch(action.type){

        case SET_TOURS:
            tmp = {...state};
            tmp.tours = action.payload;
            return tmp;
        default:
            return state
    }


}



const reducer = combineReducers({
    tours: toursReducers
})


export default reducer;