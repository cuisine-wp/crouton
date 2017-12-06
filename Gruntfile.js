module.exports = function (grunt) {

    'use strict';
    var banner = '/**\n * <%= pkg.homepage %>\n * Copyright (c) <%= grunt.template.today("yyyy") %>\n * This file is generated automatically. Do not edit.\n */\n';
    // Project configuration
    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        addtextdomain: {
            options: {
                textdomain: 'talkjs',
            },
            update_all_domains: {
                options: {
                    updateDomains: true
                },
                src: ['*.php', '**/*.php', '!node_modules/**', '!php-tests/**', '!bin/**']
            }
        },

        wp_readme_to_markdown: {
            your_target: {
                files: {
                    'README.md': 'readme.txt'
                }
            },
        },

        makepot: {
            target: {
                options: {
                    domainPath: '/languages',
                    mainFile: 'talkjs.php',
                    potFilename: 'talkjs.pot',
                    potHeaders: {
                        poedit: true,
                        'x-poedit-keywordslist': true
                    },
                    type: 'wp-plugin',
                    updateTimestamp: true
                }
            }
        },

        uglify: {
            build: {
                src: 'Assets/dist/css/admin.css',
                dest: 'Assets/dist/css/admin.min.css'
            }
        },

        sass: {
            dist: {
                options: {
                    style: 'expanded',
                },
                files: {
                    'Assets/dist/css/admin.css': 'Assets/src/sass/main.scss',
                }
            }
        },

        babel: {
            options: {
                sourceMap: true,
                presets: ['env']
            },
            dist: {
                files: {
                    'Assets/dist/js/app.js': 'Assets/src/js/plugin.js'
                }
            }
        },


        watch: {
            css: {
                files: ['Assets/src/sass/*.scss', 'Assets/src/sass/**/*.scss'],
                tasks: ['sass']
            },
            scripts: {
                files: 'Assets/src/js/*.js',
                tasks: ['babel']
            },
        }

    });

    grunt.loadNpmTasks('grunt-browserify');
    grunt.loadNpmTasks('grunt-wp-i18n');
    grunt.loadNpmTasks('grunt-wp-readme-to-markdown');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-babel');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('i18n', ['addtextdomain', 'makepot']);
    grunt.registerTask('readme', ['wp_readme_to_markdown']);

    grunt.registerTask('default', ['sass', 'babel']);
    grunt.registerTask('build', ['sass', 'babel', 'uglify'])

    grunt.util.linefeed = '\n';

};
