'use strict';

module.exports = function(grunt) {
	// Unified Files
	var files = {
        vendorJS: [
            'vendor/js/infinite-scroll.pkgd.min.js',
            'vendor/js/jarallax.js',
            'vendor/js/jarallax-element.js',
            'vendor/js/vendor.js',
        ],
        tabsJS: [
            'vendor/js/tabs.js',
        ],
        themeCSS: [
            'style.css',
        ]
    };

    // Project Configuration
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            production: {
                options: {
                    mangle: false
                },
                files: {
                    'vendor/dist/vendor.min.js': files.vendorJS,
                    'vendor/dist/tabs.min.js': files.tabsJS,
                }
            }
        },
        cssmin: {
            combine: {
                files: {
                    'style.min.css': files.themeCSS
                }
            }
        }
    });

    // Load NPM tasks
    require('load-grunt-tasks')(grunt);

    // Making grunt default to force in order not to break the project.
    grunt.option('force', true);

    // Default task(s).
    grunt.registerTask('default', ['build']);

    // Build task(s).
    grunt.registerTask('build', ['uglify', 'cssmin']);
};
