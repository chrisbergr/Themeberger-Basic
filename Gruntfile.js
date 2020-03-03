module.exports = function (grunt) {
	'use strict';

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		less: {
			style: {
				options: {
					compress: false,
					plugins: [
						new(require("less-plugin-clean-css"))({
							"advanced": true
						})
					],
					sourceMap: false,
					banner: "/*!\n" +
						"Theme Name:   	<%= pkg.themeName %>\n" +
						"Theme URI:    	<%= pkg.homepage %>\n" +
						"Github Theme URI: <%= pkg.homepage %>\n" +
						"Author:         <%= pkg.author.name %>\n" +
						"Author URI:     <%= pkg.author.url %>\n" +
						"Description:  	<%= pkg.description %>\n" +
						"Version:      	<%= pkg.version %>\n" +
						"License:      	<%= pkg.license.name %> <%= pkg.license.version %>\n" +
						"License URI:  	<%= pkg.license.url %>\n" +
						"Text Domain:  	<%= pkg.textdomain %>\n" +
						"Tags:         	<%= pkg.tags %>\n" +
						"*/"
				},
				files: {
					"./style.css": "./less/style.less"
				}
			},
			other: {
				options: {
					compress: false,
					plugins: [
						new(require("less-plugin-clean-css"))({
							"advanced": true
						})
					],
					sourceMap: false
				},
				files: {
					"./rtl.css": "./less/rtl.less",
					"./admin.css": "./less/admin.less"
				}
			},
			deploy_theme: {
				options: {
					compress: false,
					plugins: [
						new(require("less-plugin-clean-css"))({
							"advanced": true
						})
					],
					sourceMap: false
				},
				files: {
					"./assets/themeberger-basic.min.css": "./less/index.less"
				}
			},
			build_theme: {
				options: {
					sourceMap: true,
					compress: false
				},
				files: {
					"./assets/themeberger-basic.min.css": "./less/index.less"
				}
			},
			child_chobz_theme: {
				options: {
					compress: false,
					plugins: [
						new(require("less-plugin-clean-css"))({
							"advanced": true
						})
					],
					sourceMap: false,
					banner: "/*!\n" +
						"Theme Name:   chobz\n" +
						"Theme URI:    cho.bz\n" +
						"Description:  Themeberger Basic Child Theme\n" +
						"Author:       Christian Hockenberger\n" +
						"Author URI:   http://cho.bz\n" +
						"Template:     Themeberger-Basic\n" +
						"Version:      <%= pkg.version %>\n" +
						"License:      GNU General Public License v2 or later\n" +
						"License URI:  http://www.gnu.org/licenses/gpl-2.0.html\n" +
						"Tags:         responsive-layout, accessibility-ready\n" +
						"Text Domain:  themeberger-basic\n" +
						"*/"
				},
				files: {
					"./child-themes/chobz/style.css": "./child-themes/chobz/less/style.less"
				}
			},
			child_chobz: {
				options: {
					compress: false,
					plugins: [
						new(require("less-plugin-clean-css"))({
							"advanced": true
						})
					],
					sourceMap: false
				},
				files: {
					"./child-themes/chobz/assets/chobz.min.css": "./child-themes/chobz/less/index.less"
				}
			}
		},

		uglify: {
			themeberger_basic: {
				options: {
					//banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %> */',
					beautify: true,
					preserveComments: false,
					wrap: '<%= pkg.name %>',
					sourceMap: false,
					compress: {
						drop_console: false
					},
					output: {
						quote_style: 1
					},
					mangle: true,
					omangle: {
						properties: true
					}
				},
				files: {
					'./assets/themeberger-basic.min.js': [
						'javascripts/index.js'
					]
				}
			},
			child_chobz: {
				options: {
					//banner: '/*! <%= pkg.name %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %> */',
					beautify: false,
					preserveComments: false,
					wrap: 'chobz',
					sourceMap: false,
					compress: {
						drop_console: true
					},
					output: {
						quote_style: 1
					},
					mangle: true,
					omangle: {
						properties: true
					}
				},
				files: {
					'child-themes/chobz/assets/chobz.min.js': [
						'assets/themeberger-basic.min.js',
						'child-themes/chobz/javascript/chobz.js',
						'child-themes/chobz/javascript/chobz-ui.js',
						'child-themes/chobz/javascript/chobz-slider.js'
					]
				}
			}
		},

		replace: {
			functions_php: {
				src: ['functions.php'], // source files array (supports minimatch)
				dest: 'functions.php', // destination directory or file
				replacements: [{
					from: /\'THEME_VERSION\'\, \'(.*)\'/g,
					to: "'THEME_VERSION', '<%= pkg.version %>'"
				}]
			}
		}

	});

	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-text-replace');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.registerTask('deploy', [
		'less:deploy_theme',
		'less:style',
		'less:other',
		'less:child_chobz_theme',
		'less:child_chobz',
		'uglify:themeberger_basic',
		'uglify:child_chobz',
		'replace'
	]);

	grunt.registerTask('build', [
		'less:build_theme',
		'less:style',
		'less:other',
		'less:child_chobz_theme',
		'less:child_chobz',
		'uglify:themeberger_basic',
		'uglify:child_chobz',
		'replace'
	]);

	grunt.registerTask('default', ['build']);

};
