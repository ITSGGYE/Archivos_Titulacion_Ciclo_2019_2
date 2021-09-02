axios.defaults.withCredentials=true;
axios.defaults.crossdomain=true;
axios.defaults.headers.common['Cache-Control']="no-cache";
axios.defaults.responseType='json';

axios.interceptors.request.use((config) => {
	return config;
},(error) =>{
	
	return Promise.reject(error);
});

axios.interceptors.response.use((response) => {
	if(_.get(response.config,'api',false)){
		if(_.isNull(response.data))throw {
			api:true,
			message:"no data"
		};
		if(response.data.error)throw {
			api:true,
			message:response.data.message
		};
		return response.data;
	}
	return response;
},(error,x) => {
	if(_.isUndefined(error.response))return Promise.reject({
		message:error.message
	});

	if(_.get(error.response.config,'api',false)){

		if(_.isNull(error.response.data))return Promise.reject({
			message:"no data"
		});

		if(error.response.data.error) return Promise.reject({
			message:error.response.data.message
		});
	}
	return Promise.reject(error);
});
