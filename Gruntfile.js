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

  grunt.registerTask('css', ['sass', 'postcss']);
  grunt.registerTask('default',['css', 'watch']);

}
