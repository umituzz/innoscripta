import {getRequestOptions, postRequestOptions} from "./RequestOptions"

export default class HttpService {
    // baseUrl = process.env.REACT_APP_BASE_URL;
    baseUrl = 'http://localhost/api'
    tokenKey = "token"

    getData = async (url) => {
        const token = await JSON.parse(localStorage.getItem(this.tokenKey));
        const requestOptions = getRequestOptions(token);

        return fetch(this.baseUrl + '/' + url, requestOptions)
            .then(
                response => response.json()
            )
    }

    postData = async (url, item) => {
        const token = await JSON.parse(localStorage.getItem(this.tokenKey));
        const requestOptions = postRequestOptions(token, item);

        return fetch(this.baseUrl + "/" + url, requestOptions)
            .then(
                response => response.json()
            );
    }
}