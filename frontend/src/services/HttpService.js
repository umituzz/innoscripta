import {getRequestOptions, postRequestOptions} from "./RequestOptions"

export default class HttpService {
    baseUrl = process.env.NEXT_PUBLIC_API_BASE_URL

    getData = async (url, token = null) => {
        const requestOptions = getRequestOptions(token);

        return fetch(this.baseUrl + '/' + url, requestOptions)
            .then(
                response => response.json()
            )
    }

    postData = async (url, data, token = null) => {
        const requestOptions = postRequestOptions(data, token);

        return fetch(this.baseUrl + "/" + url, requestOptions)
            .then(
                response => response.json()
            );
    }
}