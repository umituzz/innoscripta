import HttpService from "./HttpService"

export const PostMethodService = async (url, data, token = null) => {
    const http = new HttpService();

    return http.postData(url, data, token = null)
        .then(data => {
            return data;
        }).catch((error) => {
            console.error(error);
            return error;
        });
}