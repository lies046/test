tinymce.PluginManager.requireLangPack('ruby');
tinymce.PluginManager.add('ruby', function(editor, url) {
	var openDialog = function () {

		return editor.windowManager.open({
			title: 'rubyTitle',
			body: {
				type: 'panel',
				items: [
					{type: 'htmlpanel', html: '<p>' + tinymce.translate('rubyDesc') + '</p>',},
					{type: 'input', name: 'moji', label: 'rubyParent'},
					{type: 'input', name: 'yomi', label: 'rubyChild'}
				]
			},
			buttons: [
				{type: 'cancel', text: 'Close'},
				{type: 'submit', text: 'Insert', primary: true}
			],
			initialData: {
				moji: 'initial Cat',
				yomi: false
			},
			onSubmit: function (api) {
				var data = api.getData();
					editor.insertContent('<ruby>' + data.moji + '<rt>' + data.yomi + '</rt></ruby>');
				api.close();
			}
		});
	};

	editor.ui.registry.addButton('ruby', {
		icon : 'ruby',
		tooltip: 'rubyTitle',
		onAction: function() {
			openDialog();
		}
	});
	editor.ui.registry.addMenuItem('ruby', {
		text: 'rubyTitle',
		icon : 'ruby',
		context: 'tools',
		onAction: function() {
			openDialog();
		}
	});

	editor.ui.registry.addIcon('ruby', '<svg width="24" height="24"><use xlink:href="' + url + '/img/ruby.svg#ruby"></use></svg>');

	//メタデータ（ヘルププラグインで使用）
	return {
		getMetadata: function () {
			return {
				name: "Ruby",
				url: "http://cccabinet.jpn.org/"
			};
		}
	};
});
