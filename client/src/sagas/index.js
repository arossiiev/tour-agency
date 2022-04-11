import { all, put, call, takeEvery } from 'redux-saga/effects';
import {fetchTours} from "../services";
import {GET_TOURS, setTours} from "../actions";



function* getTours(){
    try{
        const {data} = yield call(fetchTours);
        yield put(setTours(data))
    }catch(e){}
}



function* watchFetchTours(){
    yield takeEvery(GET_TOURS, getTours);
}

export default function* rootSaga()
{
    yield all([
        watchFetchTours()
    ])
}