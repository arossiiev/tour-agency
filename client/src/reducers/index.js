import {combineReducers} from "redux";
import {ADD_TOAST, CLEAR_TOAST, SET_ROUTE, SET_TOUR, SET_TOURS} from "../actions";


function toursReducers(state={}, action){
    let tmp;
    switch(action.type){

        case SET_TOURS:
            tmp = {...state};
            tmp.tours = action.payload;
            return tmp;
        case SET_TOUR:
            tmp = {...state};

            tmp.current = action.payload;
            return tmp;
        default:
            return state
    }


}


function routeReducers(state={}, action){
    let tmp;
    switch(action.type){

        case SET_ROUTE:
            tmp = {...state};
            tmp = action.payload;
            return tmp;

        default:
            return state
    }


}

function toastsReducer(state=null, action) {
    switch (action.type)  {
        case ADD_TOAST:
            return action.payload;
        case CLEAR_TOAST:
            return null;

        default:
            return state;
    }
}


const reducer = combineReducers({
    tours: toursReducers,
    route: routeReducers,
    toast: toastsReducer
})


export default reducer;