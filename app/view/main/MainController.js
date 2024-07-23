Ext.define('rtest.view.main.MainController', {
    extend: 'Ext.app.ViewController',

    alias: 'controller.main',

    onFillDbButtonClick: function() {
        
        Ext.Ajax.request({
            async: true,
            useDefaultXhrHeader: false,
            cors: true,
            headers: { 
                'Access-Control-Allow-Origin:' : '*', 
                'Content-Type': 'application/json;' 
            },
            url: 'http://localhost/api_prep_db.php'
        });
        Ext.Msg.alert('BD Ready, reload page!');
    }
});
