import HttpService from "./HttpService"

export const PostDataService = async (url, data, token = null) => {
    const http = new HttpService();




    return http.postData(url, data, token)
        .then(data => {
            return data;
        }).catch((error) => {
            console.error(error);
            return error;
        });
}