export const GET_TOURS="GET_TOURS";
export const SET_TOURS="SET_TOURS";
export const GET_TOUR="GET_TOUR";
export const SET_TOUR="SET_TOUR";
export const GET_ROUTE="GET_ROUTE";
export const SET_ROUTE="SET_ROUTE";



export function getTours(){

    return{
        type: GET_TOURS,
        payload: {}
    }

}



export function setTours(tours){

    return{
        type: SET_TOURS,
        payload: tours
    }

}



export function getTour(id){

    return{
        type: GET_TOUR,
        payload: {id}
    }

}

export function setTour(tour){

    return{
        type: SET_TOUR,
        payload: tour
    }

}


export function getRoute(id){

    return{
        type: GET_ROUTE,
        payload: {id}
    }

}


export function setRoute(route){

    return{
        type: SET_ROUTE,
        payload: route
    }

}