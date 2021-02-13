/* eslint no-restricted-globals:0 */

import Axios from "axios";

const Client = Axios.create({

  // dev :5443
  // live : 7443


  baseURL: "http://127.0.0.1:8000/api/v1",
  headers: {
    common: {
      "Content-Type": "multipart/form-data",

    }
  }
});


Client.interceptors.response.use(response => {
  return response;
}, error => {
  return error;
});

export default Client;
