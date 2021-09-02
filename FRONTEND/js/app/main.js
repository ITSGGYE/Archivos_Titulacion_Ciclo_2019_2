Quasar.lang.set(Quasar.lang.es);

new Vue({
	mixins: [helpersComponents, helpersApp],
	el: "#q-app",
	data() {
		return {
			titlePage: "",
			currentPage: null,
		};
	},
	methods: {},
	mounted() {
		var url = new URL(window.location.href);
		var params = {};
		for (let p of url.searchParams) {
			params[p[0]] = p[1];
		}

		var r = localStorage.getItem(_.camelCase(CONFIG.APP_NAME));

		if (_.isNull(r)) {
			this.page("login", {});
		} else {
			this.page("dashboard", {});
		}
	},
});
