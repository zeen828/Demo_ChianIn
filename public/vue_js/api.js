const Api = {
    get(url, config = {}) {
        return axios.get(url, config);
    },
    post(url, data = {}) {
        return axios.post(url, data);
    }
};