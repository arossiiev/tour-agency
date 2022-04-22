import {DirectionsRenderer, DirectionsService, GoogleMap, LoadScript} from '@react-google-maps/api';
import {useState} from "react";




function GeoMap({sights}){
    const [resp, setResp] = useState(null);

    const waypoints = sights.map(({latitude, longitude}) => (
        {location: {lat:parseFloat(latitude), lng: parseFloat(longitude)}, stopover: false})
    );

    if(waypoints.length === 0){
        return (<></>);
    }

    const google_api = process.env.REACT_APP_GOOGLE_MAPS_API_KEY;
    return (
        <div className="container">
            <LoadScript
                googleMapsApiKey={google_api}
            >
                <GoogleMap
                    id='direction-example'
                    zoom={2}
                    mapContainerStyle={{
                        height: '30rem',
                        width: '100%'
                    }}
                    center={waypoints[0].locations}
                >
                    { !resp &&
                        <DirectionsService
                            options={{
                                origin: waypoints[0].location,
                                destination: waypoints[waypoints.length-1].location,

                                waypoints: waypoints,
                                travelMode: 'DRIVING',

                            }}
                            callback={(response)=>{
                                if(response !== null){
                                    if (response.status === 'OK') {
                                        setResp(response);
                                    } else {
                                        console.log('response: ', response)
                                    }

                                }
                            }
                            }

                        />


                    }
                    {
                        resp !== null && (
                            <DirectionsRenderer
                                options={{directions: resp}}
                            />
                        )

                    }
                </GoogleMap>
            </LoadScript>
        </div>
    )
}

export default GeoMap;

