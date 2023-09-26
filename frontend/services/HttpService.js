import {getRequestOptions, postRequestOptions} from "./RequestOptions"

export default class HttpService {
    baseUrl = 'http://localhost:8000/api'

    getData = async (url, token) => {
        const requestOptions = getRequestOptions(token);

        return fetch(this.baseUrl + '/' + url, requestOptions)
            .then(
                response => response.json()
            )
    }

    postData = async (url, data) => {
        const requestOptions = postRequestOptions(data);

        return fetch(this.baseUrl + "/" + url, requestOptions)
            .then(
                response => response.json()
            );
    }
}