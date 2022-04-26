import logo from "../../assets/images/logo.svg";
import "../../assets/css/index.css";
import {Link} from "react-router-dom";
import SearchBar from "./SearchBar";




function Header({callback}){
    if(!callback){
        callback = () =>{};
    }


    return (
        <header className="bg-blue sticky-top">

            <div className="container no-text-decoration">
                <nav className="navbar navbar-expand-sm py-0">
                    <div className="container-fluid">
                    <Link to="/">
                        <div className="d-flex navbar-brand" >
                            <img className="mx-2" src={logo} alt={"Logo"} width={32} height={32}/>
                            <h3 className="company-name mx-2 mb-0">JetTour</h3>
                        </div>
                    </Link>
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                            aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon toggler"></span>
                    </button>
                    <div className="collapse navbar-collapse flex-grow-0" id="navbarToggler">
                       <SearchBar callback={callback}/>
                    </div>
                    </div>
                </nav>
            </div>

        </header>
    );

}


export default Header;