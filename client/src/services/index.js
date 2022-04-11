import axios from "axios";

const BASE_URL = "http://127.0.0.1:8000"
const TOURS_URL = "/tours"

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
