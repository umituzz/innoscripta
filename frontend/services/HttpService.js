import {getRequestOptions, postRequestOptions} from "./RequestOptions"

export default class HttpService {
    baseUrl = 'http://localhost/api'

    getData = async (url, token) => {
        const requestOptions = getRequestOptions(token);

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