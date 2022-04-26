export const GET_TOURS="GET_TOURS";
export const SET_TOURS="SET_TOURS";
export const GET_TOUR="GET_TOUR";
export const SET_TOUR="SET_TOUR";
export const GET_ROUTE="GET_ROUTE";
export const SET_ROUTE="SET_ROUTE";
export const CREATE_ORDER="CREATE_ORDER";

export const ADD_TOAST="ADD_TOAST";
export const CLEAR_TOAST="CLEAR_TOAST";


export function getTours(search){

    return{
        type: GET_TOURS,
        payload: {search: search}
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


export function addToast(toastType, message) {
    return {
        type: ADD_TOAST,
        payload: { type: toastType, message: message }
    }
}

export function clearToast(){
    return {
        type: CLEAR_TOAST,
        payload: {}
    }
}



export function createOrder(first_name, second_name, phone, mail, tour_id){

    return{
        type: CREATE_ORDER,
        payload: {
            first_name: first_name,
            second_name: second_name,
            mail: mail,
            phone: phone,
            tour_id: tour_id
        }
    }

}
