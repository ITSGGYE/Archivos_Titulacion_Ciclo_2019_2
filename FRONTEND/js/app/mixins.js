var fns_sections = {
	methods: {
		init() {
			if (!_.isNull(this.$root.currentPage.currentSection))
				this.$root.currentPage.currentSection.close();

			this.$root.currentPage.qpagecontainer.$el.appendChild(
				this.$mount().$el
			);
			this.$root.currentPage.currentSection = this;
			this.$root.currentPage.sectionActive = this.optionSel;
			this.$q.loading.hide();
		},
		close() {
			if (this.$root.currentPage.currentSection === this) {
				this.$root.currentPage.currentSection = null;
				//this.$root.titlePage('');
			}

			if (!_.isUndefined(this.$el))
				this.$root.currentPage.qpagecontainer.$el.removeChild(this.$el);

			_.forEach(
				this.$root.currentPage.qpagecontainer.$children,
				(v, i) => {
					if (v === this)
						this.$delete(
							this.$root.currentPage.qpagecontainer.$children,
							i
						);
				}
			);

			this.$destroy();
		},
		/*refresh() {
			this.section(this.value.section, true);
		}*/
	},
};

var fns_pages = {
	data() {
		return {
			currentSection: null,
		};
	},
	mounted() {
		var qlayout = _.find(this.$children, (o) => {
			return o.$options._componentTag == "q-layout";
		});
		this.qpagecontainer = _.find(qlayout.$children, (o) => {
			return o.$options._componentTag == "q-page-container";
		});
	},
	methods: {
		init() {
			if (!_.isNull(this.$root.currentPage))
				this.$root.currentPage.close();
			this.$root.$el.appendChild(this.$mount().$el);
			this.$root.currentPage = this;
			this.$q.loading.hide();
		},
		close() {
			if (this.$root.currentPage === this) {
				this.$root.currentPage = null;
				//this.$root.titlePage('');
			}

			if (!_.isUndefined(this.$el)) this.$root.$el.removeChild(this.$el);

			_.forEach(this.$root.$children, (v, i) => {
				if (v === this) this.$delete(this.$root.$children, i);
			});

			this.$destroy();
		},
	},
};

var helpersApp = {
	data() {
		return {}; // _.merge(JSON.parse(localStorage.getItem(_.camelCase(CONFIG.APP_NAME))), {});
	},
	mounted() {
		this.setTitlePage(CONFIG.APP_NAME);
	},
	beforeCreate() {
		//var np = _.camelCase(CONFIG.APP_NAME);
		//var t = localStorage.getItem(np);
		/*if (_.isNull(t)) localStorage.setItem(np, JSON.stringify({
			titlePage: '',
			currentPage: null
		}));*/
	},
};

var fns_modals = {
	data() {
		return {
			state: false,
		};
	},
	watch: {
		state: {
			deep: true,
			handler(val) {
				if (!val) {
					if (!_.isUndefined(this.$el))
						this.$root.$el.removeChild(this.$el);
					_.forEach(this.$root.$children, (v, i) => {
						if (v === this) this.$delete(this.$root.$children, i);
					});
					this.$destroy();
				}
			},
		},
	},
	methods: {
		init() {
			this.$root.$el.appendChild(this.$mount().$el);
			this.$q.loading.hide();
			this.state = true;
		},
		close() {
			this.state = false;
		},
	},
};

