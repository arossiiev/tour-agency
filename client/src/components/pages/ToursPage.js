import Layout from "../layout/Layout";
import {useDispatch, useSelector} from "react-redux";
import {useEffect} from "react";
import {getTours} from "../../actions";
import {toursSelector} from "../../selectors";
import TourCard from "../common/TourCard";


function ToursPage(){
    const dispatch = useDispatch();

    useEffect(()=>{
        dispatch(getTours());
    },[dispatch]);

    const tours = useSelector(toursSelector);

    if (!tours){
        return <div>Loading</div>;

    }


    return (
        <Layout>
            <div className="row row-cols-md-auto my-3">
                {tours.map(({id, name, country, city, imageUrl, price})=>
                    <div className="col">
                        <TourCard
                            key={id}
                            name={name}
                            country={country}
                            city={city}
                            image_url={imageUrl}
                            price={price}
                        />
                    </div>
                )}
            </div>
        </Layout>
    );


}

export default ToursPage;