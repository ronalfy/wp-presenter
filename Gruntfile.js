module.exports = function ( grunt ) {

	// Start out by loading the grunt modules we'll need
	require( 'load-grunt-tasks' )( grunt );

	grunt.initConfig(
		{

			/**
			 * Processes and comporesses JavaScript.
			 */
			uglify : {

				production : {

					options : {
						beautify :         false,
						preserveComments : false,
						mangle :           {
							except : ['jQuery']
						}
					},

					files : {
					}
				}
			},

			/**
			 * Auto-prefix CSS Elements after SASS is processed.
			 */
			autoprefixer : {

				options : {
					browsers : ['last 5 versions'],
					map :      true
				},

				files : {
					expand :  true,
					flatten : true,
					src :     ['assets/css/wp-presenter.css'],
					dest :    'assets/css'
				}
			},

			/**
			 * Minify CSS after prefixes are added
			 */
			cssmin : {

				target : {

					files : [{
						expand : true,
						cwd :    'assets/css',
						src :    ['wp-presenter.css'],
						dest :   'assets/css',
						ext :    '.min.css'
					}]

				}
			},

			/**
			 * Process SASS
			 */
			sass : {

				dist : {

					options : {
						style :     'expanded',
						sourceMap : true,
						noCache :   true
					},

					files : {
						'assets/css/wp-presenter.css' : 'assets/css/sass/wp-presenter.scss'
					}
				}
			},

			/**
			 * Update translation file.
			 */
			makepot : {

				target : {
					options : {
						type :       'wp-theme',
						domainPath : '/lang'
					}
				}
			},

			phpunit : {

				classes : {
					dir : 'tests/'
				},

				options : {

					bin :        './vendor/bin/phpunit',
					testSuffix : 'Tests.php',
					bootstrap :  'bootstrap.php',
					colors :     true

				}
			},

			/**
			 * Watch scripts and styles for changes
			 */
			watch : {

				options : {
					livereload : true
				},

				scripts : {

					files : [
						'assets/js/**/*'
					],

					tasks : ['uglify:production']

				},

				styles : {

					files : [
						'assets/css/*.scss'
					],

					tasks : ['sass', 'autoprefixer', 'cssmin']

				}
			}
		}
	);

	// A very basic default task.
	grunt.registerTask( 'default', ['phpunit', 'uglify:production', 'sass', 'autoprefixer', 'cssmin', 'makepot'] );

};