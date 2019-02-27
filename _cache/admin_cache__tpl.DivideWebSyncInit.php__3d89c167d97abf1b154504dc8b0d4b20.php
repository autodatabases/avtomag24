<?
$PHPrender = new PHP_DataRender();
$options = json_encode(['content' => $PHPrender->fetch('/admin/autoresource/divide_web_sync/tpl.DivideWebSyncPreloader.php')]);

$_interface->buffer->addJsInit('

	(function ($, w) {

		window.reloadFrameAfterDivide = false;

		$(".sync_action").click(function () {
			divideSyncModal(this);
		});

		function divideSyncModal(self) {
			var pst_id = $(self).attr("data-pst_id");
			TINY.box.show({
				html: "",
				openjs: function(){showAJAXPreLoader(this)},
				closejs: function(){closeDivideSyncModalJS(this, window)},
				boxid: "divideSyncModal_"+pst_id,
				width: 500,
				height: 190,
				close: true,
				opacity: 50
			});

			return false;
		}

		function showAJAXPreLoader(self) {
				window.reloadFrameAfterDivide = false;
				var options = ' . $options . ';
				var boxid = self.boxid.split("_");
				var box_name = self.boxid;
				var pst_id = boxid[1];
				var box = $("#" + box_name).find(".tcontent");

				var target = "/admin/webservice/?page=web_sync_divide&pst_id=" + pst_id;
				$.ajax({
					url:target,
					data:{ pst_id: pst_id },
					type:"POST",
					beforeSend: function(xhr){
						box.html(options.content);
					},
					success:function(result){
						if( result ) {
							box.html(result);
						}
					}
				});
		}

		function closeDivideSyncModalJS(self, w) {
			if (window.reloadFrameAfterDivide) {
				w.location.reload(true);
			}
		}

	})(jqWar, window);
');?>