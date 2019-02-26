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

    // WATCH
    watch: {
      css: {
        files: '**/*.scss',
        tasks: ['sass']
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.registerTask('default',['watch']);

}
