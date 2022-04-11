import React from 'react';
import {createRoot} from 'react-dom/client';
import App from './App';
import reportWebVitals from './reportWebVitals';
import {BrowserRouter} from "react-router-dom";

import createSagaMiddleware from 'redux-saga'
import {applyMiddleware, compose, createStore} from "redux";
import reducer from "./reducers";
import rootSaga from "./sagas";
import {Provider} from "react-redux";


const sagaMiddleware = createSagaMiddleware();
const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;
const store = createStore(
    reducer,
    composeEnhancers(applyMiddleware(sagaMiddleware))
)
sagaMiddleware.run(rootSaga);


const root = createRoot(document.getElementById("root"))

root.render(
  <React.StrictMode>
      <Provider store={store}>
          <BrowserRouter>
              <App/>
          </BrowserRouter>
      </Provider>
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
