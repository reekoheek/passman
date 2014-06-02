module.exports = function() {
    var context = this;

    var cmd = context.require('./utils/cmd'),
        Q = context.require('q');

    this.task('init', function(logger) {
        return that.exec(['php', 'composer', 'install'], logger);
    });

};
