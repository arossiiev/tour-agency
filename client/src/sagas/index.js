import { all, put, call, takeEvery } from 'redux-saga/effects';
import {createOrderService, fetchRoute, fetchTour, fetchTours} from "../services";
import {addToast, CREATE_ORDER, GET_ROUTE, GET_TOUR, GET_TOURS, setRoute, setTour, setTours} from "../actions";



function* getTours(action){
    try{
        const {data} = yield call(fetchTours, action.payload.search);
        yield put(setTours(data))
    }catch(e){}
}

function* getTour(action){
    try{
        const {data} = yield call(fetchTour, action.payload.id);
        yield put(setTour(data))
    }catch(e){}
}


function* getRoute(action){
    try{
        const {data} = yield call(fetchRoute, action.payload.id);
        yield put(setRoute(data))
    }catch(e){}
}

function* createOrder(action){
    try{
        const {data} = yield call(createOrderService,
            action.payload.first_name,
            action.payload.second_name,
            action.payload.phone,
            action.payload.mail,
            action.payload.tour_id);


        yield put(addToast("success", "Замовлення оформлео!"));


    }catch(e){
        yield put(addToast("error", JSON.parse(e.request.response).message));
    }
}


function* watchFetchTours(){
    yield takeEvery(GET_TOURS, getTours);
}

function* watchFetchTour(){
    yield takeEvery(GET_TOUR, getTour);
}

function* watchFetchRoute(){
    yield takeEvery(GET_ROUTE, getRoute);
}


function* watchCreateOrder(){
    yield takeEvery(CREATE_ORDER, createOrder);
}



export default function* rootSaga()
{
    yield all([
        watchFetchTours(),
        watchFetchTour(),
        watchFetchRoute(),
        watchCreateOrder()
    ])
}