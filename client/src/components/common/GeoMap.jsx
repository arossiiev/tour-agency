import {DirectionsRenderer, DirectionsService, GoogleMap, LoadScript, Marker} from '@react-google-maps/api';
import {useState} from "react";




function GeoMap({sights}){
    const [resp, setResp] = useState(null);

    const waypoints = sights.map(({latitude, longitude}) => (
        {location: {lat:parseFloat(latitude), lng: parseFloat(longitude)}, stopover: false})
    );

    return (
        <div className="container">
            <LoadScript
                googleMapsApiKey="AIzaSyDiaCezjIUPyH-ABq5kzPcZq8YBV-vJPp8"
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
                    {
                        sights.map(({longitude, latitude})=>(
                            <Marker
                                icon={"https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png"}
                                position={{lat: latitude, lng: longitude}}
                            />
                        ))

                    }
                </GoogleMap>
            </LoadScript>
        </div>
    )
}

export default GeoMap;

