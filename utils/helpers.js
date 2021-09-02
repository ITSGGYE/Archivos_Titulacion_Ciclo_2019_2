const Joi = require('@hapi/joi');
const _ = require('lodash');
const jwt = require('jsonwebtoken');
require('dotenv').config();

module.exports.wrapperValidations = (schemas) => {
	var out = {};
	_.forEach(schemas, (schema, k) => {
		switch (schema.type) {
			case 'object':
				_.set(out, k, async (value) => _.isUndefined(value) ? Promise.reject(new Error(`Field invalid ${k}`)) : schema.validateAsync(value));
				break;
			default:
				_.set(out, k, async (value) => _.isUndefined(value) ? Promise.reject(new Error(`Field invalid ${k}`)) : Joi.attempt(value, schema));
				break;
		}
	})
	return out;
};



module.exports.applyThis = (o, ref,obj) => {
	_.set(o,ref,obj);
};


module.exports.makeToken = (obj, expireIn = 60 * 60 * 24 * 360, options = {}) => {
	return jwt.sign(obj, process.env.SECRET_PASSWORD, _.merge(options, {
		expiresIn: expireIn
	}))
};




module.exports.getObjectClass=(obj)=> {
    if (obj && obj.constructor && obj.constructor.toString) {
        var arr = obj.constructor.toString().match(/function\s*(\w+)/);
        if (arr && arr.length == 2)  return arr[1];
    }
    return undefined;
}





module.exports.exec=(db, store = "", ...params)=> {
	return db.raw(`Call ${store} (${_.join(_.fill(Array(params.length), '?'),',')})`, params).then(([x]) => {
		if(!_.isArray(x))x=[0,0];
		x.pop();
		if (x.length == 1) x = x[0];
		return x;
	});
}

module.exports.execTrx=(trx,store = "", ...params)=> {
	return trx.raw(`Call ${store} (${_.join(_.fill(Array(params.length), '?'),',')})`, params).then(([x]) => {
		if(!_.isArray(x))x=[0,0];
		x.pop();
		if (x.length == 1) x = x[0];
		return x;
	});
}