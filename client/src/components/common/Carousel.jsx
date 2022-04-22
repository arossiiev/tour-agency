


function Carousel({sights}){
    return (
            <div id="carouselExampleCaptions" className="carousel slide container-sm d-none d-sm-flex"  data-bs-ride="carousel" style={{width: "55rem", height: "30rem"}}>
                <div className="carousel-indicators">
                    {sights.map((sight, index)=>{
                        const cc = index === 0 ? "active": "";
                        return (
                            <button key={sight.id} type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to={index} className={cc} aria-current="true" aria-label={`Slide ${index}`}></button>
                        )
                    })}

                </div>
                <div className="carousel-inner">
                    {sights.map(({id ,imageUrl, name, description}, index)=>{
                        const cc = index === 0 ? "carousel-item active": "carousel-item"
                        return (<div key={id} className={cc} >
                                <img src={imageUrl} className="d-block w-100 rounded img-fluid " alt={name}  style={{height: "30rem"}}/>
                                <div className="carousel-caption d-none d-md-block bg-black bg-opacity-50 rounded">
                                    <h5>{name}</h5>
                                    <p>{description}</p>
                                </div>
                            </div>
                        )})}
                </div>
                <button className="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span className="visually-hidden">Previous</span>
                </button>
                <button className="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span className="carousel-control-next-icon" aria-hidden="true"></span>
                    <span className="visually-hidden">Next</span>
                </button>
            </div>

    );
}

export default Carousel;