import {getRequestOptions, postRequestOptions} from "./RequestOptions"
import {authToken} from "../helpers/authHelper";

export default class HttpService {
    baseUrl = 'http://localhost/api'

    getData = async (url) => {
        const requestOptions = getRequestOptions();

        return fetch(this.baseUrl + '/' + url, requestOptions)
            .then(
                response => response.json()
            )
    }

    postData = async (url, item) => {
        const requestOptions = postRequestOptions(item);

        return fetch(this.baseUrl + "/" + url, requestOptions)
            .then(
                response => response.json()
            );
    }
}