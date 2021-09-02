const Joi = require('@hapi/joi');

module.exports.id =Joi.number().greater(0).integer();

module.exports.usuario = Joi.string()
	.alphanum()
	.min(3)
	.max(30);


module.exports.correo = Joi.string().email();


module.exports.contrasena = Joi.string()
	.pattern(new RegExp('^[a-zA-Z0-9]{3,30}$'));

