import Layout from "../layout/Layout";
import {useDispatch, useSelector} from "react-redux";
import {useEffect} from "react";
import {getTours} from "../../actions";
import {toursSelector} from "../../selectors";
import TourCard from "../common/TourCard";
import {Link} from "react-router-dom";
import Loading from "../layout/Loading";


function ToursPage(){
    const dispatch = useDispatch();

    useEffect(()=>{
        dispatch(getTours());
    },[dispatch]);

    const tours = useSelector(toursSelector);

    if (!tours){
        return (<Loading/>);
    }


    return (
        <Layout>
            <div className="row row-cols-md-auto my-3">
                {tours.map(({id, name, country, city, imageUrl, price})=>
                    <Link key={id} to={`/tours/${id}`} style={{textDecoration:"none"}}>
                        <div className="col no-text-decoration">
                            <TourCard
                                key={id}
                                name={name}
                                country={country}
                                city={city}
                                image_url={imageUrl}
                                price={price}
                            />
                        </div>
                    </Link>
                )}
            </div>
        </Layout>
    );


}

export default ToursPage;