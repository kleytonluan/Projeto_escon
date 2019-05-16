$(document).ready(function () {
	$("#btnExport").click(function (e) {
		  e.preventDefault();
		  var table_div = document.getElementById('dvData');   
		  // esse "\ufeff" é importante para manter os acentos         
		  var blobData = new Blob(['\ufeff'+table_div.outerHTML], { type: 'application/vnd.ms-excel' });
		  var url = window.URL.createObjectURL(blobData);
		  var a = document.createElement('a');
		  a.href = url;
		  a.download = 'filename.xls'
				a.click();
			});
		});