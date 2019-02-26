module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    // SASS
    sass: {
      dev: {
        options: {
          style: 'minified',
        },
        files: {
          'css/protagonist.readable.css': 'sass/protagonist.scss'
        }
      },
      dist: {
        options: {
          style: 'compressed',
        },
        files: {
          'css/protagonist.css': 'sass/protagonist.scss'
        }
      }
    },

    // AUTOPREFIXER
    postcss: {
      options: {
        map: true,
        processors: [
          require('autoprefixer')({
            browsers: ['last 2 versions']
          })
        ]
      },
      dist: {
        src: ['css/protagonist.readable.css', 'protagonist.css']
      }
    },

    // WATCH
    watch: {
      css: {
        files: '**/*.scss',
        tasks: ['css']
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-postcss');
  grunt.loadNpmTasks('grunt-contrib-watch');

  // REGISTRATION OF TASKS
  // Typing 'grunt sass' starts the task below which just runs once the [sass] and [postcss] tasks and then stops
  grunt.registerTask('css', ['sass', 'postcss']);
  // DEFAULT TASK - typing 'grunt' will start the [css] task above (which runs both [sass] and [postcss] tasks) and then [watch] for changes
  grunt.registerTask('default',['css', 'watch']);

}
