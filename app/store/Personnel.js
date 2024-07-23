Ext.define('rtest.store.Personnel', {
    extend: 'Ext.data.Store',

    alias: 'store.personnel',

    model: 'rtest.model.Personnel',

    /*
    data: { items: [
        { name: 'Petya', education: "higher", places: "Moscow" },
        { name: 'Vasya',     education: "secondary",  places: ["Volgograd","Sochi"] },
        { name: 'Kolya',   education: "ssecondary specialized",    places: "Yalta" },
        { name: 'Sasha',     education: "secondary incomplete",        places: "Saratov" }
    ]},
    
    proxy: {
        type: 'memory',
        reader: {
            type: 'json',
            rootProperty: 'items'
        }
    }
    */
    proxy: {
        type: 'ajax',
        useDefaultXhrHeader: false,
        cors: true,
        headers: { 
            'Access-Control-Allow-Origin:' : '*', 
            'Content-Type': 'application/json;' 
        },
        api: {
            read: 'http://localhost/api_read.php',
            create: '',
            update: 'http://localhost/api_update.php',
            destroy: ''
        },
        reader: {
            type: 'json',
            root: 'items'
        },
        writer: {
            type: 'json',
            useDefaultXhrHeader: false,
            cors: true,
        }
    },

    autoLoad: true,
    autoSync: true
    
});
