import axios from "axios";
import { setHeaderUpload } from "../helpers/formdata-header";

export default {
  async uploadImage (payload) {
    setHeaderUpload()
    await axios.post(payload.endpoint, payload.file)
  }
}