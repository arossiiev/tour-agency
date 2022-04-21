import {useDispatch, useSelector} from "react-redux";
import {useEffect} from "react";
import {getRoute, getTour} from "../../actions";
import {routeSelector, tourSelector} from "../../selectors";
import Layout from "../layout/Layout";
import {useParams} from "react-router";
import Loading from "../layout/Loading";
import Carousel from "../common/Carousel";


function TourPage(){
    const dispatch = useDispatch();

    const {id} = useParams();

    useEffect(()=>{
        dispatch(getTour(id));
        dispatch(getRoute(id));
        }, [dispatch, id]);

    const tour = useSelector(tourSelector);
    const route = useSelector(routeSelector);


    if (!tour || Object.keys(route).length === 0) {
        return <Loading/>;

    }


    const hours = route.duration / 3600;
    const minutes = (route.duration / 60) % 60;

    const start_date = new Date(route.startTime)

    return (
        <Layout>
            <div className="row row-cols-md-auto justify-content-center my-3">
                <div className="col">
                    <h3 className="text-center">{tour.name}</h3>
                    <Carousel sights={route.sights}/>
                    <div className="container my-2">
                        <h3 className="text-center">Опис</h3>
                        <p>{tour.description}</p>
                        <p><span className="fw-bold">Тривалість:</span> {hours} год. {minutes} хв</p>
                        <p><span className="fw-bold">Дата початку:</span> {start_date.toDateString()}</p>
                        <p><span className="fw-bold">Час початку:</span> {start_date.toLocaleTimeString()}</p>

                    </div>

                </div>
            </div>
        </Layout>
    );


}

export default TourPage;