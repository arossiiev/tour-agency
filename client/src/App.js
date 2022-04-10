import ToursPage from "./components/pages/ToursPage";
import {Route, Routes} from "react-router-dom";


function App() {
  return (
      <Routes>
          <Route exact path="/" element={<ToursPage/>}/>
      </Routes>
  );
}

export default App;
