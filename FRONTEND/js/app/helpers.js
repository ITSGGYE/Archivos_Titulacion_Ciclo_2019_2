function makeUrl(base,...urls){
	var s=_.join(_.flattenDeep(_.map(urls,(i)=>{
		i=_.trim(i);
		return _.split(_.trim(_.replace(i,/\/{2,}/gi,'/'),'/'),'/');
	})),'/');

	return `${base}/${_.replace(s,/\/{2,}/gi,'/')}`;
}

function url(...urls){
	return makeUrl(CONFIG.HOST,...urls);
}

function api(...urls){
	return makeUrl(CONFIG.API,...urls);
}


function urlPage(...urls){
	urls.unshift('pages');
	return makeUrl(CONFIG.VIEWS,...urls);
}

function urlSection(...urls){
	urls.unshift('sections');
	return makeUrl(CONFIG.VIEWS,...urls);
}

function urlModal(...urls){
	urls.unshift('modals');
	return makeUrl(CONFIG.VIEWS,...urls);
}


function objectToArray(obj,key){
	if(obj[key]){
		obj[key]=_.map(obj[key],(v)=>{
			return objectToArray(v,key);
		});
	}
	return obj;
}


function boolToHuman(b,s='Si',n='No'){
	return (_.isBoolean(b)?b:_.indexOf(['si','verdadero','1','activo','true','v','s'],_.toLower(_.toString(b)))<0?false:true)?s:n;
}


function methodToHuman(arr,u='.',s='\\'){
	if(_.isString(arr))arr=_.split(_.trim(arr,s),s);
	arr=_.reduce(arr, function(r,v,k) {
		v=_.trim(v);
		if(v!=='')r.push(v);
		return r;
	},[]);
	if(arr.length==0)return '';
	return _.replace(_.trim(_.join(arr,u),s),s,u);
}


/*
function aget(url,query={},...params){
	return axios({
		api:true,
		url:api(url,_.join(params,'/') ),
		method:'get',
		params:query
	});
}
*/

function handlerReq(method,url,query={},body={},...params){
	return axios({
		api:true,
		url:api(url,_.join(params,'/') ),
		method:method,
		params:query,
		data:body
	});
}

_.mixin({
	rget(url,query={},...params){
		return handlerReq('get',url,query,null,...params);
	},
	rpost(url,query={},body={},...params){
		return handlerReq('post',url,query,body,...params);
	},
	rput(url,query={},body={},...params){
		return handlerReq('put',url,query,body,...params);
	},
	rpatch(url,query={},body={},...params){
		return handlerReq('patch',url,query,body,...params);
	},
	rdelete(url,query={},body={},...params){
		return handlerReq('delete',url,query,body,...params);
	}
});

