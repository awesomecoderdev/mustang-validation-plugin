import React, { Fragment } from "react";
import ReactDOM from "react-dom/client";
import App from "./App";

if (document.getElementById("mustangMetabox") != null) {
  const root = ReactDOM.createRoot(document.getElementById("mustangMetabox"));
  root.render(
    <App />
  );
}