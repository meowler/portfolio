var sasspath = 'sass/';
var csspath = 'dist/';
var cssminpath = 'dist/';

module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		paths: {
			src: {
				scss: 'sass/*.scss',
				css: 'dist/*.css',
				js: 'scripts/*.js',
				png: 'assets/*.png',
				svg: 'assets/*.svg',
				jpg: 'assets/*.jpg'
			},
			dest: {
				css: 'dist/styles.css',
				cssmin: 'dist/',
				js: 'dist/scripts.js',
				jsmin: 'dist/scripts.min.js',
				png: 'assets/minified/',
				svg: 'assets/minified/',
				jpg: 'assets/minified/'
			}
		},
		sass: {
			dev: {
				options: {
					style: 'nested'
				},
				files: [
					{
						expand: true,
						cwd: sasspath,
						src: ['**/*.scss'],
						dest: csspath,
						ext: '.css'
					}
				]
			},
			dist: {
				options: {
					style: 'compressed'
				},
				files: [
					{
						expand: true,
						cwd: csspath,
						src: ['**/*.css'],
						dest: cssminpath,
						ext: '.min.css'
					}
				]
			}
		},
		autoprefixer: {
			dist: {
				files: [
					{
						expand: true,
						cwd: csspath,
						src: ['**/*.css'],
						dest: csspath,
						ext: '.css'
					}
				]
			}
		},
		uglify: {
			options: {
				compress: true,
				mangle: true,
				sourceMap: true
			},
			js: {
				src: '<%= paths.src.js %>',
				dest: '<%= paths.dest.jsmin%>'
			}
		},
		imagemin: {
			png: {
				options: {
					optimizationLevel: 7
				},
				files: [
					{
						// Set to true to enable the following options…
						expand: true,
						src: '<%= paths.src.png %>',
						// Could also match cwd line above. i.e. project-directory/img/
						dest: '<%= paths.dest.png %>',
						ext: '.png'
					}
				]
			},
			svg: {
				options: {
					optimizationLevel: 7
				},
				files: [
					{
						// Set to true to enable the following options…
						expand: true,
						src: '<%= paths.src.svg %>',
						// Could also match cwd line above. i.e. project-directory/img/
						dest: '<%= paths.dest.svg %>',
						ext: '.svg'
					}
				]
			},
			jpg: {
				options: {
					progressive: true
				},
				files: [
					{
						expand: true,
						src: '<%= paths.src.jpg %>',
						dest: '<%= paths.dest.jpg %>',
						ext: '.jpg'
					}
				]
			}
		},
		watch: {
			styles: {
				files: ['<%= paths.src.scss %>'],
				tasks: ['sass', 'autoprefixer']
			},
			scripts: {
				files: ['<%= paths.src.js %>'],
				tasks: ['uglify']
			}
		}
	});
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-imagemin');

	grunt.registerTask('default', ['sass', 'autoprefixer', 'uglify', 'watch']);
};
