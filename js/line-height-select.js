(function() {

    function addTextIndent(editor, height_plus) {

        var node = editor.selection.getNode();
        var nodeName = node.nodeName;
        if (nodeName == 'P' || nodeName == 'DIV' ||
            nodeName == 'H1' || nodeName == 'H2' || nodeName == 'H3' || nodeName == 'H4' || nodeName == 'H5' || nodeName == 'H6'
        ) {
            editor.dom.setStyle(node, 'line-height', height_plus);
        };
    }

    tinymce.PluginManager.add('lineheightselect', function(editor, url) {
        editor.addButton('lineheightselect', {
            text: '行间距',
            icon: false,
            type: 'menubutton',
            menu: [{
                    text: '1倍',
                    onclick: function() {
                        addTextIndent(editor, '100%');
                    }
                },
                {
                    text: '1.5倍',
                    onclick: function() {
                        addTextIndent(editor, '150%');
                    }
                },
                {
                    text: '1.75倍',
                    onclick: function() {
                        addTextIndent(editor, '175%');
                    }
                },
                {
                    text: '2倍',
                    onclick: function() {
                        addTextIndent(editor, '200%');
                    }
                },
                {
                    text: '3倍',
                    onclick: function() {
                        addTextIndent(editor, '300%');
                    }
                },


            ]
        });
    });
})();