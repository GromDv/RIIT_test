Ext.define('rtest.Application', {
    extend: 'Ext.app.Application',

    name: 'rtest',

    requires: [
        'rtest.*'
    ],

    mainView: 'rtest.view.main.Main',
});
