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


    console.log(route);
    return (
        <Layout>
            <div className="row row-cols-md-auto justify-content-center my-3 d-none d-sm-flex">
                <div className="col">
                    <Carousel sights={route.sights}/>
                </div>
            </div>
        </Layout>
    );


}

export default TourPage;