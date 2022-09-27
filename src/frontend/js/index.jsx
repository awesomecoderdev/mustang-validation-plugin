import React, { Fragment } from "react";
import ReactDOM from "react-dom/client";
import App from "./App";

if (document.getElementById("mustang") != null) {
  const root = ReactDOM.createRoot(document.getElementById("mustang"));
  root.render(
    <App />
  );
}