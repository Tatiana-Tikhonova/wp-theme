const path = {
	build: {
		css: "./css/",
		js: "./js/",
	},
	src: {
		css: "./dev/scss/**/*.scss",
		js: "./dev/js/**/*.js",
	},
	watch: {
		css: "./dev/scss/**/*.scss",
		js: "./dev/js/**/*.js",
	},
	clean: {
		css: "./css/**/*.css",
		js: "./js/**/*.js",
	},
}

const { src, dest } = require('gulp'),
	gulp = require('gulp'),
	del = require("del"),
	scss = require("gulp-sass")(require("sass")),
	autoprefixer = require("gulp-autoprefixer"),
	group_media = require("gulp-group-css-media-queries"),
	clean_css = require("gulp-clean-css"),
	rename = require("gulp-rename"),
	uglify = require("gulp-uglify-es").default,
	babel = require('gulp-babel'),
	include = require('gulp-include'),
	ttf2woff = require('gulp-ttf2woff'),
	ttf2woff2 = require('gulp-ttf2woff2');


function clean() {
	return del(path.clean.css, path.clean.js);
}

function css() {
	return src(path.src.css)
		.pipe(
			scss({
				outputStyle: "expanded"
			})
		)
		.pipe(
			group_media()
		)
		.pipe(
			autoprefixer({
				grid: true,
				cascade: true
			})
		)
		.pipe(dest(path.build.css))
		.pipe(clean_css({
			level: 2 //максимальное сжатие и объединение селекторов с одинаковыми стилями. По умолчанию level: 1
		}))
		.pipe(
			rename({
				extname: ".min.css"
			})
		)
		.pipe(dest(path.build.css));
}

function js() {
	return src(path.src.js)
		.pipe(include())
		.pipe(dest(path.build.js))
		.pipe(babel({
			"presets": [
				[
					"@babel/preset-env",
					{
						"useBuiltIns": "entry",
						"corejs": "3.22"
					}
				]
			],
			"plugins": [
				["@babel/plugin-transform-arrow-functions", { "spec": true }]
			]
		}))
		.pipe(
			uglify()
		)
		.pipe(
			rename({
				extname: ".min.js"
			})
		)
		.pipe(dest(path.build.js));
}

function fonts() {
	src("./src/assets/fonts/**/*.ttf")
		.pipe(ttf2woff())
		.pipe(dest("./build/assets/fonts/"));
	return src("./src/assets/fonts/**/*.ttf")
		.pipe(ttf2woff2())
		.pipe(dest("./build/assets/fonts/"));
};


function watchFiles(done) {
	gulp.watch([path.watch.css], css);
	gulp.watch([path.watch.js], js);
	done();
}

const build = gulp.series(clean, gulp.parallel(css, js));

const watch = gulp.parallel(build, watchFiles);

exports.js = js;
exports.css = css;
exports.build = build;
exports.watch = watch;
exports.default = watch;