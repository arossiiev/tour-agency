import Header from "./Header";
import Footer from "./Footer";


function Layout({children}){


    return(
        <div className="d-flex flex-column min-vh-100 w-100">
            <Header/>
            <main className="container">
                {children}
            </main>

            <Footer/>
        </div>

    );
}



export default Layout;