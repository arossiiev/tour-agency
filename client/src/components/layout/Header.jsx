import logo from "../../assets/images/logo.svg";
import "../../assets/css/index.css";
import {Link} from "react-router-dom";



function Header(){

    return (
        <div className={"nav navbar bg-blue sticky-top"}>
            <div className={"container no-text-decoration"}>
                <Link to="/">
                    <div className="d-flex">
                        <img className="mx-2" src={logo} alt={"Logo"} width={32} height={32}/>
                        <h3 className="company-name mx-2 mb-0">JetTour</h3>
                    </div>
                </Link>
            </div>

        </div>
    );

}


export default Header;