import axios from "axios";

axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1";
axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
axios.defaults.headers.common.Accept = 'application/json';

export const callToServer = (method, url, data = null, customUrl = null) => {
	url = customUrl?customUrl:url;
	return new Promise((resolve, reject) => {
		axios({method, url, data})
			.then(response => {
				if (response.data.success) {
					resolve(response.data);
				}
				else if (response.status===200){
					resolve(response);
				}
				reject(response);
			}).catch(err => {
				if (err.response.status === 401) {
					window.location.href = '/authenticate';
				}
				console.error(err.response.data.message);
				reject(err);
			});
	});

};

export const axiosBaseUrl = axios.defaults.baseURL;
export const domainUrl = 'http://127.0.0.1:8000/api/v1';

