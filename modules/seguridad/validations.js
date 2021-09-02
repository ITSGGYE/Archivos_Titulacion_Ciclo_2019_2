const Joi = require('@hapi/joi');


module.exports.id =Joi.number().greater(0).integer();


module.exports.correo = Joi.string().email();


module.exports.contrasena = Joi.string()
	.pattern(new RegExp('^[a-zA-Z0-9]{3,30}$'));


module.exports.iniciar_sesion = Joi.object({
	correo: this.correo.required(),
	contrasena: this.contrasena.required()
});
