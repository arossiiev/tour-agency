import ToursPage from "./components/pages/ToursPage";
import {Route, Routes} from "react-router-dom";
import TourPage from "./components/pages/TourPage";
import OrderPage from "./components/pages/OrderPage";
import Toast from "./components/common/Toast";


function App() {
  return (
      <>
          <Routes>
              <Route exact path="/" element={<ToursPage/>}/>
              <Route exact path="/tours/:id" element={<TourPage/>}/>
              <Route exact path="/order" element={<OrderPage/>}/>
          </Routes>
          <Toast/>
      </>
  );
}

export default App;
