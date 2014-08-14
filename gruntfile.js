module.exports = function (grunt) {

	// npm install -g grunt-cli
	// npm update -g
	// npm install grunt-contrib-cssmin --save-dev
	// npm install grunt-contrib-sass
	// npm install grunt-contrib-clean
	// npm install grunt-contrib-uglify
	// npm install grunt-contrib-copy
	// npm install grunt-contrib-watch
	// npm install grunt-legacy-util
	// npm install grunt-legacy-log
	// npm install abbrev



	grunt.initConfig({


	   
		pkg: grunt.file.readJSON('package.json'),

		watch: {
			scripts: {
				files: ['app/webroot/scss/*.scss'],
				tasks: ['sass', 'cssmin'],
				options: {
					spawn: false,
				},
			},
		},

		sass: {
			dist: {
				options: {
					style: 'expanded'
				},
				files: {
					'app/webroot/scss/compiled/style.css': 'app/webroot/scss/style.scss'
				}
			}
		},

		cssmin: {
		  minify: {
			expand: true,
			cwd: 'app/webroot/scss/compiled',
			src: ['*.css', '!*.min.css'],
			dest: 'app/webroot/css',
			ext: '.min.css'
		  }
		},

		uglify: {
			my_target: {
				files: {
					'nero/JKR.Web/assets/js/main-min.js': ['nero/JKR.Web/Build Assets/js/plugins.js', 'nero/JKR.Web/Build Assets/js/main.js']
				}
			}
		},
		
		clean: {
			build: {
				src: [
					"nero/JKR.Web/Build Assets/stylesheets/lib/styles.css",
					"nero/JKR.Web/assets/img/"
				]
			}
		},

		copy: {
			main: {
				files: [
					//{ expand: true, src: ['nero/JKR.Web/Build Assets/js/*'], dest: 'dest/', filter: 'isFile'},
					{ expand: true, cwd: 'nero/JKR.Web/Build Assets/js/lib/', src: ['**'], dest: 'nero/JKR.Web/assets/js/' },
					{ expand: true, cwd: 'nero/JKR.Web/Build Assets/img/', src: ['**'], dest: 'nero/JKR.Web/assets/img/' }
				]
			}
		}
	});

	// Load required plugins
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-copy');
	grunt.loadNpmTasks('grunt-contrib-clean');

	// Default build tasks
	//grunt.registerTask('default', ['sass', 'cssmin', 'uglify', 'clean', 'copy']);
	grunt.registerTask('default', ['sass', 'cssmin']);
};