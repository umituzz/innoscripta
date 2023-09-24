import HttpService from "./HttpService";

export const GetDataService = (url, token = null) => {
    const http = new HttpService();

    return http.getData(url, token).then(data => {
        return data;
    }).catch((error) => {
        console.log(error);

        return error;
    });
}