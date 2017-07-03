<!DOCTYPE html>
<html>
<head>
	<title>Auto Complete</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<style>
		/*css for Scrollbar in autocomplete*/
		.ui-autocomplete {
			max-height: 200px;
			overflow-y: auto;
			overflow-x: hidden;
			padding-right: 0px;
		}

		* html .ui-autocomplete {
			height: 200px;
		}
	</style>
	<script type="text/javascript">
		var base="<?php echo base_url();?>";
		$(document).ready(function(){
			$("#myData").autocomplete({
				source: base+'my_autocomplete/search_result/',

				select: function( event, ui ) {
					$("#myData").val(ui.item.label);
					return false;
				}
			});

			//===============================to highlight matched word
			$.ui.autocomplete.prototype._renderItem = function (ul, item) {        
				var t = String(item.label).replace(new RegExp(this.term, "gi"),"<b>$&</b>");
				return $("<li></li>").data("item.autocomplete", item).append("<a>" + t + "</a>").appendTo(ul);
			};
		});
	</script>

</head>
<body>
	<form>
		Place Name:
		<input type="text" name="place_name" value="" id="myData">
	</form>

	<hr>
	On key press jquery send a get request with name <b>term</b> to controller<br>
	controller get data from database and echo return result array as json encoded<br>

	json formate be like-----------><br>
	[{"label":"Canada","value":"Canada"},{"label":"Bangladesh","value":"Bangladesh"}]<br>

	This json work with autocomplete jquery method and view result
</body>
</html>