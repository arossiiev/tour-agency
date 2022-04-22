import "../../assets/css/timeline.css";




function RouteTimeline({sights}){
    return (

        <div className="timeline">
            {sights.map(({name, imageUrl}, index)=>(
                <div key={index} className="timeline-row">
                    <div className="timeline-time">
                        {index + 1}
                    </div>
                    <div className="timeline-content shadow">
                        <div>
                            <img className="img-thumbnail" src={imageUrl} alt={name}/>
                        </div>
                        <p className="fs-3">{name}</p>
                    </div>
                </div>

            ))}
        </div>

    )
}

export default RouteTimeline;