var helpersComponents = {
	data() {
		return {
			CONFIG: CONFIG,
		};
	},
	methods: {
		report(nameReport, columns, data) {
			var j = {
				name: nameReport,
				title: "Escuela Interamericana",
				subtitle: "reporte de estudiantes",
				cols: _.map(columns, (i) => {
					return [i.name, i.label];
				}),
				data: data,
			};

			axios({
				method: "post",
				url: api("catalogos/report"), //"http://localhost:3000/ex", //api("catalogos/report"),
				data: j,
				responseType: "blob",
			}).then((response) => {
				const url = window.URL.createObjectURL(
					new Blob([response.data])
				);
				const link = document.createElement("a");
				link.href = url;
				link.setAttribute("download", `${nameReport}.xlsx`);
				document.body.appendChild(link);
				link.click();
			});
		},
		/*	rep(nameReport, dres, data) {
			var j = {
				name: nameReport,
				title: "Escuela Interamericana",
				subtitle: "reporte de estudiantes",
				cols: _.map(dres, (i) => {
					return [i.name, i.label];
				}),
				data: data,
			};

			axios({
				method: "post",
				url: api("catalogos/report"), //"http://localhost:3000/ex", //api("catalogos/report"),
				data: j,
				responseType: "blob",
			}).then((response) => {
				const url = window.URL.createObjectURL(
					new Blob([response.data])
				);
				const link = document.createElement("a");
				link.href = url;
				link.setAttribute("download", `${nameReport}.xlsx`);
				document.body.appendChild(link);
				link.click();
			});
		},*/
		modal(modal, data = {}) {
			var name = _.camelCase(`${modal}_modal`);
			this.$q.loading.show();
			return httpVueLoader(`./views/modals/${modal}.vue`)()
				.then((r) => {
					r.mixins = [
						helpersComponents,
						fns_modals,
						{
							data: () =>
								_.merge(
									{
										title: name,
									},
									data,
									{
										name,
									}
								),
						},
					];
					return Vue.component(name, r);
				})
				.then((component) => {
					return new component({
						parent: this,
						propsData: {},
					});
				})
				.catch((r) => {
					this.$q.loading.hide();
					this.$q.notify({
						type: "negative",
						message: r.message || "Hubo error al cargar el modal",
					});
				});
		},
		page(page, data = {}) {
			var name = _.camelCase(`${page}_page`);
			this.$q.loading.show();
			return httpVueLoader(`./views/pages/${page}.vue`)()
				.then((r) => {
					r.mixins = [
						helpersComponents,
						fns_pages,
						{
							data: () =>
								_.merge(
									{
										title: name,
									},
									data,
									{
										name,
									}
								),
						},
					];
					return Vue.component(name, r);
				})
				.then((component) => {
					return new component({
						parent: this.$root,
						propsData: {},
					});
				})
				.catch((r) => {
					this.$q.loading.hide();
					this.$q.notify({
						type: "negative",
						message: r.message || "Hubo error al cargar la pagina",
					});
				});
		},
		section(section, data = {}) {
			var name = _.camelCase(`${section}_section`);
			this.$q.loading.show();
			return httpVueLoader(`./views/sections/${section}.vue`)()
				.then((r) => {
					r.mixins = [
						helpersComponents,
						fns_sections,
						{
							data: () =>
								_.merge(
									{
										title: name,
									},
									data,
									{
										name,
									}
								),
						},
					];
					return Vue.component(name, r);
				})
				.then((component) => {
					return new component({
						parent: this.$root.currentPage.qpagecontainer,
						propsData: {},
					});
				})
				.catch((r) => {
					this.$q.loading.hide();
					this.$q.notify({
						type: "negative",
						message: r.message || "Hubo error la seccion",
					});
				});
		},
		asset(url) {
			return CONFIG.PUBLIC + url;
		},
		methodToHuman() {
			return methodToHuman.apply(this, arguments);
		},
		boolToHuman() {
			return boolToHuman.apply(this, arguments);
		},
		setTitlePage(title = "", notifications = 0) {
			//this.$root._title_(title);
			//this.$root._titlePage_.apply(this, arguments);
			var s = [];
			//if(!_.isNull(_.get(this.app,'notifications',null)))n=this.app.notifications.length;
			if (_.isString(title)) {
				title = _.trim(title);
				if (title !== "") {
					this.$root.titlePage = title;
					s.push(title);
				} else {
					this.$root.titlePage = CONFIG.APP_NAME;
				}
			}

			s.push(CONFIG.APP_NAME);
			s = _.uniq(s);
			if (notifications > 0) s[0] = `(${notifications}) ${s[0]}`;
			//if(n>0)s[0]=`(${n}) ${s[0]}`;
			document.title = _.join(s, " | ");
		},
	},
};
