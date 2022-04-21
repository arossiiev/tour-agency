import ToursPage from "./components/pages/ToursPage";
import {Route, Routes} from "react-router-dom";
import TourPage from "./components/pages/TourPage";


function App() {
  return (
      <Routes>
          <Route exact path="/" element={<ToursPage/>}/>
          <Route exact path="/tours/:id" element={<TourPage/>}/>
      </Routes>
  );
}

export default App;
