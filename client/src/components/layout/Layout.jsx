import Header from "./Header";
import Footer from "./Footer";


function Layout({children}){

    console.log({children});
    return(
        <div className="d-flex flex-column min-vh-100 w-100">
            <Header/>
            <div className="container">
                {children}
            </div>

            <Footer/>
        </div>

    );
}



export default Layout;