require('dotenv').config();
var knex = require('knex');
var KnexQueryBuilder = require('knex/lib/query/builder');

var knexClient = knex({
	client: process.env.DB_ENGINE,
	version: process.env.DB_VERSION,
	connection: {
		host: process.env.DB_HOST,
		port: process.env.DB_PORT,
		user: process.env.DB_USER,
		password: process.env.DB_PASSWORD,
		database: process.env.DB_NAME
	}
});

KnexQueryBuilder.prototype.innerJoin2=function (table, alias, join) {
	return this.innerJoin(`${table} as ${alias}`, function (){
		this.on(`${alias}.id`, join)
			.onNull(`${alias}.deleted_at`)
			.andOn(`${alias}.id_ctlg_estados`, 1);
	});
};

KnexQueryBuilder.prototype.innerJoin3=function (table, alias, join) {
	return this.innerJoin(`${table} as ${alias}`, function (){
		this.on(`${alias}.id`, join)
			.onNull(`${alias}.deleted_at`);
	});
};


knexClient.queryBuilder = function(){
	return new KnexQueryBuilder(knexClient.client);
};


module.exports =knexClient;
