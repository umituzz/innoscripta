import HttpService from "./HttpService";

export const GetDataService = (url) => {
    const http = new HttpService();

    return http.getData(url).then(data => {
        return data;
    }).catch((error) => {
        console.log(error);

        return error;
    });
}