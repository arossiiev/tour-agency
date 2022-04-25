import axios from "axios";


const BASE_URL = "http://127.0.0.1:8000"
const TOURS_URL = "/tours"
const TOUR_URL = "/tours/{}"
const ROUTE_URL = "/tours/{}/route"
const ORDER_URL = "/order"


String.prototype.format = function ()
{
    let i = 0, args = arguments;
    return this.replace(/{}/g, function () {
        return typeof args[i] != 'undefined' ? args[i++] : '';
    });
};


axios.defaults.baseURL = BASE_URL

export function fetchTours(){
    return axios.get(TOURS_URL);
}

export function fetchTour(tour_id){
    return axios.get(TOUR_URL.format(tour_id));
}

export function fetchRoute(tour_id){
    return axios.get(ROUTE_URL.format(tour_id));
}


export function createOrderService(first_name, second_name, phone, mail, tour_id){

    return axios.post(ORDER_URL,{
        first_name: first_name,
        second_name: second_name,
        mail: mail,
        phone: phone,
        tour_id: tour_id
    });
}