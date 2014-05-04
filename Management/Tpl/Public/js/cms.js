function editor(n,m){
	var v='editor'+n;
	KindEditor.ready(function(K) {
		v = K.create('textarea[name="'+m+'"]', {
			allowImageUpload : true,
			items : [
				'source','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'image', 'link']
		});
	});	
}

function imageUp(n,m){
	var imgs = n;
	var urls = m;
	KindEditor.ready(function(K) {
		var editor = K.editor({
			allowFileManager : true
		});
		K('#'+imgs).click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					imageUrl : K('#'+urls).val(),
					clickFn : function(url, title, width, height, border, align) {
						K('#'+urls).val(url);
						editor.hideDialog();
					}
				});
			});
		});
	});
}

function fileUp(n,m){
	var ids = n;
	var urls = m;
	KindEditor.ready(function(K) {
		var editor = K.editor({
			allowFileManager : true
		});
		K('#'+ids).click(function() {
			editor.loadPlugin('insertfile', function() {
				editor.plugin.fileDialog({
					fileUrl : K('#'+urls).val(),
					clickFn : function(url, title) {
						K('#'+urls).val(url);
						editor.hideDialog();
					}
				});
			});
		});
	});
}

function del(n){
	var ur = n;
	if(confirm('确定删除？')){
		window.location.href = ur;
	} else {
		return false;
	}
}

function emp(m,n,msg){
	if('' === $.trim($(m+'[name="'+n+'"]').val())){
		alert(msg+'不能为空');
		return false;
	}
}