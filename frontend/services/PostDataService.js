import HttpService from "./HttpService"

export const PostDataService = async (url, data) => {
    const http = new HttpService();

    return http.postData(url, data).then(data => {

        return data;
    }).catch((error) => {
        console.error(error);
        return error;
    });
}