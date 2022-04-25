
export function toursSelector(state){
    return state.tours.tours;
}


export function tourSelector(state){
    return state.tours.current;
}

export function routeSelector(state){
    return state.route;
}

export function getToasts(state)
{
    return state.toast;
}