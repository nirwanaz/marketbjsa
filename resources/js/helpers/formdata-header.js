import axios from "axios";

export function setHeaderUpload () {
  axios.defaults.headers.common['Content-Type'] = 'multipart/form-data'
}