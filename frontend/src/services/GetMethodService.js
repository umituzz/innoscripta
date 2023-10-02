import HttpService from "./HttpService";

export const GetMethodService = (url, token = null) => {
    const http = new HttpService();

    return http.getData(url, token).then(data => {
        return data;
    }).catch((error) => {
        return error;
    });
}