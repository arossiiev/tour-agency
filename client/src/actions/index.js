export const GET_TOURS="GET_TOURS";
export const SET_TOURS="SET_TOURS";


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

