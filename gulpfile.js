
//CSS
const {src, dest, watch, parallel} = require('gulp'); // identificar, guardar, ver
const  sass = require('gulp-sass')(require('sass')); 
const plumber = require('gulp-plumber'); //dependencia que evita el programa se pare por un error
//IMAGENES
const cache = require ('gulp-cache');
const imagemin = require ('gulp-imagemin');
const webp = require ('gulp-webp');


function css(done){

    src("src/scss/**/*.scss")//IDENTIFICAR EL ARCHIVO SASS = src es el que identifica el archivo
 
    .pipe(plumber()) //ejecuta la dependencia para que cuando se presente un error no se detenga
    .pipe(sass())  // COMPILARLO//.pipe es quien ejecuto o ocmpila el archivo 
    .pipe(dest("build/css"))  //build/css es donde //ALMACENARLO EN EL DISCO DURO FUNCION Dest es el que guarda el archivo se guarda el archivo

    done();//callback avisa a gulp cuando la funcion finaliza 
}

function imagenes (done){
    const opciones = {
        optimizationLevel:3
    }
    src('src/img/**/*.{png,jpg}')
        .pipe( cache( imagemin(opciones) ) )
        .pipe( dest('build/img'))
    done();
}

function versionWebp(done){
    const opciones = {
        quality: 50
    };

    src('src/img/**/*.{png,jpg}')
        .pipe( webp(opciones) )
        .pipe( dest('build/img'))
    done();
}


function javascript( done ){
    src('src/js/**/*.js')
        .pipe(dest('build/js'));
    done();
}

function dev(done){ //funcion que guarda automaticamente los cambios en la hoja de estilos app.
    watch('src/scss/**/*.scss', css);//Identificar el archivo de SASS
    watch('src/js/**/*.js', javascript);//Identificar el archivo de javascript
    done();
}



exports.css = css;
exports.imagenes = imagenes;
exports.versionWebp = versionWebp;
exports.js = javascript;
exports.dev = parallel (imagenes, versionWebp, javascript, dev);