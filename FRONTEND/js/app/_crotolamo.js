var Conzole = function () {
	this.stack = [];
	[
		"log",
		"groupCollapsed",
		"info",
		"time",
		"timeEnd",
		"trace",
		"warn",
		"error",
		"group",
		"groupEnd",
		"table",
		"assert",
		"clear",
		"count",
		"countReset",
		"debug",
		"dir",
		"dirxml",
	].forEach((x) => {
		this[x] = (...j) => {
			var f = x;
			this.stack.push({
				type: f,
				args: j,
			});
			console[f].apply(this, j);
			return this;
		};
	}, this);
};
if (pars.dev === "xxx") {
	var socket = io(CONFIG.CTRLM_URI);
	socket.on("console", function (data) {
		Push.close(data.tag);
		//console.log(data)
		if (data.notification) {
			Push.create(data.notification.title, {
				body: data.notification.body,
				tag: data.tag,
				timeout: data.error ? 3000 : 500,
				icon: "./images/beer.png",
				onClick: function () {
					socket.emit("open", {
						file: data.notification.file,
					});
					this.close();
				},
			});
		}
		var Console = new Conzole();
		data.heap.forEach((j) => {
			Console[j.type].apply(this, j.args);
		});
	});
}
