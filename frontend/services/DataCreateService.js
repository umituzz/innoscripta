import HttpService from "./HttpService"

export const CreateData = async (url, query = null) => {
    const http = new HttpService();

    return http.postData(url, query).then(data => {

        return data;
    }).catch((error) => {
        console.error(error);
        return error;
    });
}