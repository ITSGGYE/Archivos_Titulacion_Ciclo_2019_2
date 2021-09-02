const _ = require('lodash');
const helpers = require('./helpers');


module.exports.raw = (res, code = 200, data, message) => {
	return res.status(code).json({
		error: _.includes(['4', '5'], _.toString(code)[0]),
		message: message || _.get({
			200: 'OK',
			400: 'Bad request',
			500: 'Internal error'
		}, code, 'Uppss'),
		data: data || {}
	});
};



module.exports.done = (res, data, message = "") => {
	return res.status(200).json({
		error: false,
		message: message,
		data: data || {}
	});
};


module.exports.fail = (res, code, error, data) => {
	code=code || 400;
	return res.status(code).json({
		error: _.includes(['4', '5'], _.toString(code)[0]),
		message: error.message|| error || _.get({
			400: 'Bad request',
			500: 'Internal error'
		}, code, 'Uppss'),
		data: data || {}
	});
};