import { all, put, call, takeEvery } from 'redux-saga/effects';
import {fetchRoute, fetchTour, fetchTours} from "../services";
import {GET_ROUTE, GET_TOUR, GET_TOURS, setRoute, setTour, setTours} from "../actions";



function* getTours(action){
    try{
        const {data} = yield call(fetchTours);
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


function* watchFetchTours(){
    yield takeEvery(GET_TOURS, getTours);
}

function* watchFetchTour(){
    yield takeEvery(GET_TOUR, getTour);
}

function* watchFetchRoute(){
    yield takeEvery(GET_ROUTE, getRoute);
}

export default function* rootSaga()
{
    yield all([
        watchFetchTours(),
        watchFetchTour(),
        watchFetchRoute()
    ])
}