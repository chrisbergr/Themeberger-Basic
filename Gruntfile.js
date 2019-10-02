module.exports = function (grunt) {
	'use strict';

	grunt.initConfig({

		pkg: grunt.file.readJSON('package.json'),

		less: {
			deploy_style: {
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
			deploy_other: {
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
			build_style: {
				options: {
					sourceMap: true,
					compress: false,
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
			build_other: {
				options: {
					sourceMap: true,
					compress: false
				},
				files: {
					"./rtl.css": "./less/rtl.less",
					"./admin.css": "./less/admin.less"
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
					sourceMap: false,
					banner: "/*!\n" +
						"Theme Name:   chobz\n" +
						"Theme URI:    cho.bz\n" +
						"Description:  Themeberger Basic Child Theme\n" +
						"Author:       Christian Hockenberger\n" +
						"Author URI:   http://cho.bz\n" +
						"Template:     Themeberger-Basic\n" +
						"Version:      1.0.0\n" +
						"License:      GNU General Public License v2 or later\n" +
						"License URI:  http://www.gnu.org/licenses/gpl-2.0.html\n" +
						"Tags:         responsive-layout, accessibility-ready\n" +
						"Text Domain:  themeberger-basic\n" +
						"*/"
				},
				files: {
					"./child-themes/chobz/style.css": "./child-themes/chobz/less/style.less"
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

	grunt.registerTask('deploy', [
		'less:deploy_style',
		'less:deploy_other',
		'less:child_chobz',
		'replace'
	]);

	grunt.registerTask('build', [
		'less:build_style',
		'less:build_other',
		'less:child_chobz',
		'replace'
	]);

	grunt.registerTask('default', ['build']);

};
