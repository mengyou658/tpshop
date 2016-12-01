<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
	<script src="<?php echo C('jq-ui')?>/fancytree/lib/jquery.js" type="text/javascript"></script>
	<script src="<?php echo C('jq-ui')?>/fancytree/lib/jquery-ui.custom.js" type="text/javascript"></script>
	<link href="<?php echo C('jq-ui')?>/fancytree/src/skin-win8/ui.fancytree.css" rel="stylesheet" type="text/css">
	<script src="<?php echo C('jq-ui')?>/fancytree/src/jquery.fancytree.js" type="text/javascript"></script>
	<title><?php echo C('shopName');?></title>

<style type="text/css">
body {
	background-color: #fff;
	color: #fff;
	font-family: Helvetica, Arial, sans-serif;
	font-size: smaller;

	background-repeat: repeat-x;
}
div#tree {
	position: absolute;
	height: 95%;
	width: 95%;
	padding: 5px;
	margin-right: 16px;
}
ul.fancytree-container {
	height: 100%;
	width: 100%;
	background-color: transparent;
}
span.fancytree-title {
	color: #000;
	text-decoration: none;
}
span.fancytree-focused span.fancytree-title {
	outline-color: #000;
}
span.fancytree-node:hover span.fancytree-title,
span.fancytree-active span.fancytree-title,
span.fancytree-active.fancytree-focused span.fancytree-title,
.fancytree-treefocus span.fancytree-title:hover,
.fancytree-treefocus span.fancytree-active span.fancytree-title {
	color: #39414A;
}
span.external span.fancytree-title:after {
	content: "";
	background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAMAAAC67D+PAAAAFVBMVEVmmcwzmcyZzP8AZswAZv////////9E6giVAAAAB3RSTlP///////8AGksDRgAAADhJREFUGFcly0ESAEAEA0Ei6/9P3sEcVB8kmrwFyni0bOeyyDpy9JTLEaOhQq7Ongf5FeMhHS/4AVnsAZubxDVmAAAAAElFTkSuQmCC") 100% 50% no-repeat;
	padding-right: 13px;
}
/* Remove system outline for focused container */
.ui-fancytree.fancytree-container:focus {
	outline: none;
}
.ui-fancytree.fancytree-container {
	border: none;
}
</style>

<script type="text/javascript">
	$(function(){
		// --- Initialize sample trees
		$("#tree").fancytree({
		//	autoActivate: false, // we use scheduleAction()
		//	autoCollapse: true,
//			autoFocus: true,
		//	autoScroll: true,
			clickFolderMode: 3, // expand with single click //?? 2??
			minExpandLevel: 1, //????
		//	tabbable: false, // we don't want the focus frame
			// scrollParent: null, // use $container
			focus: function(event, data) {
				var node = data.node;
				// Auto-activate focused node after 1 second
				if(node.data.href){
					node.scheduleAction("activate", 1000);
				}
			},
			blur: function(event, data) {
				data.node.scheduleAction("cancel");
			},
			activate: function(event, data){
				var node = data.node,
					orgEvent = data.originalEvent;

				if(node.data.href){
					window.open(node.data.href, (orgEvent.ctrlKey || orgEvent.metaKey) ? "_blank" : node.data.target);
				}
			},
			click: function(event, data){ // allow re-loads
				var node = data.node,
					orgEvent = data.originalEvent;

				if(node.isActive() && node.data.href){
					// data.tree.reactivate();
					window.open(node.data.href, (orgEvent.ctrlKey || orgEvent.metaKey) ? "_blank" : node.data.target);
				}
			}
		});
	});
</script>

</head>

<body>
	<div id="tree">
	<ul>
	<?php foreach(C('menu') as $k=>$v):?>
	<li class="folder"> <?php echo $k; ?>
		<ul>
			<?php foreach($v as $k1=>$v1): ?>
			<li class="content"><a target="main-frame" href="<?php echo U($v1[0].'/'.$v1[1])?>"><?php echo $k1 ?></a></li>
			<?php endforeach; ?>
		</ul>
	</li>
	<?php endforeach; ?>
	</ul>
	</div>
</body>
</html>