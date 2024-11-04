const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const path = require("path");
const file = require("gulp-file");
const terser = require("gulp-terser");
const cleanCSS = require("gulp-clean-css");
const newer = require("gulp-newer");
const browserify = require('browserify');
const babelify = require('babelify');
const source = require('vinyl-source-stream');
const buffer = require('vinyl-buffer'); 
const glob = require('glob');
const rename = require('gulp-rename'); 
const notify = require('gulp-notify');
const fs = require("fs");

function insertAOSCssToGlobalScss() {
    const aosCssPath = path.join(__dirname, 'node_modules/aos/dist/aos.css');
    const globalScssPath = path.join(__dirname, 'src/scss/global.scss');

    return new Promise((resolve, reject) => {
        fs.readFile(aosCssPath, 'utf8', (err, aosCssContent) => {
            if (err) {
                return reject(err);
            }
            fs.readFile(globalScssPath, 'utf8', (err, globalScssContent) => {
                if (err) {
                    return reject(err);
                }
                const newContent = `${aosCssContent}\n${globalScssContent}`;
                fs.writeFile(globalScssPath, newContent, 'utf8', (err) => {
                    if (err) {
                        return reject(err);
                    }
                    resolve();
                });
            });
        });
    });
}

function buildPagesStyles() {
    return gulp
        .src("./src/scss/landing-pages/*.scss")
        .pipe(newer('./assets/css/landing-pages'))
        .pipe(sass().on("error", sass.logError))
        .pipe(cleanCSS())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('./assets/css/landing-pages'))
        .pipe(notify({ message: 'Landing pages CSS built!', onLast: true }));
}

function buildMainStyle() {
    return gulp
        .src("./src/scss/global.scss")
        .pipe(newer("./assets/css")) 
        .pipe(sass().on("error", sass.logError))
        .pipe(cleanCSS())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest("./assets/css"))
        .pipe(notify({ message: 'Global CSS built!', onLast: true }));
}

function compileAndMinifyAllScripts(done) {
    glob("./src/js/**/*.js", function (err, files) {
        if (err) return done(err);
        files.forEach(function (file) {
            const relativePath = path.relative('./src/js', file); 
            const destPath = path.dirname(relativePath); 
            browserify({ entries: file, debug: true })
                .transform(babelify, { presets: ['@babel/preset-env'] })
                .bundle()
                .pipe(source(path.basename(file)))
                .pipe(buffer())
                .pipe(terser())
                .pipe(rename({ suffix: '.min' }))
                .pipe(gulp.dest(path.join("./assets/js", destPath)))
                .pipe(notify({ message: `Script ${path.basename(file)} compiled!`, onLast: true }));
        });
        done();
    });
}

async function optimizeAndConvertImages() {
    const imagemin = (await import('gulp-imagemin')).default;
    const webp = (await import('gulp-webp')).default;

    return gulp.src("./src/img/**/*.{png,jpg,jpeg,gif,svg}", {encoding: false})
        .pipe(imagemin({
            optimizationLevel: 5,
            progressive: true,
            interlaced: true,
            svgoPlugins: [{ removeViewBox: false }]
        }))
        .pipe(webp())
        .pipe(gulp.dest("./assets/img/"))
        .pipe(notify({ message: 'Images optimized and converted to WebP!', onLast: true }));
}

async function optimizeAndConvertIcons() {
    const imagemin = (await import('gulp-imagemin')).default;
    const webp = (await import('gulp-webp')).default;

    return gulp.src("./src/icons/**/*.{png,jpg,jpeg,gif,svg}", {encoding: false})
        .pipe(imagemin({
            optimizationLevel: 5,
            progressive: true,
            interlaced: true,
            svgoPlugins: [{ removeViewBox: false }]
        }))
        .pipe(webp())
        .pipe(gulp.dest("./assets/icons/"))
        .pipe(notify({ message: 'Icons optimized and converted to WebP!', onLast: true }));
}

function copyFonts() {
    return gulp.src("./src/fonts/**/*", {encoding: false})
        .pipe(gulp.dest("./assets/fonts/"))
        .pipe(notify({ message: 'Fonts copied!', onLast: true }));
}

function watchFiles() {
    gulp.series(
        gulp.parallel(insertAOSCssToGlobalScss, buildPagesStyles, buildMainStyle, compileAndMinifyAllScripts, optimizeAndConvertImages, optimizeAndConvertIcons, copyFonts)
    )();

    gulp.watch("./src/img/**/*", optimizeAndConvertImages);
    gulp.watch("./src/js/**/*.js", compileAndMinifyAllScripts);
    gulp.watch("./src/scss/**/*.scss", gulp.series(buildPagesStyles, buildMainStyle));
}

exports.build = gulp.series(gulp.parallel(insertAOSCssToGlobalScss, buildPagesStyles, buildMainStyle, compileAndMinifyAllScripts, optimizeAndConvertImages, optimizeAndConvertIcons, copyFonts));
exports.watch = watchFiles;
