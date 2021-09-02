var pars = {
	local: false,
	dev: true,
	beta: false,
};

var uxc = new URL(window.location.href);
for (let p of uxc.searchParams) {
	pars[p[0]] = p[1];
}

if (pars.args) {
	pars.args
		.split(",")
		.map((v) => {
			return v.trim();
		})
		.forEach((v) => {
			pars[v] = true;
		});
	delete pars.args;
}

var ut = new URL(window.location.href);

var host = (function (url) {
	return function (path) {
		if (typeof path == "undefined") return url;
		return url + path;
	};
})(ut.origin);

var CONFIG = {
	APP_NAME: "Interamericana",
	APP_NAME_SHORT: "Inter",
	PASSWORD_DEFAULT: "123456",
	HOST: host(),
	API_BASE: host(),
	API: host("/api"),
	VIEWS: host("/views"),
	PUBLIC: host(),
	YEAR: ((d) => d.getFullYear())(new Date()),
	COLOR_BASE: "rgb(224,0,151)",
	CTRLM_URI: "http://localhost:666",
};

for (let xy in pars) {
	CONFIG[xy.toUpperCase()] = pars[xy];
}

document.title = CONFIG.APP_NAME;

function xtemplate(uri, blob) {
	return new Promise((resolve, reject) => {
		const reader = new FileReader();
		reader.addEventListener("loadend", (e) => {
			const text = e.srcElement.result;
			var tag = document.createElement("script");
			tag.id = uri.split("/").pop().split(".").shift();
			tag.charset = "UTF-8";
			tag.type = "text/x-template";
			tag.innerHTML = text;

			return resolve(tag);
		});

		reader.readAsText(blob);
	});
}

((...xxxx) => {
	var head = document.getElementsByTagName("head")[0];
	var body = document.getElementsByTagName("body")[0];

	/*var te=xxxx.reduce(function(a, b){
		return a.concat(b);
	}).length;
	var tcc=0;*/

	//https://tobiasahlin.com/spinkit/

	var ty = new Blob(
		[
			`
		.frt{
			position:fixed;
			top:0;
			bottom:0;
			left:0;
			right:0;
			display: flex;
			flex-wrap: nowrap;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			align-content: center
		}
	
		.frt .item {
			flex: 0 0 auto;
			margin: 10px;
		}
	
		#myProgress {
			width: 100%;
			background-color: #ddd;
		}
		#myBar {
			width: 1%;
			height: 30px;
			background-color: ${CONFIG.COLOR_BASE};
		}
		.spinner>div {
			width: 18px;
			height: 18px;
			background-color: ${CONFIG.COLOR_BASE};
			border-radius: 100%;
			display: inline-block;
			-webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
			animation: sk-bouncedelay 1.4s infinite ease-in-out both;
		}
		
		.spinner .bounce1 {
			-webkit-animation-delay: -0.32s;
			animation-delay: -0.32s;
		}
		
		.spinner .bounce2 {
			-webkit-animation-delay: -0.16s;
			animation-delay: -0.16s;
		}
		
		@-webkit-keyframes sk-bouncedelay {
			0%,
			80%,
			100% {
				-webkit-transform: scale(0)
			}
			40% {
				-webkit-transform: scale(1.0)
			}
		}
		
		@keyframes sk-bouncedelay {
			0%,
			80%,
			100% {
				-webkit-transform: scale(0);
				transform: scale(0);
			}
			40% {
				-webkit-transform: scale(1.0);
				transform: scale(1.0);
			}
		}
	`,
		],
		{ type: "text/css" }
	);

	var tagx = document.createElement("link");
	tagx.rel = "stylesheet";
	tagx.href = URL.createObjectURL(ty);
	head.appendChild(tagx);

	var progressBar = document.createElement("div");
	//progressBar.className='Aligner';
	progressBar.className = "frt";

	/*progressBar.innerHTML=`
		<div class="Aligner-item">
			<div class="lds-ring"><div></div><div></div><div></div><div></div></div>
		</div>
	`;*/

	/*progressBar.innerHTML=`
		<div id="myProgress" class="Aligner-item">
			<div id="myBar"></div>
		</div>
	`;*/

	progressBar.innerHTML = `
		<div class="item">
			<div class="spinner">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>
	`;

	body.appendChild(progressBar);

	//var bar=document.getElementById("myBar");

	function cret(tagName, blobObj, isBlob = true, id = "") {
		if (tagName == "js") {
			var tag = document.createElement("script");
			tag.src = isBlob ? URL.createObjectURL(blobObj) : blobObj;
			tag.charset = "UTF-8";
			tag.crossorigin = "anonymous";
			return tag;
		} else if (tagName == "css") {
			var tag = document.createElement("link");
			tag.rel = "stylesheet";
			tag.crossorigin = "anonymous";
			tag.href = isBlob ? URL.createObjectURL(blobObj) : blobObj;
			return tag;
		}
	}

	function xxx(head, body, ...urls) {
		var url = urls.shift();
		if (typeof url === "object") {
			return Promise.all(
				url.map((uri) => {
					if (/^\*/.test(uri)) {
						uri = uri.substring(1);
						uri = /^https?/.test(uri) ? uri : CONFIG.PUBLIC + uri;
						if (/\.js$/.test(uri))
							body.appendChild(cret("js", uri, false));
						else if (/\.css$/.test(uri))
							head.appendChild(cret("css", uri, false));
						return Promise.resolve(true);
					} else {
						uri = /^https?/.test(uri) ? uri : CONFIG.PUBLIC + uri;
						return fetch(uri, {
							mode: "cors",
						})
							.then((r) => {
								if (!r.ok) throw `No se pudo cargar ${r.url}`;
								return r.blob();
							})
							.then((b) => {
								if (
									b.type === "application/javascript" ||
									b.type === "application/x-javascript"
								) {
									body.appendChild(cret("js", b, true));
									//tcc++;
									//bar.style.width = (tcc*100)/te + "%";
									return true;
								} else if (b.type === "text/css") {
									head.appendChild(cret("css", b, true));
									//tcc++;
									//	bar.style.width = (tcc*100)/te + "%";
									return true;
								} else if (b.type === "text/html") {
									return xtemplate(uri, b).then((tag) => {
										head.appendChild(tag);
										//	tcc++;
										//	bar.style.width = (tcc*100)/te + "%";
										return true;
									});
								}
							});
					}
				})
			).then((v) => {
				return urls.length > 0 ? xxx(head, body, ...urls) : "ok";
			});
		}
	}
	xxx(head, body, ...xxxx)
		.then((r) => {
			//console.log(r);
		})
		.catch((e) => {
			var errorLoad = document.createElement("div");
			errorLoad.className = "Aligner";
			errorLoad.innerHTML = `
			<div class="Aligner-item">
				${e}
			</div>
		`;
			body.appendChild(errorLoad);
		})
		.finally(() => {
			body.removeChild(progressBar);
		});
})(
	[
		"*/css/fonts.css",
		"/vendors/animate.min.css",
		"/vendors/moment.min.js",
		"/vendors/quasar.min.css",
	],
	[
		//	"/html/dashboard.html",
		//	"/html/login.html"
	],
	["/css/main.css"],
	[
		"/vendors/socket.io.js",
		"/vendors/push.min.js",
		"/vendors/lodash.min.js",
		"/vendors/axios.min.js",
		"/vendors/vue.js",
	],
	[
		"/vendors/moment.es.js",
		//'/vendors/vue-router.js',
		"/vendors/quasar.umd.min.js",
		"/vendors/httpVueLoader.js",
	],
	["/vendors/es.umd.min.js", "/js/bundle.js"]
);
