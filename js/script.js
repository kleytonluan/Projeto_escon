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

var idContador=0;
function exclui(id){
	var campo = $("#"+id.id);
	campo.hide(200);
}
		
$( document ).ready(function() {
				
		$("#btnAdicionaItem").click(function(e){
			e.preventDefault();
			var tipoCampo = "item";
			adicionaCampo(tipoCampo);
		})
				
		$("#btnAdicionaTelefone").click(function(e){
			e.preventDefault();
			var tipoCampo = "telefone";
			adicionaCampo(tipoCampo);
		})	
				
			function adicionaCampo(tipo){
		
				idContador++;
					
				var idCampo = "campoExtra"+idContador;
				var idForm = "formExtra"+idContador;
				
				var html = "";
				html += "<div id='"+idForm+"' class='box-body'>"
				html += "<div class='row'>"
                html += "   <div class='form-group novoCampo col-md-3'>"
                html += "      <input type='text' class='form-control'required id='name' placeholder='Nome completo'>"
                html += "    </div>"
                html += "    <div class='form-group novoCampo col-md-2'>"
                html += "      <input type='text' class='form-control' required id='name' placeholder='Nome de guerra'>"
                html += "    </div>"
                html += "    <div class='form-group col-md-2'>"
                html += "        <p>"
                html += "            <select class='form-control novoCampo' id='posto-grad'>"
                html += "              <option value='1º Ten'>1º Ten</option>"
                html += "              <option value='2º Ten'>2º Ten</option>"
                html += "              <option value='Asp Of'>Asp Of</option>"
                html += "              <option value='1º Sgt'>1º Sgt</option>"
                html += "              <option value='2º Sgt'>2º Sgt</option>"
                html += "              <option value='3º Sgt'>3º Sgt</option>"
                html += "              <option value='Cb'>Cb</option>"
                html += "              <option value='Sd'>Sd</option>"
                html += "            </select>"
                html += "          </p>"
				html += "    </div>"
				html += "	<div class='form-group col-md-2' id='datetimepicker1'>"
                html += "      	<input type='date' required class='form-control'>"
                html += "    </div>"
                html += "    <div class='form-group col-md-2'>"
                html += "        <p>"
                html += "          <select class='form-control novoCampo' id='cia'>"
                html += "            <option value='EM'>EM</option>"
                html += "            <option value='CCAP'>CCAP</option>"
                html += "            <option value='CEEM'>CEEM</option>"
                html += "            <option value='2ª CIA'>2ª CIA</option>"
				html += "          </select>"
				html += "        </p>"
				html += "    </div>"
				
				html += "    <div class='form-group col-md-1'>"
				html +=	"			<button class='btn''teste' onclick='exclui("+idForm+")' type='button'><span class='fa fa-trash'></span></button>";		
                html += "  	</div>"
                html += "  	</div>"
                html += "</div>"
							
				$("#imendaHTML"+tipo).append(html);
			}
				
			$(".btnExcluir").click(function(){
				console.log("clicou");
				$(this).slideUp(200);
			})
				
			$("#btnSalvar").click(function(){
				
			var mensagem = "";
			var novosCampos = [];
			var camposNulos = false;
				
				$('.campoDefault').each(function(){
					if($(this).val().length < 1){
						camposNulos = true;
					}
				});
				$('.novoCampo').each(function(){
					if($(this).is(":visible")){
						if($(this).val().length < 1){
							camposNulos = true;
						}
						mensagem+= $(this).val()+"\n";
					}
				});
					
				if(camposNulos == true){
					alert("Atenção: existem campos sem preenchimento");
				}
				
					
				novosCampos = [];
			})
				
		});

/**Funcao de notificacao

var btnPermission = document.getElementById("btn_permission");

if (Notification.permission !== "default") {
	btnPermission.style.display = "none";
} else {
	btnPermission.style.display = "inline-block";
}

btnPermission.onclick = evt => {
    Notification.requestPermission();
}

function spawnNotification(opcoes) {
	var n = new Notification(opcoes.title, opcoes.opt);
	if (opcoes.link !== '') {
        n.addEventListener("click", function() {               
            n.close();
            window.focus();
            window.location.href = opcoes.link;
        });
    }
}

document.getElementById("btn_push").onclick = evt => {
    spawnNotification({
        opt: {
            body: "Criando nova notificação",
            icon: "notification-flat.png"
        },
        title: "Olá mundo!",
        link: "https://www.google.com.br/"
    })
}**/

function Enviar() {
 
    var solicitante = document.getElementById("solicitante");
 
    if (solicitante.value != "") {
        alert('Obrigado sr(a) ' + solicitante.value + ',os seus dados foram enviados com sucesso');
    }
 
}

function share(){
	if (navigator.share !== undefined) {
		navigator.share({
			title: 'EscOn - Escalas Online',
			url:'https://api.whatsapp.com/send?text=/arquivos/atual.png',
		})
		.then(() => console.log('Successful share'))
		.catch((error) => console.log('Error sharing', error));
	}
}
