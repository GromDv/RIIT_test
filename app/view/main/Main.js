Ext.define('rtest.view.main.Main', {
    extend: 'Ext.grid.Panel',
    xtype: 'mainlist',

    requires: [
        'Ext.plugin.Viewport',
        'Ext.window.MessageBox',
        'rtest.view.main.MainController',
        'rtest.store.Personnel'
    ],

    controller: 'main',

    title: 'Users',

    store: {
        type: 'personnel'
    },
    
    columns: [
        { 
            text: 'Name',  
            dataIndex: 'name', 
            flex: 0.5 
        },
        { 
            text: 'Education', 
            dataIndex: 'education', 
            editor: 'textfield',
            flex: 1 
        },
        { 
            text: 'Places', 
            dataIndex: 'places', 
            flex: 1 
        }
    ],

    plugins: {
        ptype: 'rowediting',
        clicksToEdit: 2
    },

    dockedItems: [
        {
            xtype: 'toolbar',
            flex: 1,
            dock: 'bottom',
            ui: 'footer',
            layout: {
                pack: 'start',
                type: 'hbox'
            },
            items: [
                {
                    xtype: 'button',
                    text: 'Create/ReCreate DB',
                    itemId: 'fillDbButton',
                    iconCls: 'cancel',
                    listeners:{
                        click: 'onFillDbButtonClick'
                    }
                }
            ]
        }
    ]
});
