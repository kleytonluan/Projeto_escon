$("body").on("click", "#btnExportPdf", function () {
	html2canvas($('#tblCustomers')[0], {
		onrendered: function (canvas) {
			var data = canvas.toDataURL();
			var docDefinition = {
				content: [{
					image: data,
					width: 500
				}]
			};
			pdfMake.createPdf(docDefinition).download("escala.pdf");
		}
	});
});

$(document).ready(function () {
	$("#btnExportExcel").click(function (e) {
		  e.preventDefault();
		  var table_div = document.getElementById('tblCustomers');   
		  // esse "\ufeff" é importante para manter os acentos         
		  var blobData = new Blob(['\ufeff'+table_div.outerHTML], { type: 'application/vnd.ms-excel' });
		  var url = window.URL.createObjectURL(blobData);
		  var a = document.createElement('a');
		  a.href = url;
		  a.download = 'escala.xls'
				a.click();
			});
		});